<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%message}}`.
 */
class m220118_093213_create_message_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%messages}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string(100)->notNull(),
            'email'=>$this->string()->notNull(),
            'subject'=>$this->string(100),
            'message'=>$this->text()->notNull(),
            'status'=>$this->boolean()->defaultValue(false),
            'created_at'=>$this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%messages}}');
    }
}
