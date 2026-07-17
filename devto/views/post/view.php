<div>
<div class="container" style="width:auto ; height:auto;">
<?php

use yii\helpers\Html;

 if (!empty($post->image)): ?>
    <img src="data:image/jpeg;base64,<?= $post->image ?>" alt="<?= htmlspecialchars($post->image) ?>">
     <?php endif; ?> 
</div>
<h1><?= $post->title ?></h1>


<p>
<?= $post->descript ?>
</p>


<hr>

<h3>Comments</h3></div>

<?php foreach($post->comments as $item): ?>

  


    

<div class="border p-2 mb-2">

    <strong>
        <?= $item->user->username ?>
    </strong>

    <p>
        <?= $item->comment ?>
    </p>

      <div class="btn-group">
  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Small button
  </button>
  <ul class="dropdown-menu">
<?= Html::a('Delete', ['delete/comments', 'id' => $item['id']], [
        'data' => [
            'method' => 'post',
            'confirm' => 'Are you sure you want to delete this comment?'
        ]
    ]) ?>   <li> <?= Html::a('update', ['update/comupdate', 'id'=>$item['id']]) ?></li>
  </ul>
</div>


    <button 
        class="btn btn-sm btn-outline-primary"
        onclick="document.getElementById('reply<?= $item->id ?>').style.display='block'">
        Reply
    </button>


    <!-- Reply form -->
    <div id="reply<?= $item->id ?>" style="display:none;" class="mt-2">

        <form method="post" action="<?= \yii\helpers\Url::to(['post/reply','id'=>$post->id]) ?>">

            <textarea 
                name="comment"
                class="form-control"
                placeholder="Write a reply..."
                rows="3"></textarea>

            <input type="hidden"
                   name="_csrf"
                   value="<?= Yii::$app->request->csrfToken ?>">

            <input type="hidden"
                   name="parent_id"
                   value="<?= $item->id ?>">

            <button class="btn btn-primary mt-2">
                Send Reply
            </button>

        </form>

    </div>


    <!-- Display replies -->
    <?php foreach($item->replies as $reply): ?>

        <div class="border-start ms-4 mt-3 ps-3">

            <strong>
                <?= $reply->user->username ?>
            </strong>

            <p>
                <?= $reply->comment ?>
            </p>

    <div class="btn-group">
  <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
    Small button
  </button>
  <ul class="dropdown-menu">
<li>
    <?= Html::a('Delete', ['delete/comments', 'id' => $item['id']], [
        'data' => [
            'method' => 'post',
            'confirm' => 'Are you sure you want to delete this comment?'
        ]
    ]) ?>
</li>   <li> <?= Html::a('update', ['update/comupdate', 'id'=>$item['id']]) ?></li>
  </ul>
</div>


        </div>

    <?php endforeach; ?>


</div>

<?php endforeach; ?>


<hr>


<?php if(!Yii::$app->user->isGuest): ?>

<?php $form = yii\widgets\ActiveForm::begin(); ?>


<?= $form->field($comment,'comment')->textarea([
    'rows'=>4
]) ?>


<button class="btn btn-primary">
Comment
</button>


<?php yii\widgets\ActiveForm::end(); ?>


<?php else: ?>

<p>
Login to comment
</p>

<?php endif; ?>
</div>