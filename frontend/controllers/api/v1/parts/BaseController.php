<?php

namespace frontend\controllers\api\v1\parts;

use domain\consts\UserRoles;
use yii\filters\AccessControl;
use yii\filters\auth\HttpBasicAuth;
use yii\rest\Controller;

class BaseController extends Controller
{
    public function behaviors()
    {
        $behaviors = parent::behaviors();
        $behaviors['authenticator'] = [
            'class' => HttpBasicAuth::class,
        ];

        $behaviors['access'] = [
            'class' => AccessControl::class,
            'rules' => [
                [
                    'allow' => true,
                    'roles' => [UserRoles::USER_ROLE],
                ],
            ],
        ];

        return $behaviors;
    }
}