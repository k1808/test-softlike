<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%product}}`
 */
class m200911_091627_create_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order}}', [
            'id' => $this->primaryKey(),
            'date' => $this->dateTime()->notNull(),
            'item' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
        ]);

        // creates index for column `item`
        $this->createIndex(
            '{{%idx-order-item}}',
            '{{%order}}',
            'item'
        );

        // add foreign key for table `{{%product}}`
        $this->addForeignKey(
            '{{%fk-order-item}}',
            '{{%order}}',
            'item',
            '{{%product}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%product}}`
        $this->dropForeignKey(
            '{{%fk-order-item}}',
            '{{%order}}'
        );

        // drops index for column `item`
        $this->dropIndex(
            '{{%idx-order-item}}',
            '{{%order}}'
        );

        $this->dropTable('{{%order}}');
    }
}
