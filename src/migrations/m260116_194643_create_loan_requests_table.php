<?php

use yii\db\Migration;

class m260116_194643_create_loan_requests_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('loan_requests', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer()->notNull(),
            'amount' => $this->integer()->notNull(),
            'term' => $this->integer()->notNull(),
            'status' => $this->string()->defaultValue('pending'),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);
    }

    public function safeDown()
    {
        $this->dropTable('loan_requests');
    }
}