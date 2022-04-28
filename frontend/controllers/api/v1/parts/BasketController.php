<?php

namespace frontend\controllers\api\v1\parts;

use domain\services\BasketService;
use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Yii;
use domain\services\PartService;
use yii\filters\VerbFilter;
use yii\web\NotFoundHttpException;

class BasketController extends BaseController
{
    private BasketService $basketService;
    private PartService $partService;

    public function __construct($id, $module, PartService $partService, BasketService $basketService, $config = [])
    {
        $this->basketService = $basketService;
        $this->partService = $partService;
        parent::__construct($id, $module, $config);
    }

    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'create' => ['POST'],
                        'index' => ['GET'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        return $this->basketService->get([
            'user_id' => yii::$app->user->id
        ]);
    }

    public function actionCreate(int $partId)
    {
        $partService = $this->partService->getById($partId);

        if(!$partService)
        {
            throw new NotFoundHttpException();
        }

        if(!$this->basketService->add($partId, yii::$app->user->id))
        {
            throw new InternalErrorException();
        }

        return true;
    }
}