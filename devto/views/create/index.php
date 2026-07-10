<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<div class="container">
<div class="row">
    
    
         <div class="col-sm-7">
            <?php $form = ActiveForm:: begin() ?>

            <?= $form->field($model, 'title') ?>
            <?= $form->field($model, 'descript')->label('Description') ?>
            <br>
            <?= $form->field($model, 'imageFile')->fileInput(['accept'=> 'image/*']) ?>
            <br>

            <?= Html::submitButton('Publish', ['class'=>'btn btn-primary']) ?>

            


          </div>
          <?php ActiveForm::end(); ?>
     
    <div class="col-sm-3">Writing a Great Post Title
Think of your post title as a super short (but compelling!) description — like an overview of the actual post in one short sentence.
Use keywords where appropriate to help ensure people can find your post by search.</div>


</div>
</div>
