<?php
class ApiController extends CController
{

    public function actionSolicitarCorrida()
    {
        header('Content-Type: application/json; charset=latin1');

        $pathSecret = Yii::getPathOfAlias('application.config.secret') . '.txt';
        $token = trim(file_get_contents($pathSecret));

        $receivedToken = isset($_SERVER['HTTP_API_TOKEN']) ? $_SERVER['HTTP_API_TOKEN'] : null;

        if ($receivedToken === null || $receivedToken != $token) {
            http_response_code(403);
            echo CJSON::encode(array(
                'success' => false,
                'message' => 'Token inválido ou ausente.',
            ));
            Yii::app()->end();
        }

        if (!Yii::app()->request->isPostRequest) {
            http_response_code(405);
            echo CJSON::encode(array(
                'success' => false,
                'message' => 'Método não permitido',
            ));
            Yii::app()->end();
        }

        $jsonPaylooad = file_get_contents('php://input');
        $jsonData = CJSON::decode($jsonPaylooad, true);

        if ($jsonData === null) {
            http_response_code(400);
            echo CJSON::encode(array(
                'success' => false,
                'message' => 'Dados inválidos.',
                'erros' => array('JSON de entrada inválida ou ausente'),
            ));
            Yii::app()->end();
        }

        $erros = array();
        $passageiroId = isset($jsonData['passageiro']['id']) ? $jsonData['passageiro']['id'] : null;
        if ($passageiroId) {
            $passageiro = Passageiro::model()->findByPk($passageiroId);
            if ($passageiro === null) {
                $erros[] = "Passageiro com ID {$passageiroId} não encontrado.";
            } elseif ($passageiro->status !== 'A') {
                $erros[] = 'Passageiro não está com a conta ativa.';
            } else {
                $corridaEmAndamento = Corrida::model()->find(
                    'passageiro_id = :p_id AND status = :status',
                    array(
                        ':p_id' => $passageiroId,
                        ':status' => 'Em andamento',
                    )
                );

                if ($corridaEmAndamento !== null) {
                    $erros[] = 'Passageiro já possui uma corrida em andamento.';
                }
            }
        } else {
            $erros[] = 'Passageiro ID não informado.';
        }

        $originAddress = isset($jsonData['origem']['endereco']) ? $jsonData['origem']['endereco'] : null;
        $destinationAddress = isset($jsonData['destino']['endereco']) ? $jsonData['destino']['endereco'] : null;

        if (empty($originAddress) || empty($destinationAddress)) {
            $erros[] = 'Endereço de origem e destino são obrigadtórios';
        } elseif ($originAddress === $destinationAddress) {
            $erros[] = 'O endereço de origem deve ser diferente do endereço de destino';
        }

        $origemLat = isset($jsonData['origem']['lat']) ? $jsonData['origem']['lat'] : null;
        $origemLng = isset($jsonData['origem']['lng']) ? $jsonData['origem']['lng'] : null;
        $destinoLat = isset($jsonData['destino']['lat']) ? $jsonData['destino']['lat'] : null;
        $destinoLng = isset($jsonData['destino']['lng']) ? $jsonData['destino']['lng'] : null;

        if (
            is_numeric($origemLat) && is_numeric($origemLng) &&
            is_numeric($destinoLat) && is_numeric($destinoLng)
        ) {
            $distancia = $this->calcularDistancia($origemLat, $origemLng, $destinoLat, $destinoLng);
            if ($distancia <= 100) {
                $erros[] = "Origem e destino muito próximos (distância menor que 100 metros).";
            }
        } else {
            $erros[] = "Coordenadas de latitude e longitude de origem e destino são obrigatórias.";
        }

        if (!empty($erros)) {
            http_response_code(400);
            echo CJSON::encode(array(
                'success' => false,
                'erros' => $erros,
            ));
            Yii::app()->end();
        }

        $motoristaDisponivel = null;

        $criteria = new CDbCriteria;
        $criteria->addCondition("status = 'A'");
        $criteria->addCondition("id NOT IN (SELECT motorista_id FROM corrida WHERE status = 'Em andamento' AND motorista_id IS NOT NULL)");
        $criteria->order = 'RAND()';
        $motoristaDisponivel = Motorista::model()->find($criteria);

        if ($motoristaDisponivel === null) {
            http_response_code(400);
            echo CJSON::encode(array(
                'success' => false,
                'erros' => array('Nenhum motorista disponível no momento.\n Tente novamente mais tarde.'),
            ));
            Yii::app()->end();
        }

        $distanciaEmMetros = $this->calcularDistancia($origemLat, $origemLng, $destinoLat, $destinoLng);
        $distanciaEmKm = $distanciaEmMetros / 1000;

        $duracaoCorridaEmMinutos = $distanciaEmMetros / 200;
        $tempoTotalParaPrevisaoEmMinutos = $duracaoCorridaEmMinutos + 3; // Adiciona os 3 minutos fixos

        $previsaoChegada = new DateTime();
        $previsaoChegada->add(new DateInterval('PT' . round($tempoTotalParaPrevisaoEmMinutos) . 'M'));
        $previsaoChegadaFormatada = $previsaoChegada->format('Y-m-d H:i:s');

        $bandeirada = 5.00;
        $custoPorKm = $distanciaEmKm * 2.00;
        $custoPorMinuto = $duracaoCorridaEmMinutos * 0.50;
        $tarifaFinalCalculada = $bandeirada + $custoPorKm + $custoPorMinuto;
        $tarifaFinalFormatada = number_format($tarifaFinalCalculada, 2, '.', '');


        $corrida = new Corrida();
        $corrida->passageiro_id = $passageiroId;
        $corrida->motorista_id = $motoristaDisponivel->id;
        $corrida->status = 'Em andamento';
        $corrida->origem_endereco = $originAddress;
        $corrida->origem_latitude = $origemLat;
        $corrida->origem_longitude = $origemLng;
        $corrida->destino_endereco = $destinationAddress;
        $corrida->destino_latitude = $destinoLat;
        $corrida->destino_longitude = $destinoLng;
        $corrida->tarifa = $tarifaFinalFormatada;
        $corrida->previsao_chegada_destino = $previsaoChegadaFormatada;
        $corrida->data_hora_inicio = date('Y-m-d H:i:s');

        if (!$corrida->save()) {
            http_response_code(500);
            $validationErrors = array();
            foreach ($corrida->getErrors() as $attribute => $errors) {
                $validationErrors[$attribute] = $errors;
            }

            echo CJSON::encode(array(
                'sucesso' => false,
                'erros' => array('Falha na validação ao salvar a corrida.'),
                'detalhes_validacao' => $validationErrors
            ));
            Yii::app()->end();
        }
        $quantidadeCorridasMotorista = Corrida::model()->countByAttributes(array('motorista_id' => $motoristaDisponivel->id));

        echo CJSON::encode(array(
            'success' => true,
            'corrida' => array(
                'id' => $corrida->id,
                'previsao_chegada_destino' => $previsaoChegada->format('Y-m-d H:i'),
                'motorista' => array(
                    'nome' => $motoristaDisponivel->nome,
                    'placa' => $motoristaDisponivel->placa_veiculo,
                    'quantidade_corridas' => $quantidadeCorridasMotorista,
                ),
            )
        ));

        Yii::app()->end();
    }

    public function actionFinalizarCorrida()
    {
        header('Content-Type: application/json; charset=latin1');

        $pathSecret = Yii::getPathOfAlias('application.config.secret') . '.txt';
        $token = trim(file_get_contents($pathSecret));
        $receivedToken = isset($_SERVER['HTTP_API_TOKEN']) ? $_SERVER['HTTP_API_TOKEN'] : null;

        if ($receivedToken === null || $receivedToken != $token) {
            http_response_code(403);
            echo CJSON::encode(array('sucesso' => false, 'erros' => array('Token de API inválido ou ausente.')));
            Yii::app()->end();
        }

        if (!Yii::app()->request->isPostRequest) {
            http_response_code(405);
            echo CJSON::encode(array('sucesso' => false, 'erros' => array('Método não permitido.')));
            Yii::app()->end();
        }

        $jsonPayload = file_get_contents('php://input');
        $jsonData = CJSON::decode($jsonPayload, true);

        if ($jsonData === null) {
            http_response_code(400);
            echo CJSON::encode(array('sucesso' => false, 'erros' => array('JSON de entrada inválido ou ausente.')));
            Yii::app()->end();
        }

        $erros = array();
        $corridaId = isset($jsonData['corrida']['id']) ? $jsonData['corrida']['id'] : null;
        $motoristaId = isset($jsonData['motorista']['id']) ? $jsonData['motorista']['id'] : null;

        $corrida = Corrida::model()->findByPk($corridaId);

        if ($corrida === null) {
            $erros[] = "Corrida não existe.";
        } elseif ($corrida->status !== 'Em andamento') {
            $erros[] = "Corrida já finalizada ou não está em andamento.";
        } elseif ($corrida->motorista_id != $motoristaId) {
            $erros[] = "Motorista não corresponde à corrida.";
        }

        if (!empty($erros)) {
            http_response_code(400); // Bad Request
            echo CJSON::encode(array(
                'sucesso' => false,
                'erros' => $erros,
            ));
            Yii::app()->end();
        }

        $corrida->status = 'Finalizada';
        $corrida->data_hora_finalizacao = date('Y-m-d H:i:s');

        if ($corrida->save()) {
            echo CJSON::encode(array(
                'sucesso' => true,
            ));
        } else {
            http_response_code(500);

            $errosDeValidacao = array();
            foreach ($corrida->getErrors() as $attribute => $errors) {
                $errosDeValidacao[$attribute] = $errors;
            }

            echo CJSON::encode(array(
                'sucesso' => false,
                'erros' => array('Falha na validação ao finalizar a corrida.'),
                'detalhes_validacao' => $errosDeValidacao,
            ));
        }

        Yii::app()->end();
    }

    /**
     * Calcula a distância em metros entre duas coordenadas geográficas.
     * @return float Distância em metros.
     */
    private function calcularDistancia($lat1, $lon1, $lat2, $lon2)
    {
        $raioTerra = 6371000; // Raio da Terra em metros
        $dLat = deg2rad($lat2 - $lat1);
        $dLon = deg2rad($lon2 - $lon1);
        $a = sin($dLat / 2) * sin($dLat / 2) +
            cos(deg2rad($lat1)) * cos(deg2rad($lat2)) *
            sin($dLon / 2) * sin($dLon / 2);
        $c = 2 * atan2(sqrt($a), sqrt(1 - $a));
        $distancia = $raioTerra * $c;
        return $distancia;
    }
}
