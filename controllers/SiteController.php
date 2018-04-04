<?php

namespace app\controllers;

use app\models\RegisterForm;
use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        if (Yii::$app->user->isGuest) {
            return $this->actionLogin();
        }

        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $login_model = new LoginForm();

        if( Yii::$app->request->post('LoginForm'))
        {
            $login_model->attributes = Yii::$app->request->post('LoginForm');

            if($login_model->validate())
            {
                Yii::$app->user->login($login_model->getUser());
                return $this->goHome();
            }
        }

        return $this->render('login',['model'=>$login_model]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        $this->goHome();
    }

    public function actionRegister()
    {
        $model = new RegisterForm();

        if( Yii::$app->request->post('RegisterForm')) {
            $model->attributes = Yii::$app->request->post('RegisterForm');
            if ($model->validate()) {
                $user = $model->createUser();
                Yii::$app->user->login($user);
                return $this->goHome();
            }
        }

        return $this->render('register', ['model' => $model]);
    }
}
