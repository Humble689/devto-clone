<?php
/** @var yii\web\View $this */

use yii\helpers\Html;
use yii\widgets\ActiveForm;

?>
<div class="container">
<div class="row">
    
    
         <div class="col-sm-7">
            <?php $form = ActiveForm:: begin() ?>

            <?= $form->field($model, 'comment') ?>
            <br>
            <br>

            <?= Html::submitButton('Update', ['class'=>'btn btn-primary']) ?>
           

             <?= Html::a('Back',['post/view']) ?>


          </div>
          <?php ActiveForm::end(); ?>