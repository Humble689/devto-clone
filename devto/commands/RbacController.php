<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
// use yii\web\Controller;

class RbacController extends Controller{
    public function actionInit(){
        $auth = Yii::$app->authManager;
        $auth->removeAll();


        //add post permission
        $createpost= $auth->createPermission('createPost');
        $createpost->description ='Create a Post';
        $auth->add($createpost);

        //add update permission
        $updatepost= $auth->createPermission('updatePost');
        $updatepost->description='Update a post';
        $auth->add($updatepost);

        //add a role
        $author= $auth->createRole('author');
        $auth->add($author);
        $auth->addChild($author,$createpost);

        $admin= $auth->createRole('admin');
        $auth->add($admin);
        $auth->addChild($admin, $createpost);
        $auth->addChild($admin,$updatepost);

        $auth->assign($admin, 1);

         echo "RBAC initialized successfully.\n";
    }
}





















?>