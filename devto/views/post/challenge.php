<?php

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'My Yii Application';
$this->params['meta_description'] = 'A high-performance PHP framework best for developing web applications. Fast, secure, and professional.';
$this->params['meta_keywords'] = 'yii, yii2, php, framework, web application, high-performance';
?>
<div class="site-index">

    <!-- Hero banner with Yii gradient -->
    <!-- <div class="hero-banner text-white rounded-4 p-5 mb-4 position-relative overflow-hidden"> -->
        <?= Html::img(Yii::getAlias('@web/images/challenge.webp'), [
            'alt' => '',
            // 'class' => 'd-none d-lg-block position-absolute hero-logo',
        ]) ?>
        <div class="position-relative">
            <h1 class="display-5 fw-bold mb-3">Join a DEV Online Hackathon or Writing Challenge
</h1>
<div class="container-sm my-4">

<div class="card">
            <p class="lead opacity-75 mb-4 hero-lead">
                <div class="container">
                <h5>
                    What are DEV Challenges? 🧠
                </h5>
                DEV Challenges are mini Hackathons that provide a fun opportunity for you to build up experience using new tools or to publicly show off your best skills to the community, potential employers and more.


            </p>
            </div>
            </div>
</div>
                        
<div class="container-sm my-4">
    <div class="card p-4">
        <h4 class="fw-bold mb-4">Active Challenges</h4>
        
        <div class="row">
            <div class="col-md-5 col-sm-8"> 
                
                <div class="card p-3 shadow-sm">
                    <h5 class="fw-bold fs-6 mb-2">DEV's Summer Bug Smash</h5>
                    <p class="text-muted small mb-3">
                        Help us crush bugs and win amazing prizes this summer!
                    </p>
                    
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success rounded-pill px-3 py-2">Live</span>
                        <div class="d-flex align-items-center gap-1">
                            <small class="text-muted">→</small>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>

        <!-- </div> -->
    </div>


    <div class="container-sm my-4">
    <div class="card p-4">
        
        <h4 class="fw-bold mb-1">💎 DEV Diamond Sponsors</h4>
        <p class="text-muted small mb-4">
            Thank you to our Diamond Sponsors for supporting the DEV Community
        </p>
        
        <div class="row g-4 align-items-center">
            
            <div class="col-md-4 text-center">
                <div class="p-3">
                    <img src="#" alt="Google AI" class="img-fluid mb-3" style="max-height: 60px;">
                    <p class="text-muted fst-italic small px-2">
                        Google AI is the official AI Model and Platform Partner of DEV
                    </p>
                </div>
            </div>
            
            <div class="col-md-4 text-center">
                <div class="p-3">
                    <img src="#g" alt="Neon" class="img-fluid mb-3" style="max-height: 50px;">
                    <p class="text-muted fst-italic small px-2">
                        Neon is the official database partner of DEV
                    </p>
                </div>
            </div>
            
            <div class="col-md-4 text-center">
                <div class="p-3">
                    <img src="#" alt="Algolia" class="img-fluid mb-3" style="max-height: 50px;">
                    <p class="text-muted fst-italic small px-2">
                        Algolia is the official search partner of DEV
                    </p>
                </div>
            </div>
            
        </div> 
        
    </div>
</div>


<div class="container-sm my-4">
    <div class="card p-4">
        <h4 class="fw-bold mb-4">Previous Challenges</h4>
        
        <div class="row row-cols-1 row-cols-md-2 g-4">
            
            <div class="col">
                <div class="card p-3 h-100 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold fs-6 mb-2">Weekend Challenge: Passion Edition</h5>
                        <p class="text-muted small mb-3">A short-form challenge that fits into your weekend!</p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-1 mt-auto">
                        <!-- Badges and arrow -->
                        <small class="text-muted">→</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card p-3 h-100 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold fs-6 mb-2">June Solstice Game Jam</h5>
                        <p class="text-muted small mb-3">Build a game inspired by June and its many celebrations.</p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-1 mt-auto">
                        <small class="text-muted">→</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card p-3 h-100 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold fs-6 mb-2">GitHub Finish-Up-A-Thon Challenge</h5>
                        <p class="text-muted small mb-3">Finally finish what you started!</p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-1 mt-auto">
                        <small class="text-muted">→</small>
                    </div>
                </div>
            </div>

            <div class="col">
                <div class="card p-3 h-100 shadow-sm d-flex flex-column justify-content-between">
                    <div>
                        <h5 class="fw-bold fs-6 mb-2">Google I/O 2026 Writing Challenge</h5>
                        <p class="text-muted small mb-3">Tune into Google I/O and start exploring!</p>
                    </div>
                    <div class="d-flex justify-content-end align-items-center gap-1 mt-auto">
                        <small class="text-muted">→</small>
                    </div>
                </div>
            </div>

            <!-- Add more columns following the exact same structure for the remaining items -->

        </div> 
        
    </div>
</div>

