<?php

namespace infrastructure\repository\sql;

use common\models\Part;
use frontend\models\dto\PartDto;
use infrastructure\repository\IPartRepository;

class PartRepository implements IPartRepository
{
    public function add(Part $part)
    {
        $part->save();

        return $part;
    }

    public function remove(Part $part)
    {
        return $part->delete();
    }

    public function getById(int $id)
    {
        return Part::findOne($id);
    }

    public function get(PartDto $partDto)
    {
        $part = Part::find();
        $part->andFilterWhere($partDto->getAttributes());

        return $part->all();
    }
}