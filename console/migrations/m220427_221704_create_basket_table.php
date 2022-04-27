<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%basket}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 * - `{{%part}}`
 */
class m220427_221704_create_basket_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%basket}}', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'part_id' => $this->integer(),
            'count' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-basket-user_id}}',
            '{{%basket}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-basket-user_id}}',
            '{{%basket}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE',
            'CASCADE'
        );

        // creates index for column `part_id`
        $this->createIndex(
            '{{%idx-basket-part_id}}',
            '{{%basket}}',
            'part_id'
        );

        // add foreign key for table `{{%part}}`
        $this->addForeignKey(
            '{{%fk-basket-part_id}}',
            '{{%basket}}',
            'part_id',
            '{{%part}}',
            'id',
            'CASCADE',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-basket-user_id}}',
            '{{%basket}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-basket-user_id}}',
            '{{%basket}}'
        );

        // drops foreign key for table `{{%part}}`
        $this->dropForeignKey(
            '{{%fk-basket-part_id}}',
            '{{%basket}}'
        );

        // drops index for column `part_id`
        $this->dropIndex(
            '{{%idx-basket-part_id}}',
            '{{%basket}}'
        );

        $this->dropTable('{{%basket}}');
    }
}
