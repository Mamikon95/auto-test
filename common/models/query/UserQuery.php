<?php

namespace common\models\query;

use common\models\User;

/**
 * This is the ActiveQuery class for [[User]].
 *
 * @see User
 */
class UserQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function withRole($roleName)
    {
        return $this->innerJoin('auth_assignment as aa', 'aa.user_id = user.id')
            ->andWhere(['aa.item_name' => $roleName]);
    }
}
