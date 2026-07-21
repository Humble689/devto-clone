<?php
use yii\helpers\Html;
?>
<!-- Removed the hardcoded col-sm-3 from here so the main index.php file controls column sizing -->
<div class="sidebar bg-white p-2">
    <ul class="list-unstyled mb-4 d-flex flex-column gap-1">
        <li>
            <?= Html::a('<i class="bi bi-house-door-fill me-2 text-primary"></i> Home', ['/post/index'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-trophy-fill me-2 text-warning"></i> DEV Challenges', ['/post/challenge'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-bookmark-fill me-2 text-success"></i> Reading List', ['/post/bookpage'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-stars me-2 text-info"></i> DEV++', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-play-btn-fill me-2 text-danger"></i> Videos', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-mortarboard-fill me-2 text-secondary"></i> Education', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-question-circle-fill me-2 text-muted"></i> Help', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-megaphone-fill me-2 text-dark"></i> Advertise', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-building me-2 text-primary"></i> Organizations', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-gem me-2 text-warning"></i> Showcase', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-info-circle-fill me-2 text-info"></i> About', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-envelope-fill me-2 text-success"></i> Contact', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
    </ul>

    <hr class="my-3 opacity-25">
    <h6 class="sidebar-heading px-3 text-muted text-uppercase small fw-bold mb-2">Other</h6>

    <ul class="list-unstyled d-flex flex-column gap-1">
        <li>
            <?= Html::a('<i class="bi bi-shield-check me-2 text-success"></i> Code of Conduct', ['post/conduct'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-lock-fill me-2 text-danger"></i> Privacy Policy', ['#'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
        <li>
            <?= Html::a('<i class="bi bi-file-earmark-text-fill me-2 text-secondary"></i> Terms of Use', ['post/terms'], ['class'=>'sidebar-link btn btn-link text-decoration-none text-start text-dark w-100 py-2 px-3 rounded']) ?>
        </li>
    </ul>

    <hr class="my-3 opacity-25">

    <div class="social-icons d-flex justify-content-start gap-3 px-3 fs-5 text-secondary">
        <a href="#" class="text-secondary-hover"><i class="bi bi-twitter-x"></i></a>
        <a href="#" class="text-secondary-hover"><i class="bi bi-facebook"></i></a>
        <a href="#" class="text-secondary-hover"><i class="bi bi-github"></i></a>
        <a href="#" class="text-secondary-hover"><i class="bi bi-instagram"></i></a>
    </div>
</div>
