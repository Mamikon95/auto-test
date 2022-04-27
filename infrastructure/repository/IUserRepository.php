<?php
namespace infrastructure\repository;

use common\models\User;

interface IUserRepository
{
    public function add(User $user): bool;

    public function remove(User $user);

    public function getById(int $id);

    public function getByUsername(string $username);
}