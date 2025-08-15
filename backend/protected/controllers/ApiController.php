<?php
class ApiController extends CController
{
    public function actionSolicitarCorrida()
    {
        header("Content-Type: application/json");

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
            'message' => 'Corrida solicitada com sucesso',
        ));

        Yii::app()->end();
    }
}
