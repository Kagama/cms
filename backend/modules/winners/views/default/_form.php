<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetition */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="winners-competition-form">

    <?php $form = ActiveForm::begin(); ?>
    <div class="row">
        <div class="col-lg-2">
            <?= $form->field($model, 'years')->textInput(['maxlength' => 16]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'type_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\winners\models\WinnersCompetitionType::find()->all(), 'id', 'name'), ['prompt' => '---']) ?>
        </div>
        <div class="col-lg-2">
            <?= $form->field($model, 'position')->textInput() ?>
        </div>
    </div>




    <?= $form->field($model, 'name')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="row">
        <?php
        foreach ($winners as $index => $winner) {
        ?>
            <div class="col-lg-4">
                <?php
                if ($index == 0) {
                    echo '<p style="background-color: #B4975A; text-align: center; color:#fff;">Золото</p>';
                }
                if ($index == 1) {
                    echo '<p style="background-color: #A7A9AC; text-align: center; color:#fff;">Серебро</p>';
                }
                if ($index == 2) {
                    echo '<p style="background-color: #693934; text-align: center; color:#fff;">Бронза</p>';
                }
                ?>

                <?= $form->field($winner, '['.$index.']name')->textInput(['maxlength' => 128]) ?>
                <?= $form->field($winner, '['.$index.']description')->textarea() ?>
            </div>
        <?php
        }
        ?>
    </div>



    <div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
