<?php

namespace frontend\controllers\api\v1\parts;

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
        return $behaviors;
    }
}