<?php
/**
 * Created by PhpStorm.
 * User: maksim
 * Date: 04.04.18
 * Time: 18:15
 */

namespace app\models;


use yii\base\Model;

class RegisterForm extends Model
{
    public $email;
    public $password;
    public $repeatPassword;


    public function rules()
    {
        return [

            [['email','password', 'repeatPassword'],'required'],
            ['email','email'],
            [['password', 'repeatPassword'],'coincided']
        ];
    }

    public function coincided($attribute, $params)
    {
        if($this->password != $this->repeatPassword)
            $this->addError($attribute,'Пароли не совпадают');
    }

    public function createUser()
    {
        $user = new User();
        $user->login = $this->email;
        $user->setPassword($this->password);
        $user->save();
        return $user;
    }
}