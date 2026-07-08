<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\web\UploadedFile;

class CreateController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = new Post();

        if ($model->load(Yii::$app->request->post()) && $model->save()){
                Yii::$app->session->setFlash('success', 'Published successfully');
                return $this->redirect(['post/index']);
            }
        

     return $this->render('index', [
            'model' => $model
        ]);
    }
}