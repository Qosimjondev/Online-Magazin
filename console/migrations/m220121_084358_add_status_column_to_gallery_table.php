<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%gallery}}`.
 */
class m220121_084358_add_status_column_to_gallery_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%gallery}}', 'status', $this->boolean()->defaultValue(false));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%gallery}}', 'status');
    }
}
