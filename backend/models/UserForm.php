<?php

namespace backend\models;

use common\models\User;
use yii\base\Model;

class UserForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $passwordRepeat;

    public function rules()
    {
        return [
            [['username', 'email'], 'string', 'max' => 255],
            [['password', 'passwordRepeat'], 'string', 'min' => 6, 'max' => 16],
            ['email', 'email'],
            [['username', 'password', 'passwordRepeat'], 'required'],
            ['passwordRepeat', 'compare', 'compareAttribute' => 'password', 'message' => "Passwords don't match"],
            [['username', 'email'], 'unique', 'targetClass' => User::class]
        ];
    }

    public function attributeLabels()
    {
        return [
            'username' => 'Username',
            'email' => 'Email',
            'password' => 'password',
            'passwordRepeat' => 'Repeat password'
        ];
    }
}