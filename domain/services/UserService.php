<?php

namespace domain\services;

use common\models\User;
use infrastructure\repository\IUserRepository;

class UserService
{
    private IUserRepository $userRepository;

    public function __construct(IUserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function add(array $attributes)
    {
        $userModel = new User($attributes);
        $userModel->generateAuthKey();
        $userModel->setPassword($userModel->password_hash);

        return $this->userRepository->add($userModel);
    }

    public function remove(int $id)
    {
        $user = User::findOne($id);
        return $this->userRepository->remove($user);
    }

    public function removeByUsername(string $username)
    {
        $user = $this->getByUsername($username);
        return $this->userRepository->remove($user);
    }

    public function getById(int $id)
    {
        return $this->userRepository->getById($id);
    }

    public function getByUsername(string $username)
    {
        return $this->userRepository->getByUsername($username);
    }
}