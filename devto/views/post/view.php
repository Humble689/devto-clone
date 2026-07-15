<div>
<div class="container" style="width:auto ; height:auto;">
<?php if (!empty($post->image)): ?>
    <img src="data:image/jpeg;base64,<?= $post->image ?>" alt="<?= htmlspecialchars($post->image) ?>">
     <?php endif; ?> 
</div>
<h1><?= $post->title ?></h1>


<p>
<?= $post->descript ?>
</p>


<hr>

<h3>Comments</h3></div>

<?php foreach($post->comments as $comment): ?>

<div class="border p-2 mb-2">

<strong>
<?= $comment->user->username ?>
</strong>

<p>
<?= $comment->comment ?>
</p>

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