<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\modules\user\models\User $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => 255]) ?>
    <?= $form->field($model, 'email')->textInput(['maxlength' => 255]) ?>

    <?= $form->field($model, 'role_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\user\models\UserRole::find()->all(), 'id', 'name'), ['prompt' => '---']) ?>

    <?= $form->field($model, 'status')->checkbox() ?>

    <!--    --><? //= $form->field($model, 'created_at')->textInput() ?>

    <!--    --><? //= $form->field($model, 'updated_at')->textInput() ?>

    <?= $form->field($model, 'approve_newsletter')->checkbox() ?>



    <!--    --><? //= $form->field($model, 'password_hash')->textInput(['maxlength' => 255]) ?>

    <!--    --><? //= $form->field($model, 'password_reset_token')->textInput(['maxlength' => 255]) ?>



    <!--    --><? //= $form->field($model, 'auth_key')->textInput(['maxlength' => 32]) ?>



    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
