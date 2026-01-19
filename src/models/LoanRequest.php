<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * Модель заявки на займ
 * 
 * @property int $id
 * @property int $user_id
 * @property int $amount
 * @property int $term
 * @property string $status
 * @property string $created_at
 * @property string|null $processed_at
 */
class LoanRequest extends ActiveRecord
{

    public static function tableName()
    {
        return 'loan_requests';
    }
    
    public function rules()
    {
        return [
            [['user_id', 'amount', 'term'], 'required'],
            [['user_id', 'amount', 'term'], 'integer'],
        ];
    }
    
    public function beforeSave($insert)
    {
        if ($insert) {
            $this->created_at = date('Y-m-d H:i:s');
        }
        return parent::beforeSave($insert);
    }
}
