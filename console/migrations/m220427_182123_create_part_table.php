<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%part}}`.
 */
class m220427_182123_create_part_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%part}}', [
            'id' => $this->primaryKey(),
            'number' => $this->integer(32),
            'name' => $this->string(255),
            'count' => $this->integer(),
            'price' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        // creates index for column `number`
        $this->createIndex(
            'idx-part-number',
            'part',
            'number'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx-part-number', 'part');
        $this->dropTable('{{%part}}');
    }
}
