<?php

namespace app\controllers;

use app\models\Bookmark;
use app\models\Post;
use app\models\Comment;
use Yii;

class PostController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $model = Post::find()
            ->with('comments','user')
            ->orderBy(['created_on' => SORT_DESC])
            ->all();

        return $this->render('index', [
            'model' => $model
        ]);
    }


    public function actionView($id)
    {
        $post = Post::find()
    ->where(['id' => $id])
    ->with([
        'comments.user',
        'comments.replies.user'
    ])
    ->one();

        if (!$post) {
            throw new \yii\web\NotFoundHttpException('Post not found');
        }


        $comment = new Comment();


        if (!Yii::$app->user->isGuest && $comment->load(Yii::$app->request->post())) {

            $comment->post_id = $post->id;
            $comment->user_id = Yii::$app->user->id;


            if ($comment->save()) {
            return $this->redirect(['post/view', 'id' => $post->id]);             }
        }


        return $this->render('view', [
            'post' => $post,
            'comment' => $comment
        ]);
    }

    public function actionChallenge(){
        return $this->render('challenge');
    }


    public function actionReply($id){
        $post = Post::findOne($id);

        if (!$post) {
            throw new \yii\web\NotFoundHttpException('Post not found');
        }

        $comment = new Comment();

        // var_dump($comment); return;


        if (!Yii::$app->user->isGuest && $comment->load(Yii::$app->request->post(),'')) {

            $comment->post_id = $post->id;
            $comment->user_id = Yii::$app->user->id;
             $comment->parent_id = Yii::$app->request->post('parent_id');


            if ($comment->save()) {
                 return $this->redirect(['post/view', 'id' => $post->id]);
            }
        }


        return $this->render('view', [
            'post' => $post,
            'comment' => $comment
        ]);

    }
    public function actionTerms(){
        return $this->render('terms&condtions');
    }
     public function actionConduct(){
        return $this->render('codeofconduct');
     }


  public function actionBookmark($id)
{
    if (Yii::$app->user->isGuest) {
        throw new \yii\web\ForbiddenHttpException('Login first');
    }


    $exists = Bookmark::find()
        ->where([
            'user_id'=>Yii::$app->user->id,
            'post_id'=>$id
        ])
        ->exists();


    if (!$exists) {

        $bookmark = new Bookmark();

        $bookmark->user_id = Yii::$app->user->id;
        $bookmark->post_id = $id;

        $bookmark->save();
    }


    return $this->redirect(['index','id'=>$id]);
}

public function actionBookpage()
{
    if (Yii::$app->user->isGuest) {
        throw new \yii\web\ForbiddenHttpException('Login first');
    }

    $bookmarks = Bookmark::find()
        ->where([
            'user_id' => Yii::$app->user->id
        ])
        ->with('post')
        ->all();


    return $this->render('bookmarks', [
        'bookmarks' => $bookmarks
    ]);
}
}