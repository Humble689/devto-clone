<?php

use yii\helpers\Html;
?>
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
                ['post/conduct'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-lock-fill"></i> Privacy Policy',
                ['#'],
                ['class'=>'sidebar-link']) ?>
        </li>

        <li>
            <?= Html::a('<i class="bi bi-file-earmark-text-fill"></i> Terms of Use',
                ['post/terms'],
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