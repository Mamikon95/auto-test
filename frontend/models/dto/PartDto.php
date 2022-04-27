<?php

namespace frontend\models\dto;

use yii\base\Model;

class PartDto extends Model
{
    public $id;
    public $number;
    public $name;
    public $count;
    public $price;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['number', 'count', 'price', 'id'], 'integer'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'number' => 'Number',
            'name' => 'Name',
            'count' => 'Count',
            'price' => 'Price'
        ];
    }
}