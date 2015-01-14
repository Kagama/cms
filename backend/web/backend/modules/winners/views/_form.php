<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="winners-competition-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'years')->textInput(['maxlength' => 16]) ?>

    <?= $form->field($model, 'type_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'position')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
