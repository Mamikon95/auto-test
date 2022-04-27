<?php
namespace infrastructure\repository;

use common\models\Part;
use common\models\User;
use frontend\models\dto\PartDto;

interface IPartRepository
{
    public function add(Part $user);

    public function remove(Part $user);

    public function getById(int $id);

    public function get(PartDto $partDto);
}