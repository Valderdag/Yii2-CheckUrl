<?php

use yii\bootstrap4\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Link Checker';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-index">

    <div class="jumbotron text-center bg-transparent">
        <h1 class="display-4">Check Url Availability</h1>

        <?php $form = ActiveForm::begin(['id' => 'check-form']); ?>

        <?= $form->field($model, 'url', ['enableAjaxValidation' => false])->textInput(['style' => 'text-align:center', 'placeholder' => "Enter tested url"])->label(false) ?>
        <div class="btn-group" >
            <?= $form->field($model, 'repeat')->dropDownList(['1' => "1 ",
                '2' => "2 ",
                '3' => "3 ",
                '4' => "4 ",
                '5' => "5 ",
                '6' => "6 ",
                '7' => "7 ",
                '8' => "8 ",
                '9' => "9 ",
                '10' => "10 "], ['prompt' => 'Repeat', 'class' => 'dropdown dropright', 'data-toggle' => 'dropdown'])->label(false) ?>

            <?= $form->field($model, 'timeout')->dropDownList(['1' => "1 second", '5' => "5 second", '10' => "10 second"], ['prompt' => 'Timeout', 'class' => 'dropdown dropleft', 'data-toggle' => 'dropdown'])->label(false) ?>
        </div>


        <p style="margin-top: 30px">
            <?= Html::submitButton('Check Now!', ['class' => 'btn btn-primary btn-lg', 'name' => 'check-button']) ?>
        </p>

        <?php ActiveForm::end(); ?>
    </div>
</div>
