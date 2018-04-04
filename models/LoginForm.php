<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 04.04.18
 * Time: 17:40
 */

namespace app\models;

class LoginForm extends \yii\base\Model
{
    public $email;
    public $password;


    public function rules()
    {
        return [

            [['email','password'],'required'],
            ['email','email'],
            ['password','validatePassword']
        ];
    }

    public function validatePassword($attribute, $params)
    {
        if(!$this->hasErrors())
        {
            $user = $this->getUser();

            if(!$user || !$user->validatePassword($this->password))
                $this->addError($attribute,'Пароль или имейл введены неверно');
        }
    }

    public function getUser()
    {
        return User::findOne(['login'=>$this->email]);
    }
}