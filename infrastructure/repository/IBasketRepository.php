<?php
namespace infrastructure\repository;

use common\models\Basket;
use frontend\models\dto\PartDto;

interface IBasketRepository
{
    public function save(Basket $basket): Basket;

    public function get(array $attributes = []);

    public function getOne(array $attributes);
}