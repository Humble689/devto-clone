<?php

namespace app\controllers;

use app\models\Post;
use yii;

class CreateController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Post;

        if ($model->load(Yii::$app->request->post()) && $model->save()){
            Yii::$app->session->setFlash('sucess','Published successfully');
            return $this->redirect(['post/']);

        }
        return $this->render('index');
    }

}
