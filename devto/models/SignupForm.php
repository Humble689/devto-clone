<?php
namespace app\models;


use Yii;
use yii\base\Model;
use app\models\User;
use yii\log\Target;

class SignupForm extends Model{
    public $username;
    public $email;
    public $password;

    public function rules(){

        return[[['username', 'email','password'], 'required'],['email','email'],['username', 'unique','targetClass'=> User::class],['email', 'unique', 'targetClass'=> User::class]];

    }
    public function signup(){
        $user = new User;
        $user->username= $this->username;
        $user->email= $this->email;
        $user->password_hash =Yii::$app->security->generatePasswordHash($this->password);
        $user->auth_key= Yii::$app->security->generateRandomString();

        return $user->save();
    }



}