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
                ['#'],
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
                        <?php shuffle($model) ?>

                        <?php foreach ($model as $data) 
                            { ?>
                        
                      
                        <div>
                            <h3> <?= $data['title'] ?></h3>
                                
                                &nbsp;
                            <?= Html::a('Edit', ['update/index', 'id'=> $data['id']],['data'=>['method'=> 'post']],) ?>                      
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

                                    </div>
                            
                            </div>  
                        
                     </div>

                <?php } ?>
                        

                    </div>


                    <div class="col-sm-3">
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

