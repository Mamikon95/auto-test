<?php

namespace domain\services;

use domain\consts\UserRoles;
use yii\rbac\DbManager;

class RbacService
{
    private $authManager;

    public function __construct(DbManager $authManager)
    {
        $this->authManager = $authManager;
    }

    public function assign(int $userId, string $roleName = UserRoles::USER_ROLE)
    {
        $role = $this->authManager->getRole($roleName);
        return $this->authManager->assign($role, $userId);
    }

    public function isAssign(int $userId, string $roleName): bool
    {
        $role = $this->authManager->getRolesByUser($userId);
        return in_array($roleName, array_keys($role));
    }
}