<?php
namespace infrastructure\repository;

use common\models\Part;
use frontend\models\dto\PartDto;

interface IPartRepository
{
    public function add(Part $part);

    public function remove(Part $part);

    public function getById(int $id);

    public function get(PartDto $partDto);
}