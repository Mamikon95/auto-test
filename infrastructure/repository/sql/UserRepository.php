<?php

namespace infrastructure\repository\sql;

use common\models\User;
use infrastructure\repository\IUserRepository;

class UserRepository implements IUserRepository
{
    public function add(User $user): bool
    {
        return $user->save();
    }

    public function remove(User $user)
    {
        return $user->delete();
    }

    public function getById(int $id)
    {
        $user = User::findOne($id);
        return $user;
    }

    public function getByUsername(string $username)
    {
        $user = User::findOne(['username' => $username]);
        return $user;
    }
}