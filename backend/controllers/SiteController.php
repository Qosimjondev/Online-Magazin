<?php

namespace backend\controllers;

use backend\models\UserImg;
use common\models\LoginForm;
use common\models\User;
use Yii;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\web\UploadedFile;

/**
 * Site controller
 */
class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['logout', 'index', 'profile', 'change-login', 'change-password', 'image-update'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        $user_count = User::find()->asArray()->count();
        return $this->render('index',
        [
            'user_count'=>$user_count,
        ]);
    }

    /**
     * Login action.
     *
     * @return string|Response
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $this->layout = 'main-login';

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->loginAdmin()) {
            return $this->goBack();
        }

        $model->password = '';

        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionProfile()
    {
        $model = new UserImg();
        return $this->render('profile', compact('model'));
    }

    public function beforeAction($action)
    {
        $this->enableCsrfValidation = false;
        return parent::beforeAction($action);
    }

    public function actionChangePassword(){
        $model = User::findOne(Yii::$app->user->id);
        if(Yii::$app->request->isPost){
            if($_POST['password'] == $_POST['password1']){
                $model->setPassword($_POST['password'], $_POST['password1']);
                $model->update();
                return $this->redirect(['/site/profile']);
            }
        }
    }

    public function actionChangeLogin(){

        $model = User::findOne(Yii::$app->user->id);
        if(Yii::$app->request->isPost){
                $model->username = $_POST['login'];
                $model->update();
                return $this->redirect(['/site/profile']);
        }
    }

    public function actionImageUpdate()
    {
        $model = UserImg::findOne(Yii::$app->user->id);
        $model->image = UploadedFile::getInstanceByName($_POST['image']);
        $model->image->saveAs(Yii::getAlias('@backend')."/web/img/".$model->image->name, true);

        if ($this->request->isAjax){
                $model->update();
                return false;
        }

    }
}
