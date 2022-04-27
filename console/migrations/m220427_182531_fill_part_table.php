<?php

use yii\db\Migration;
use domain\services\PartService;

/**
 * Class m220427_182531_fill_part_table
 */
class m220427_182531_fill_part_table extends Migration
{
    private PartService $partService;

    public function __construct(PartService $partService, $config = [])
    {
        $this->partService = $partService;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->partService->add([
            'number' => '13214324',
            'name' => 'Бачок',
            'count' => 13,
            'price' => 1200
        ]);

        $this->partService->add([
            'number' => '432422214',
            'name' => 'Подшипник ступицы',
            'count' => 20,
            'price' => 500
        ]);

        $this->partService->add([
            'number' => '34275432',
            'name' => 'Шаровая опора',
            'count' => 43,
            'price' => 600
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220427_182531_fill_part_table cannot be reverted.\n";

        return false;
    }
}
