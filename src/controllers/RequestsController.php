<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\LoanRequest;

class RequestsController extends Controller
{
    public function actionIndex()
    {
        $data = Yii::$app->request->post();

        if (!isset($data['user_id'], $data['amount'], $data['term'])) {
            Yii::$app->response->statusCode = 400;
            return ['result' => false];
        }

        $hasApproved = LoanRequest::find()
            ->where(['user_id' => $data['user_id'], 'status' => 'approved'])
            ->exists();

        if ($hasApproved) {
            Yii::$app->response->statusCode = 400;
            return ['result' => false];
        }

        $model = new LoanRequest($data);

        if (!$model->save()) {
            Yii::$app->response->statusCode = 404;
            return ['result' => false];
        }

        Yii::$app->response->statusCode = 201;
        return [
            'result' => true,
            'id' => $model->id,
        ];
    }
}
