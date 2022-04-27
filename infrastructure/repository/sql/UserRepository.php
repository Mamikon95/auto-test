<?php

namespace infrastructure\repository\sql;

use common\models\User;
use infrastructure\repository\IUserRepository;

class UserRepository implements IUserRepository
{
    public function add(User $user)
    {
        $user->save();

        return $user;
    }

    public function remove(User $user)
    {
        return $user->delete();
    }

    public function getById(int $id)
    {
        return User::findOne($id);
    }

    public function getByUsername(string $username)
    {
        $user = User::findOne(['username' => $username]);
        return $user;
    }
}