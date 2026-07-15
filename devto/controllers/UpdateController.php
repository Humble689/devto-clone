<?php

namespace app\controllers;

use app\models\Post;
use yii;

class UpdateController extends \yii\web\Controller
{
    public function actionIndex($id)
    {
        $model = Post::findOne($id);
        if (!Yii::$app->user->can ('updatePost',
        ['post'=>$model]) &&
    !Yii::$app->user->can('adminUpdatePost')) {

        throw new \yii\web\ForbiddenHttpException(
            'You cannot edit this post.'
        );
    }

        if($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('success','Updated successfully');
            return $this->redirect(['post/index']);
        }
        return $this->render('index',['model'=> $model]);
    }

    

}
