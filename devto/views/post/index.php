<?php
/** @var yii\web\View $this */
use yii\bootstrap5\Html;
?>

    <div class="container">
        <div class="row">
                    <div class="col-sm-3">

<div class="sidebar bg-white">

    <ul class="list-unstyled mb-4">

        <li>
            <?= Html::a('<i class="bi bi-house-door-fill"></i> Home',
                ['/post/index'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-trophy-fill"></i> DEV Challenges',
                ['/post/challenge'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-bookmark-fill"></i> Reading List',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-stars"></i> DEV++',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-play-btn-fill"></i> Videos',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-mortarboard-fill"></i> Education',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-question-circle-fill"></i> Help',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-megaphone-fill"></i> Advertise',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-building"></i> Organizations',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-gem"></i> Showcase',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-info-circle-fill"></i> About',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-envelope-fill"></i> Contact',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

    </ul>

    <hr>

    <h6 class="sidebar-heading">Other</h6>

    <ul class="list-unstyled">

        <li>
            <?= Html::a('<i class="bi bi-shield-check"></i> Code of Conduct',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-lock-fill"></i> Privacy Policy',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-file-earmark-text-fill"></i> Terms of Use',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

    </ul>

    <hr>

    <div class="social-icons">

        <a href="#"><i class="bi bi-twitter-x"></i></a>

        <a href="#"><i class="bi bi-facebook"></i></a>

        <a href="#"><i class="bi bi-github"></i></a>

        <a href="#"><i class="bi bi-instagram"></i></a>

    </div>

</div>
                        

                        
                    </div>
                    <div class="col-sm-6">

                            

                        <div class="card p-3 shadow-sm post-box-container" style="max-width: 600px; margin: 20px auto;">
                        <form id="postForm">

                        <input type="hidden" name="<?= Yii::$app->request->csrfParam ?>" 
                        value="<?= Yii::$app->request->getCsrfToken() ?>">

                        <textarea 
                            class="form-control post-input"
                            id="postInput"
                            name="Post[title]"
                            rows="1"
                            placeholder="What's on your mind?"
                        ></textarea>

                        <div class="post-actions-row mt-2">
                            <?= Html::submitButton('Post', [
                                'class' => 'btn btn-primary',
                                'formaction' => \yii\helpers\Url::to(['create/quick']),
                                'formmethod' => 'post'
                            ]) ?>
                        </div>

                        </form>
                        </div>

                      

                        <?php foreach ($model as $data) 
                            { ?>
                        
                      
                        <div>
                            <h3> <?= $data['title'] ?></h3>
                                
                                &nbsp;
                            <?php if(
                                Yii::$app->user->can('updatePost',['post'=>$data])
                                ||
                                Yii::$app->user->can('adminUpdatePost')
                            ): ?>

                            <?= Html::a(
                                'Edit',
                                ['/update/index','id'=>$data['id']],
                                ['class'=>'btn btn-primary']
                            ) ?>

                            <?php endif; ?>      
                            <div class="card border-0">
                            <?php if (!empty($data['image'])): ?>
                                <img src="data:image/jpeg;base64,<?= $data['image'] ?>" alt="<?= htmlspecialchars($data['title']) ?>">
                            <?php endif; ?> 
                            
                                    
                          <div class="card-text"> 

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

                                        <button id="btn<?= $data['id'] ?>" 
                                                onclick="showMore(<?= $data['id'] ?>)" 
                                                class="btn btn-link">
                                            Read more
                                        </button>

                                    <?php else: ?>

                                        <?= $description ?>

                                    <?php endif; ?>
                                    <dialog>

                                    </dialog>
                                <div style="width: 300px; height: 150px; background: none; flex-grow: 1;">

                                  <hr>
                                                                    
                            <div class="d-flex justify-content-between align-items-center">

                                <div>
                                    <i class="bi bi-chat"></i>

                                    <?= $data->getComments()->count() ?>

                                    <?= $data->getComments()->count() == 1 ? 'Comment' : 'Comments' ?>
                                </div>

                                <div>
                                    <?= Html::a(
                                        'Add comment',
                                        ['post/view', 'id' => $data->id],
                                        ['class' => 'btn btn-sm btn-outline-primary']
                                    ) ?>
                                </div>
                            </div>

</div>

</div>

</div>

</div>

<?php } ?>
                        

                    </div>


                                    <div class="col-sm-3">
                                        <div class="sidebar bg-white">
                                        <div class="card text-white signup-card">
                    <div class="card-header border-0 pb-0">
                        <h2 class="checklist-title">Signup Checklist</h2>
                        <p class="checklist-subtitle">0 of 3 completed</p>
                        
                        <div class="progress-track">
                            <div role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                        </div>
                    </div>
                    
                    <div class="card-body">
                        <ul class="checklist-items">
                            <li>Fill out your profile</li>
                            <li>Say hi in the Welcome thread</li>
                            <li>Write your first post</li>
                        </ul>
                    </div>
                </div>
                <br>
                        <div class="card">
                            <h6 class="sidebar-heading">Active discussions</h6>
                        <p>Active discussions
                I tested 3 models as AI agent quality inspectors: the stronger the model, the more valid work it ...
                18 comments
                Your Career Matters. So Does the Person Building It.
                15 comments
                What was your win this week?!
                5 comments
                PagedAttention: Navigating VRAM Fragmentation
                17 comments
                Welcome Thread - v382
                480 comments
                Congrats to the GitHub Finish-Up-A-Thon Challenge Winners!
                75 comments
                A New Personal Best: What Six Months of Locking In Can Do
                22 comments
                Every Post I Publish Gets AI Review. A Hostile Agent Still Found the Holes in Twenty Minutes.</p>
                    </div>
                    </div>
                    </div>
         </div>
         
     </div>


     
<script>
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
</script>

<script> //for the qick post
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

