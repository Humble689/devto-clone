
<?php use yii\helpers\Html; ?>
<div class="row justify-content-center">
    <div class="card">
            <div class="container"></div>
<div class="container my-5 max-width-md">

    <?php if (!empty($post->image)): ?>
        <div class="mb-4 rounded-3 overflow-hidden shadow-sm">
            <img src="data:image/jpeg;base64,<?= $post->image ?>" alt="<?= htmlspecialchars($post->image) ?>" class="img-fluid w-50 object-fit-cover">
        </div>
    <?php endif; ?> 

    <article class="mb-5">
        <h1 class="display-5 fw-bold text-dark mb-3"><?= $post->title ?></h1>
        <p class="lead text-secondary lh-base"><?= $post->descript ?></p>
    </article>

    <hr class="my-5 border-2 opacity-25">

    <!-- Comments Section -->
    <h3 class="h4 fw-bold text-dark mb-4">Comments (<?= count($post->comments) ?>)</h3>

    <?php foreach($post->comments as $item): ?>
        <div class="card border-0 shadow-sm mb-4 bg-white">
            <div class="card-body p-4">
                
                <div class="d-flex justify-content-between align-items-start mb-2">
                    <strong class="text-dark font-monospace text-uppercase small bg-light px-2 py-1 rounded">
                        <?= $item->user->username ?>
                    </strong>
                    
                    <?php if(Yii::$app->user->can('updateComment',['comment'=>$item])): ?>
                        <div class="dropdown">
                            <button class="btn btn-link btn-sm text-muted p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="fs-5">···</span>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                <li>
                                    <?= Html::a('Update', ['update/comupdate', 'id'=>$item['id']], ['class' => 'dropdown-item text-dark']) ?>
                                </li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <?= Html::a('Delete', ['delete/comments', 'id' => $item['id']], [
                                        'class' => 'dropdown-item text-danger',
                                        'data' => [
                                            'method' => 'post',
                                            'confirm' => 'Are you sure you want to delete this comment?'
                                        ]
                                    ]) ?>
                                </li>
                            </ul>
                        </div>
                    <?php endif ?>
                </div>

                <p class="text-secondary mb-3"><?= $item->comment ?></p>

                <div class="d-flex align-items-center gap-2">
                    <button class="btn btn-sm btn-light border text-primary fw-semibold px-3" onclick="document.getElementById('reply<?= $item->id ?>').style.display='block'">
                        Reply
                    </button>
                </div>

                <!-- Reply Form Wrapper -->
                <?php if(!Yii::$app->user->isGuest){ ?>
                    <div id="reply<?= $item->id ?>" style="display:none;" class="mt-3 p-3 bg-light rounded-3 border">
                        <form method="post" action="<?= \yii\helpers\Url::to(['post/reply','id'=>$post->id]) ?>">
                            <div class="mb-2">
                                <textarea name="comment" class="form-control border-0 shadow-sm" placeholder="Write a public reply..." rows="2" required></textarea>
                            </div>
                            <input type="hidden" name="_csrf" value="<?= Yii::$app->request->csrfToken ?>">
                            <input type="hidden" name="parent_id" value="<?= $item->id ?>">
                            <div class="d-flex justify-content-end gap-2">
                                <button type="button" class="btn btn-sm btn-link text-muted text-decoration-none" onclick="document.getElementById('reply<?= $item->id ?>').style.display='none'">Cancel</button>
                                <button class="btn btn-sm btn-primary px-3">Send Reply</button>
                            </div>
                        </form>
                    </div>
                <?php } else { ?>
                    <div class="mt-2"><span class="badge bg-light text-muted fw-normal">Log in to reply</span></div>
                <?php } ?>

                <!-- Replies Section -->
                <?php foreach($item->replies as $reply): ?>
                    <div class="border-start border-primary border-3 ms-3 ms-md-4 mt-4 ps-3 bg-light p-3 rounded-end shadow-sm">
                        <div class="d-flex justify-content-between align-items-start mb-2">
                            <strong class="text-dark small">
                                <?= $reply->user->username ?>
                            </strong>
                            
                            <?php if(Yii::$app->user->can('updateComment',['comment'=>$reply])): ?>
                                <div class="dropdown">
                                    <button class="btn btn-link btn-sm text-muted p-0 border-0" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        <span class="fs-6">···</span>
                                    </button>
                                    <ul class="dropdown-menu dropdown-menu-end shadow-sm border-0">
                                        <li>
                                            <?= Html::a('Update', ['update/comupdate', 'id'=>$item['id']], ['class' => 'dropdown-item text-dark']) ?>
                                        </li>
                                        <li><hr class="dropdown-divider"></li>
                                        <li>
                                            <?= Html::a('Delete', ['delete/comments', 'id' => $item['id']], [
                                                'class' => 'dropdown-item text-danger',
                                                'data' => [
                                                    'method' => 'post',
                                                    'confirm' => 'Are you sure you want to delete this comment?'
                                                ]
                                            ]) ?>
                                        </li>
                                    </ul>
                                </div>
                            <?php endif; ?>
                        </div>
                        <p class="text-secondary mb-0 small"><?= $reply->comment ?></p>
                    </div>
                <?php endforeach; ?>

            </div>
        </div>
    <?php endforeach; ?>

    <hr class="my-5 border-2 opacity-25">

    <div class="card border-0 shadow-sm bg-white p-4">
        <h4 class="h5 fw-bold mb-3">Leave a Comment</h4>
        <?php if(!Yii::$app->user->isGuest): ?>
            <?php $form = yii\widgets\ActiveForm::begin(['options' => ['class' => 'mt-2']]); ?>
                <?= $form->field($comment,'comment')->textarea(['rows'=>4, 'class' => 'form-control mb-3', 'placeholder' => 'Join the discussion...'])->label(false) ?>
                <button class="btn btn-primary px-4 fw-semibold">Submit Comment</button>
            <?php yii\widgets\ActiveForm::end(); ?>
        <?php else: ?>
            <div class="alert alert-secondary mb-0 text-center py-4 border-dashed" role="alert">
                Please <a href="#" class="alert-link text-primary fw-semibold">Login</a> to share your thoughts.
            </div>
        <?php endif; ?>
    </div>
</div>
        </div>
    </div>
</div>