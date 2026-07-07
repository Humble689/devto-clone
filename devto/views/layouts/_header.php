<?php

declare(strict_types=1);

/** @var yii\web\View $this */

use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Html;

$items = [
    
    [
        'label' => 'Login',
        'url' => ['/site/login'],
        'visible' => Yii::$app->user->isGuest,
        
    ],
    [
        'label' => 'Logout (' . Html::encode(Yii::$app->user->identity?->username ?? '') . ')',
        'url' => ['/site/logout'],
        'linkOptions' => [
            'data-method' => 'post',
            'class' => 'nav-link logout',
        ],
        'visible' => !Yii::$app->user->isGuest,
    ],
];

?>
<header id="header">
    <?php NavBar::begin(
        [
            'brandLabel' => false,
            'brandUrl' => Yii::$app->homeUrl,
            'options' => ['class' => 'navbar navbar-expand-lg bg-white border-bottom'] 
        ],
    ) ?>

  


<div class="container-fluid d-flex align-items-center">


<div class="d-flex justify-content-center align-items-center flex-grow-1"> 
    <?= Html::a('<strong>DEV</strong>', ['post/'],['class'=>'bg-black text-white fs-4 p-1 rounded text-decoration-none']) ?>
    <!-- Search -->
    <form class="d-flex flex-grow-1 mx-4" style="max-width: 700px;">
    <div class="position-relative w-100">
        <input 
            class="form-control ps-5" 
            type="search" 
            placeholder="Find related posts..."
        >
        <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-muted"></i>
    </div>
</form>

</div>

       <!-- Right side -->
    <div class="d-flex align-items-center ms-auto gap-3">

        <!-- Create Post -->
        <?= Html::a(
            'Create Post',
            ['/create'],
            [
                'class' => 'btn btn-outline-primary '
            ]
        ) ?>

    <div class="d-flex align-items-center ms-auto gap-3">
        <i class="bi bi-bell fs-3"></i>
    </div>

        <!-- Profile -->
        <img 
            src="/var/www/html/devto-clone/devto/views/layouts/images/images.png"
            class="rounded-circle"
            width="40"
            height="40"
        >

    <?= Nav::widget(
        [
            'options' => ['class' => 'navbar-nav me-auto'],
            'encodeLabels' => false,
            'items' => $items,
        ],
    ) ?>
    <?= Html::button(
        '&#127769;',
        [
            'id' => 'theme-toggle',
            'class' => 'btn btn-link nav-link fs-5',
            'aria-label' => 'Switch to dark mode',
        ],
    ) ?>
    <?php NavBar::end() ?>
</header>

