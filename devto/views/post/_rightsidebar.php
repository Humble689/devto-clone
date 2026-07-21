<div class="sidebar bg-white">
    
    <!-- Signup Checklist Card -->
    <div class="card text-white signup-card border-0 mb-4 overflow-hidden">
        <div class="card-header border-0 pb-0">
            <h2 class="checklist-title">Signup Checklist</h2>
            <p class="checklist-subtitle">0 of 3 completed</p>
            
            <div class="progress-track">
                <div role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
        </div>
        
        <div class="card-body pt-2">
            <ul class="checklist-items">
                <li>Fill out your profile</li>
                <li>Say hi in the Welcome thread</li>
                <li>Write your first post</li>
            </ul>
        </div>
    </div>

    <!-- Active Discussions Card -->
    <div class="card border-0 shadow-sm p-3">
        <h6 class="sidebar-heading text-uppercase text-muted fw-bold mb-3" style="font-size: 12px; letter-spacing: 0.5px;">
            Active discussions
        </h6>
        
        <div class="d-flex flex-column gap-3">
            <?php
            // Fetch posts from your database dynamically using your active Record model
            $activeDiscussions = \app\models\Post::find()
                ->orderBy(['created_on' => SORT_DESC])
                ->limit(8)
                ->all();

            if (!empty($activeDiscussions)): 
                foreach ($activeDiscussions as $discussion): 
                    $commentCount = $discussion->getComments()->count(); 
                    ?>
                    
                    <div class="discussion-item">
                        <?= \yii\bootstrap5\Html::a(
                            \yii\bootstrap5\Html::encode($discussion->title),
                            ['post/view', 'id' => $discussion->id],
                            [
                                'class' => 'text-decoration-none text-dark fw-semibold d-block mb-1 lh-sm link-primary',
                                'style' => 'font-size: 14px;'
                            ]
                        ) ?>
                        
                        <span class="text-muted small d-inline-flex align-items-center">
                            <i class="bi bi-chat me-1"></i> 
                            <?= $commentCount ?> <?= $commentCount == 1 ? 'comment' : 'comments' ?>
                        </span>
                    </div>

                <?php 
                endforeach; 
            else: 
            ?>
                <p class="text-muted small my-2 ps-1">No active discussions found.</p>
            <?php endif; ?>
        </div>
    </div>
</div>
