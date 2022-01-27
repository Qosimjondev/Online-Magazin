<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%news}}`.
 */
class m220117_051749_create_news_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%news}}', [
            'id' => $this->primaryKey(),
            'url' => $this->string(),
            'status' => $this->boolean()->defaultValue(false),
            'img' => $this->string(),
            'created_by' =>$this->integer()
        ]);

        $this->createTable('{{%news_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'title' => $this->string(),
            'content' => $this->string(),
        ]);
        $this->addForeignKey('fk_news_lang_relation', '{{%news_lang}}', 'owner_id', '{{%news}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('fk_news_relation', '{{%news}}', 'created_by', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {

        $this->dropForeignKey('fk_news_lang_relation', '{{%news_lang}}');
        $this->dropForeignKey('fk_news_relation', '{{%news}}');
        $this->dropTable('{{%news_lang}}');
        $this->dropTable('{{%news}}');

    }
}
