<h2>My Bookmarks</h2>

<?php foreach($bookmarks as $bookmark): ?>

<div class="card mb-3 p-3">

    <h3>
        <?= $bookmark->post->title ?>
    </h3>

    <p>
        <?= $bookmark->post->descript ?>
    </p>

    <?= yii\helpers\Html::a(
        'View Post',
        ['post/view','id'=>$bookmark->post_id],
        ['class'=>'btn btn-primary']
    ) ?>

</div>

<?php endforeach; ?>