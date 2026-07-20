<?php
namespace app\commands;

use Yii;
use yii\console\Controller;
use app\components\AuthorRule;
use app\components\CommentAuthorRule;
// use yii\web\Controller;

class RbacController extends Controller{
  public function actionInit()
{
    $auth = Yii::$app->authManager;

    $auth->removeAll();


    // Add rule first
    $rule = new AuthorRule();
    $rule->name = 'isAuthor';

    $auth->add($rule);

    $commentRule = new CommentAuthorRule();
$commentRule->name = 'isCommentAuthor';

$auth->add($commentRule);



    // Anyone logged in can create posts
    $createPost = $auth->createPermission('createPost');
    $createPost->description = 'Create posts';

    $auth->add($createPost);



    // User can update own posts
    $updatePost = $auth->createPermission('updatePost');
    $updatePost->description = 'Update own posts';

    $updatePost->ruleName = 'isAuthor';

    $auth->add($updatePost);

    $updateComment = $auth->createPermission('updateComment');
    $updateComment->description= 'Comment update';

$updateComment->ruleName = 'isCommentAuthor';
    $auth->add($updateComment);



    // Admin can update everything
    $adminUpdatePost = $auth->createPermission('adminUpdatePost');
    $adminUpdatePost->description = 'Admin can update any post';

    $auth->add($adminUpdatePost);



    // User role
    $user = $auth->createRole('user');

    $auth->add($user);

    $auth->addChild($user, $createPost);
    $auth->addChild($user, $updatePost);
    $auth->addChild($user, $updateComment);




    // Admin role
    $admin = $auth->createRole('admin');

    $auth->add($admin);

    $auth->addChild($admin, $createPost);
    $auth->addChild($admin, $adminUpdatePost);
    $auth->addChild($admin, $updateComment);



    // Assign admin to user ID 1
    $auth->assign($admin, 1);

    $auth->assign($user,2);
    $auth->assign($user,3);
    $auth->assign($user,4);
    



    echo "RBAC initialized successfully.\n";
}
}





















?>