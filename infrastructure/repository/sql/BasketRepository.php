<?php

namespace infrastructure\repository\sql;

use common\models\Basket;
use common\models\Part;
use frontend\models\dto\PartDto;
use infrastructure\repository\IBasketRepository;

class BasketRepository implements IBasketRepository
{
    public function save(Basket $basket): Basket
    {
        $basket->save();

        return $basket;
    }

    public function get(array $attributes = [])
    {
        $basket = Basket::find();

        if(count($attributes))
        {
            $basket->andWhere($attributes);
        }

        return $basket->all();
    }

    public function getOne(array $attributes)
    {
        return Basket::findOne($attributes);
    }
}