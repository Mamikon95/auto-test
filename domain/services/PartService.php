<?php

namespace domain\services;

use common\models\Part;
use frontend\models\dto\PartDto;
use infrastructure\repository\IPartRepository;

class PartService
{
    private IPartRepository $partRepository;

    public function __construct(IPartRepository $partRepository)
    {
        $this->partRepository = $partRepository;
    }

    public function add(array $attributes)
    {
        $part = new Part($attributes);

        return $this->partRepository->add($part);
    }

    public function remove(int $id)
    {
        $part = Part::findOne($id);
        return $this->partRepository->remove($part);
    }

    public function getById(int $id)
    {
        return $this->partRepository->getById($id);
    }

    public function get(PartDto $partDto)
    {
        return $this->partRepository->get($partDto);
    }
}