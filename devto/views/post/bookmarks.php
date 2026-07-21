<?php
   use yii\helpers\StringHelper;

?>

<div class="container my-5">

<div class="d-flex align-items-center mb-4">
        <h2 class="fw-bold text-dark m-0">My Bookmarks</h2>
        <span class="badge bg-primary ms-3 rounded-pill"><?= count($bookmarks) ?> saved</span>
    </div>

    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <?php


 foreach($bookmarks as $bookmark): ?>
            <div class="col">
                <div class="card h-100 border-0 shadow-sm">
                    <div class="card-body p-4 d-flex flex-column">
                        
                        <h3 class="h5 fw-bold text-dark mb-2">
                            <?= $bookmark->post->title ?>
                        </h3>

                        <p class="text-secondary small mb-4 flex-grow-1">
                            <?= StringHelper::truncateWords($bookmark->post->descript, 100, '...') ?>
                        </p>

                        <div class="mt-auto">
                            <?= yii\helpers\Html::a(
                                'View Post',
                                ['post/view','id'=>$bookmark->post_id],
                                ['class'=>'btn btn-outline-primary btn-sm w-100 fw-semibold rounded-2 py-2']
                            ) ?>
                        </div>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
