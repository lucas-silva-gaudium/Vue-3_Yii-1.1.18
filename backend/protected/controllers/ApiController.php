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
            }
        } else {
            $erros[] = 'Passageiro ID não informado.';
        }

        if (!empty($erros)) {
            http_response_code(400);
            echo CJSON::encode(array(
                'success' => false,
                'erros' => $erros,
            ));
            Yii::app()->end();
        }

        echo CJSON::encode(array(
            'success' => true,
            'message' => 'JSON recebido com sucesso!',
            'dados_recebidos' => $jsonData,
        ));

        Yii::app()->end();
    }
}
