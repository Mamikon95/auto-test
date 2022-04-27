<?php

use yii\db\Migration;
use domain\services\UserService;
use domain\consts\UserStatuses;
use domain\consts\UserRoles;
use domain\services\RbacService;

/**
 * Class m220427_132057_add_users
 */
class m220427_132057_add_users extends Migration
{
    private UserService $userService;
    private RbacService $rbacService;

    public function __construct(UserService $userService, RbacService $rbacService, $config = [])
    {
        $this->userService = $userService;
        $this->rbacService = $rbacService;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $user = $this->userService->add([
            'username' => 'admin',
            'password_hash' => 'qwerty',
            'email' => 'admin@local.te',
            'status' => UserStatuses::STATUS_ACTIVE
        ]);

        $this->rbacService->assign($user->id, UserRoles::ADMIN_ROLE);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        if($this->userService->getByUsername('admin'))
        {
            $this->userService->removeByUsername('admin');
        }
    }
}
