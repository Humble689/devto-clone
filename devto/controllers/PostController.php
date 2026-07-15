<?php

namespace app\controllers;

use app\models\Post;
use app\models\Comment;
use Yii;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Post::find()
            ->with('comments')
            ->orderBy(['created_on' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }


    public function actionView($id)
    {
        $post = Post::findOne($id);

        if (!$post) {
            throw new \yii\web\NotFoundHttpException('Post not found');
        }


        $comment = new Comment();


        if (!Yii::$app->user->isGuest && $comment->load(Yii::$app->request->post())) {

            $comment->post_id = $post->id;
            $comment->user_id = Yii::$app->user->id;


            if ($comment->save()) {
                return $this->refresh();
            }
        }


        return $this->render('view', [
            'post' => $post,
            'comment' => $comment
        ]);
    }

    

}