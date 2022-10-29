<?php

/** @var yii\web\View $this */

use yii\bootstrap5\ActiveForm;

$this->title = 'My Yii Application';
?>
<div class="site-index">

    
    </div>

    <div class="body-content">

       
    <?php $form=ActiveForm::begin()?>
    <?= $form->field($model,'ism')->textInput() ?>
    <?= $form->field($model,'username')->textInput() ?>
    <?= $form->field($model,'password')->passwordInput() ?>
    <?= $form->field($model,'password_c')->passwordInput() ?>
    <?php ActiveForm::end()?>

    </div>
</div>
