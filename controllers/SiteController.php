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

        $user = User::findIdentity(Yii::$app->user->getId());
        $refererUser = null;
        if ($user->getId() != $user->referer)
        {
            $ids = explode(".", $user->referer);
            $refererId = $ids[count($ids)-2];
            $refererUser = User::findIdentity($refererId);
        }

        $referrals = User::find()->where("referer LIKE :ref", ['ref' => $user->referer."%"])->andWhere('id != :id', ['id' => $user->id])->all();

        return $this->render('index', ['user' => $user, "refererUser" => $refererUser, "referrals" => $referrals]);
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

    public function actionRegister($referer = null)
    {
        $model = new RegisterForm();

        $refererUser = null;
        if (isset($referer)) {
            $refererUser = User::findOne(['referer' => $referer]);
            if ($refererUser->getId() == Yii::$app->user->getId())
            {
                $refererUser = null;
                $referer = null;
            }
        }

        if( Yii::$app->request->post('RegisterForm')) {
            $model->attributes = Yii::$app->request->post('RegisterForm');
            if ($model->validate()) {
                $user = $model->createUser($referer);
                Yii::$app->user->login($user);
                return $this->goHome();
            }
        }


        return $this->render('register', ['model' => $model, 'referer' => $refererUser]);
    }
}
