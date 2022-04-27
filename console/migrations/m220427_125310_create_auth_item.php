<?php

use yii\db\Migration;
use domain\consts\UserRoles;

/**
 * Class m220427_125310_create_auth_item
 */
class m220427_125310_create_auth_item extends Migration
{
    private $authManager;

    public function __construct($config = [])
    {
        $this->authManager = yii::$app->authManager;
        parent::__construct($config);
    }

    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $admin = $this->authManager->createRole(UserRoles::ADMIN_ROLE);
        $user = $this->authManager->createRole(UserRoles::USER_ROLE);

        $this->authManager->add($admin);
        $this->authManager->add($user);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $admin = $this->authManager->getRole(UserRoles::ADMIN_ROLE);
        $user = $this->authManager->getRole(UserRoles::USER_ROLE);

        $this->authManager->remove($admin);
        $this->authManager->remove($user);
    }
}
