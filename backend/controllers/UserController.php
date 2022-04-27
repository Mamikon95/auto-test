<?php

namespace backend\controllers;

use backend\models\UserForm;
use common\models\User;
use backend\models\search\UserSearch;
use domain\consts\UserRoles;
use domain\consts\UserStatuses;
use domain\services\RbacService;
use domain\services\UserService;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for User.
 */
class UserController extends MainController
{
    private UserService $userService;
    private RbacService $rbacService;

    public function __construct($id, $module, UserService $userService, RbacService $rbacService, $config = [])
    {
        $this->userService = $userService;
        $this->rbacService = $rbacService;
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
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all User models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
     * @param int $id
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findUser($id),
        ]);
    }

    /**
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $form = new UserForm();

        if ($this->request->isPost) {
            if ($form->load($this->request->post()) && $form->validate()) {
                $user = $this->userService->add([
                    'username' => $form->username,
                    'email' => $form->email,
                    'password_hash' => $form->password,
                    'status' => UserStatuses::STATUS_ACTIVE
                ]);

                $this->rbacService->assign($user->id);

                return $this->redirect(['view', 'id' => $user->id]);
            }
        }

        return $this->render('create', [
            'form' => $form,
        ]);
    }

    /**
     * Deletes an existing User.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        if($this->findUser($id))
        {
            $this->userService->remove($id);
        }

        return $this->redirect(['index']);
    }

    /**
     * Finds the User based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findUser($id)
    {
        $user = $this->userService->getById($id);

        if ($user !== null && $this->rbacService->isAssign($user->id, UserRoles::USER_ROLE)) {
            return $user;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
