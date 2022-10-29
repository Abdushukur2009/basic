<?php

/** @var yii\web\View $this */
/** @var yii\bootstrap5\ActiveForm $form */
/** @var app\models\LoginForm $model */

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use yii\rest\OptionsAction;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">

    <p>Please fill out the following fields to login:</p>
    <?php
    $form = ActiveForm::begin([]);

    ?>

    <?= $form->field($model, 'ason')->textInput(['value' => '0']) ?>
    <?= $form->field($model, 'bson')->textInput(['value' => '0']) ?>
    <?= $form->field($model, 'rasm[]')->fileInput(['multiple' => true, 'class'=>'d-none','id'=>'rasm'])->label('Open file',['for'=>'rasm','class'=>'btn btn-success btn-block']) ?>
    <?= $form->field($model, 'amal')->dropDownList(
        ['+' => '+', '-' => '-', '*' => '*', '/' => '/']
    ) ?>
    <?= HTML::submitButton('ishlash', ['class' => 'btn btn-success']) ?>
    <?php
    ActiveForm::end();


    
    ?>

    <div class="offset-lg-1" style="color:#bbb;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>