<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%category}}`.
 */
class m220122_033530_create_category_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%category}}', [
            'id' => $this->primaryKey(),
            'status' => $this->boolean()->defaultValue(false),
        ]);

        $this->createTable('{{%category_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id' => $this->integer(),
            'language' => $this->string(6),
            'name' => $this->string(100),
        ]);

        $this->addForeignKey('fk_category_lang_relation', '{{%category_lang}}', 'owner_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_category_lang_relation', '{{%category_lang}}');
        $this->dropTable('{{%category_lang}}');
        $this->dropTable('{{%category}}');
    }
}
