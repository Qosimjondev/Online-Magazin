<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 * - `{{%brand}}`
 */
class m220122_153952_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'price' => $this->integer(11),
            'discount' => $this->integer(11),
            'image' => $this->string(100),
            'status' => $this->boolean()->defaultValue(false),
            'category_id' => $this->integer()->notNull(),
            'brand_id' => $this->integer()->notNull(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->createTable('{{%product_lang}}', [
            'id' => $this->primaryKey(),
            'owner_id'=>$this->integer(),
            'language'=>$this->string(6),
            'name' => $this->string(255),
            'description1' => $this->text(),
            'description2' => $this->text(),
            'specification' => $this->text(),
        ]);

        $this->addForeignKey(
            '{{%fk-product-lang_id}}',
            '{{%product_lang}}',
            'owner_id',
            '{{%product}}',
            'id',
            'CASCADE'
        );

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );

        // creates index for column `brand_id`
        $this->createIndex(
            '{{%idx-product-brand_id}}',
            '{{%product}}',
            'brand_id'
        );

        // add foreign key for table `{{%brand}}`
        $this->addForeignKey(
            '{{%fk-product-brand_id}}',
            '{{%product}}',
            'brand_id',
            '{{%brand}}',
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
            '{{%fk-product-lang_id}}',
            '{{%product_lang}}'
        );
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-product-category_id}}',
            '{{%product}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-product-category_id}}',
            '{{%product}}'
        );

        // drops foreign key for table `{{%brand}}`
        $this->dropForeignKey(
            '{{%fk-product-brand_id}}',
            '{{%product}}'
        );

        // drops index for column `brand_id`
        $this->dropIndex(
            '{{%idx-product-brand_id}}',
            '{{%product}}'
        );

        $this->dropTable('{{%product_lang}}');
        $this->dropTable('{{%product}}');
    }
}
