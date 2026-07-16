<?php

namespace app\controllers;

use app\models\Post;
use Yii;

class DeleteController extends \yii\web\Controller
{
    public function actionDelete($id)
    {
        $model = Post::findOne($id);
        
            $model->delete();
            Yii::$app->session->setFlash('success', 'Post Deleted successfully');
        

        return $this->redirect(['post/index']);
    }

}
