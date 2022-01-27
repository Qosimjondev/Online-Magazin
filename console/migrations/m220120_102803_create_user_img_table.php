<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%user_img}}`.
 */
class m220120_102803_create_user_img_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%user_img}}', [
            'id' => $this->primaryKey(),
            'image' => $this->string(50),
            'user_id' => $this->integer()->notNull(),
        ]);
        $this->addForeignKey(
            'fk-user_id',
            'user_img',
            'user_id',
            'user',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-user_id',
            'user_img'
        );
        $this->dropTable('{{%user_img}}');
    }
}
