<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\stage\models\Stage */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="stage-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-2 ">
            <?= $form->field($model, 'number')->textInput() ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'date')->textInput(['maxlength' => 254]) ?>
        </div>
        <div class="col-lg-3 ">
            <label></label>
            <?= $form->field($model, 'current_stage')->checkbox() ?>
        </div>
        <div class="col-lg-3 ">
            <label></label>
            <?= $form->field($model, 'past_stage')->checkbox() ?>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6"><?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?></div>
        <div class="col-lg-6"><?= $form->field($model, 'url')->textInput(['maxlength' => 512]) ?></div>
    </div>







    <?= $form->field($model, 'note')->textarea(['maxlength' => 512]) ?>







    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
