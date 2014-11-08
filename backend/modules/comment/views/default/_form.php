<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\modules\comment\models\Comment $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="comment-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false
    ]); ?>

    <?= $form->field($model, 'publish')->checkbox() ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => 512]) ?>

    <?= $form->field($model, 'date')->textInput(['class' => 'date-picker2 form-control', 'style' => 'width:90px;']); ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('.date-picker2').datepicker({
                format: "dd-mm-yyyy"

            });
        });
    </script>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <?= Html::activeHiddenInput($model, 'model_name')?>

    <?= Html::activeHiddenInput($model, 'model_id')?>

    <?= Html::activeHiddenInput($model, 'user_id')?>



    <?= Html::activeHiddenInput($model, 'parent_id')?>

    <?= Html::activeHiddenInput($model, 'level')?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
