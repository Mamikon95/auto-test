<?php

namespace frontend\controllers\api\v1\parts;

use Yii;
use domain\services\PartService;
use frontend\models\dto\PartDto;
use yii\filters\VerbFilter;
use yii\helpers\Json;
use yii\web\BadRequestHttpException;

class PartController extends BaseController
{
    private PartService $partService;

    public function __construct($id, $module, PartService $partService, $config = [])
    {
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
                        'index' => ['GET'],
                    ],
                ],
            ]
        );
    }

    public function actionIndex()
    {
        $partDto = new PartDto();

        if($partDto->load(Yii::$app->request->get(), ''))
        {
            if(!$partDto->validate())
            {
                throw new BadRequestHttpException(Json::encode($partDto->getErrors()));
            }
        }

        return $this->partService->get($partDto);
    }
}