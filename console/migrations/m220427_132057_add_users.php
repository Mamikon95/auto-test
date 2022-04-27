<?php

use yii\db\Migration;
use domain\services\UserService;

/**
 * Class m220427_132057_add_users
 */
class m220427_132057_add_users extends Migration
{
    private UserService $userService;

    public function __construct(UserService $userService, $config = [])
    {
        $this->userService = $userService;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        if(!$this->userService->getByUsername('admin'))
        {
            $this->userService->add([
                'username' => 'admin',
                'password_hash' => 'qwerty',
                'email' => 'admin@local.te',
            ]);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        return false;
    }
}
