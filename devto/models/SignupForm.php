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
    public function signup()
{
    if (!$this->validate()) {
        return null;
    }

    $user = new User();

    $user->username = $this->username;
    $user->email = $this->email;

    $user->setPassword($this->password);
    $user->generateAuthKey();

    if($user->save()){

        $auth = Yii::$app->authManager;

        $auth->assign(
            $auth->getRole('user'),
            $user->id
        );

        return $user;
    }

    return null;
}



}