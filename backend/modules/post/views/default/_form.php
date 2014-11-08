<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\modules\post\models\Post $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<section class="widget">
    <div class="news-form">

        <?php $form = ActiveForm::begin([
            'options' => [
                'novalidate' => "novalidate",
                'method' => "post",
                'data-validate' => "parsley"
            ]
        ]); ?>

        <?= $form->field($model, 'date')->textInput(['class' => 'date-picker2 form-control', 'style' => 'width:90px; z-index:999;']); ?>
        <script type="text/javascript">
            $(document).ready(function () {
                $('.date-picker2').datepicker({
                    format: "dd-mm-yyyy"

                });
            });
        </script>
<!--        --><?//= $form->field($model, 'publish')->checkbox(); ?>


        <?= $form->field($model, 'menu_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\menu\models\Menu::find()->where('module_id = 1')->all(), 'id', 'name'), ['prompt' => '---']) ?>
        <?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

        <?= $form->field($model, 'small_text', [
            'template' => "
                {label}
                <div style='color:#000;'>
                {input}
                </div>
                {error}
            "
        ])->widget(sim2github\imperavi\widgets\Redactor::className(), [
            'options' => [
                'debug' => 'true',
            ],
            'clientOptions' => [ // [More about settings](http://imperavi.com/redactor/docs/settings/)
                'convertImageLinks' => 'true', //By default
                'convertVideoLinks' => 'true', //By default
                'buttonSource' => true,
                //'wym' => 'true',
                //'air' => 'true',
                'linkEmail' => 'true', //By default
                'lang' => 'ru',
//            'imageGetJson' =>  \Yii::getAlias('@web').'/redactor/upload/imagejson', //By default
                'plugins' => [ // [More about plugins](http://imperavi.com/redactor/plugins/)
                    'ace',
                    'clips',
                    'fullscreen'
                ]
            ],

        ])
        ?>

        <?= $form->field($model, 'text', [
            'template' => "
                {label}
                <div style='color:#000;'>
                {input}
                </div>
                {error}
            "
        ])->widget(sim2github\imperavi\widgets\Redactor::className(), [
            'options' => [
                'debug' => 'true',
            ],
            'clientOptions' => [ // [More about settings](http://imperavi.com/redactor/docs/settings/)
                'convertImageLinks' => 'true', //By default
                'convertVideoLinks' => 'true', //By default
                'buttonSource' => true,
                'wym' => 'true',
                'air' => 'true',
                'linkEmail' => 'true', //By default
                'lang' => 'ru',
//            'imageGetJson' =>  \Yii::getAlias('@web').'/redactor/upload/imagejson', //By default
                'plugins' => [ // [More about plugins](http://imperavi.com/redactor/plugins/)
                    'ace',
                    'clips',
                    'fullscreen'
                ]
            ],

        ])
        ?>

        <fieldset>
            <legend>SEO Атрибуты</legend>
            <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 512]) ?>

            <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 512]) ?>

            <?= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>
        </fieldset>


        <div class="form-actions">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'submit', 'value' => 'submit']) ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;или&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-danger', 'name' => 'submit', 'value' => 'publish']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</section>

