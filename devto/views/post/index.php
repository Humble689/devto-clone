<?php
/** @var yii\web\View $this */
use yii\bootstrap5\Html;
use yii\helpers\Url;

?>

<div class="container py-4">
    <div class="row g-4">
        
        <!-- Left Sidebar Column -->
        <div class="col-lg-3 col-md-4">
            <?= $this->render('_sidebar') ?>
        </div>
        
        <!-- Main Content Column -->
        <div class="col-lg-6 col-md-8">

            <!-- Quick Post Box -->
            <div class="card p-3 shadow-sm mb-4 post-box-container">
                <form id="postForm">
                    <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" value="<?= Yii::$app->request->getCsrfToken() ?>">

                    <textarea 
                        class="form-control post-input border-0 shadow-none ps-0"
                        id="postInput"
                        name="Post[title]"
                        rows="1"
                        placeholder="What's on your mind?"
                        style="resize: none;"
                    ></textarea>

                    <div class="post-actions-row d-flex justify-content-end mt-2 pt-2 border-top">
                        <?= Html::submitButton('Post', [
                            'class' => 'btn btn-primary btn-sm px-4 rounded-pill',
                            'formaction' => Url::to(['create/quick']),
                            'formmethod' => 'post'
                        ]) ?>
                    </div>
                </form>
            </div>
            
            <?php foreach ($model as $data) { ?>
                <div class="card shadow-sm border-0 mb-4 overflow-hidden position-relative feed-card-hover" style="transition: transform 0.2s, box-shadow 0.2s; cursor: pointer;">
                    
                    <?php if(strlen($data['descript']) <= 200): ?>
                        <?= Html::a('', ['post/view', 'id'=>$data['id']], ['class' => 'stretched-link']) ?>
                    <?php endif; ?>

                    <!-- Post Header -->
                    <div class="card-body pb-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <p class="text-muted mb-0" style="font-size: 13px;">
                                    <span class="fw-semibold text-secondary"><?= $data->user->username ?? 'no user'?></span><br>
                                   
                                    <small class="text-muted">
                                        <?= date('M d', strtotime($data->created_on)) ?>                               
                                        (<?= Yii::$app->formatter->asRelativeTime($data->created_on) ?>)
                                    </small>
                                </p>
                                <h3 class="h3 mb-1 text-dark fw-bold"> <?= $data['title'] ?></h3>
                                
                            </div>

                            <?php if(
                                Yii::$app->user->can('updatePost',['post'=>$data])
                                ||
                                Yii::$app->user->can('adminUpdatePost')
                            ): ?>
                                <?= Html::a(
                                    'Edit',
                                    ['/update/index','id'=>$data['id']],
                                    ['class'=>'btn btn-sm btn-outline-secondary px-3 rounded-pill position-relative', 'style' => 'z-index: 5;']
                                ) ?>
                            <?php endif; ?> 
                        </div>
                    </div>

                    <?php if (!empty($data['image'])): ?>
                        <div class="mt-3 bg-light text-center border-top border-bottom">
                            <img src="data:image/jpeg;base64,<?= $data['image'] ?>" alt="<?= htmlspecialchars($data['title']) ?>" class="img-fluid w-100" style="max-height: 450px; object-fit: cover;">
                        </div>
                    <?php endif; ?> 

                    <div class="card-body"> 
                        <div class="card-text text-secondary mb-3" style="font-size: 15px; line-height: 1.5;">
                            <?php 
                                $description = $data['descript'];
                                $limit = 200;
                            ?>

                            <?php if(strlen($description) > $limit): ?>
                                <span id="short<?= $data['id'] ?>">
                                    <?= substr($description, 0, $limit) ?>...
                                </span>

                                <span id="full<?= $data['id'] ?>" style="display:none;">
                                    <?= $description ?>
                                </span>

                                <?= Html::a('Read more', ['post/view', 'id'=>$data['id']], ['class' => 'btn btn-sm btn-link text-decoration-none p-0 ms-1 fw-bold stretched-link']) ?>
                            <?php else: ?>
                                <?= $description ?>
                            <?php endif; ?>
                            
                            <dialog></dialog>
                        </div>

                        <div class="w-100 text-muted small">
                            <hr class="my-2 opacity-25"> 
                                                                
                            <div class="d-flex justify-content-between align-items-center pt-1">
                                <div class="d-flex align-items-center gap-3">
                                    
                                    <div class="d-flex align-items-center gap-2 text-secondary position-relative" style="z-index: 5;">
                                        <span class="small tracking-wide text-uppercase text-muted fw-semibold me-2">reactions</span>
                                        <?= Html::a(
                                            '<i class="bi bi-chat fs-6 me-2"></i>' . 
                                            '<span class="fw-bold text-dark">' . $data->getComments()->count() . '</span> ' . 
                                            '<span class="text-muted">' . ($data->getComments()->count() == 1 ? 'Comment' : 'Comments') . '</span>',
                                            ['post/view', 'id' => $data->id],
                                            [
                                                'class' => 'btn btn-sm btn-light border-0 rounded-pill px-3 py-1.5 d-inline-flex align-items-center text-decoration-none',
                                            ]
                                        ) ?>
                                    </div>
                                    
                                </div>

                                <div class="d-flex align-items-center position-relative" style="z-index: 5;">
                                    <?= Html::a('<i class="bi bi-bookmark fs-5"></i>',['post/bookmark', 'id'=> $data->id], ['class' => 'text-secondary link-primary p-2 d-inline-block']) ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>

        </div>

        <!-- Right Sidebar Column -->
        <div class="col-lg-3 col-md-12">
            <?= $this->render('_rightsidebar') ?>
        </div>

    </div>
</div>

<!-- Extra Optional Hover CSS Style styling
<style>
.feed-card-hover:hover {
    transform: translateY(-2px);
    box-shadow: 0 .5rem 1rem rgba(0,0,0,.08)!important;
}
</style> -->

<!-- <script>
function showMore(id){

    let shortText = document.getElementById("short" + id);
    let fullText = document.getElementById("full" + id);
    let button = document.getElementById("btn" + id);

    if(fullText.style.display === "none"){

        shortText.style.display = "none";
        fullText.style.display = "inline";
        button.innerHTML = "Read less";

    } else {

        shortText.style.display = "inline";
        fullText.style.display = "none";
        button.innerHTML = "Read more";

    }

}
</script> -->

<script> //for the quick post
const postInput = document.getElementById('postInput');
const container = document.querySelector('.post-box-container');

// Expand when user clicks or tabs into the input field
postInput.addEventListener('focus', () => {
  container.classList.add('expanded');
});

// Optional: Shrink back down if user clicks completely outside without typing anything
document.addEventListener('click', (e) => {
  if (!container.contains(e.target) && postInput.value.trim() === "") {
    container.classList.remove('expanded');
    postInput.style.height = ''; // Reverts back to initial row size
  }
});
</script>
