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

        echo CJSON::encode(array(
            'success' => true,
            'message' => 'Corrida solicitada com sucesso (Autenticado).',
        ));

        Yii::app()->end();
    }
}
