<?php

namespace domain\services;

use common\models\Basket;
use domain\consts\SessionKeys;
use infrastructure\repository\IBasketRepository;
use infrastructure\repository\IPartRepository;
use infrastructure\repository\sql\BasketRepository;
use yii\web\Session;

class BasketService
{
    private IBasketRepository $basketRepository;

    public function __construct(IBasketRepository $basketRepository, IPartRepository $partRepository)
    {
        $this->basketRepository = $basketRepository;
    }

    public function add(int $partId, int $userId): Basket
    {
        $findAttrs = [
            'part_id' => $partId,
            'user_id' => $userId
        ];

        $basket = $this->basketRepository->getOne($findAttrs);

        if(!$basket)
        {
            $basket = new Basket($findAttrs);
            $basket->count = 1;
        }
        else
        {
            $basket->count++;
        }

        return $this->basketRepository->save($basket);
    }

    public function get(array $attributes = []): array
    {
        return $this->basketRepository->get($attributes);
    }
}