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
            <div class="form-group">
                <div class="col-lg-offset-1 col-lg-11">
                    <?= Html::submitButton('Запустить проверку', ['class' => 'btn btn-primary']) ?>
                </div>
            </div>
            <?php ActiveForm::end() ?>
        </div>
    </div>
</div>