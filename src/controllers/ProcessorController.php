<?php

namespace app\controllers;

use yii\web\Controller;
use app\models\LoanRequest;

class ProcessorController extends Controller
{
    public function actionIndex(int $delay)
    {
        $requests = LoanRequest::find()
            ->where(['status' => 'pending'])
            ->all();

        foreach ($requests as $request) {
            sleep($delay);

            $approved = rand(1, 10) === 1;

            if ($approved) {
                $exists = LoanRequest::find()
                    ->where([
                        'user_id' => $request->user_id,
                        'status' => 'approved'
                    ])->exists();

                $request->status = $exists ? 'declined' : 'approved';
            } else {
                $request->status = 'declined';
            }

            $request->save(false);
        }

        return ['result' => true];
    }
}
