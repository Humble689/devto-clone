<?php

namespace app\controllers;

use app\models\Post;
use Yii;
use yii\web\UploadedFile;

class CreateController extends \yii\web\Controller
{

 public function beforeAction($action)
    {
        if (!Yii::$app->user->can('createPost')) {
            throw new \yii\web\ForbiddenHttpException(
                'You are not allowed to create posts.'
            );
        }

        return parent::beforeAction($action);
    }
    public function actionIndex()
    {
        $model = new Post();
        //converting in base 64

        if ($model->load(Yii::$app->request->post())){
                $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
                if($model->imageFile){
                    $imageData = file_get_contents($model->imageFile->tempName);
                    $model->image = base64_encode($imageData);
                }
                if($model->save()){
                Yii::$app->session->setFlash('success', 'Published successfully');
                return $this->redirect(['post/index']);
                }
            }
        

     return $this->render('index', [
            'model' => $model
        ]);
    }
}