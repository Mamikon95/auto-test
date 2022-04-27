<?php

namespace domain\services;

use domain\consts\SessionKeys;
use yii\web\Session;

class BasketService
{
    private Session $session;

    public function __construct(Session $session)
    {
        $this->session = $session;
    }

    public function add($id, $userId): bool
    {
        if($basketData = $this->session->get(SessionKeys::BASKET_KEY))
        {
            $basketData = is_array($basketData) ? $basketData : [];

            $basketData[$id][$b]

            if(isset($basketData[$id]))
            {
                $basketData[$id] = ++$basketData[$id];
            }
            else
            {
                $basketData[$id] = 1;
            }
        }

        $this->session->set(SessionKeys::BASKET_KEY, $basketData);

        return true;
    }

    public function get(): array
    {
        $basketData = [];

        if($basketSession = $this->session->get(SessionKeys::BASKET_KEY))
        {
            $basketData = $basketSession;
        }

        return $basketData;
    }
}