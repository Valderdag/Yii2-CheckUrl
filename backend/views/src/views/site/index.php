<?php
use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

$this->title = 'Массовая проверка урлов';
$this->params['breadcrumbs'] = [['label' => $this->title]];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-6">
           <?php $form = ActiveForm::begin(['id' => 'mcheck-form'])?>
            <?= $form->field($model, 'listurl')->textarea() ?>
            <?= $form->field($model, 'attempt')->dropDownList(['1' => "1 ",
                '2' => "2 ",
                '3' => "3 ",
                '4' => "4 ",
                '5' => "5 ",
                '6' => "6 ",
                '7' => "7 ",
                '8' => "8 ",
                '9' => "9 ",
                '10' => "10 "], ['prompt' => 'Attempt', 'class' => 'dropdown dropright', 'data-toggle' => 'dropdown'])->label(false) ?>

            <?= $form->field($model, 'delay')->dropDownList(['1' => "1 second", '5' => "5 second", '10' => "10 second"], ['prompt' => 'Delay', 'class' => 'dropdown dropleft', 'data-toggle' => 'dropdown'])->label(false) ?>
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Запустить проверку', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>