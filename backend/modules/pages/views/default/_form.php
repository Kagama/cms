<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\modules\pages\models\Pages $model
 * @var yii\widgets\ActiveForm $form
 */

$this->registerAssetBundle('backend\modules\layoutEditor\assets\AceEditorAsset', \yii\web\View::POS_HEAD);

$this->registerJs('
    var editor = ace.edit("editor");
    editor.setTheme("ace/theme/monokai");
    editor.session.setMode("ace/mode/php!pure")
    editor.session.setMode({path: "ace/mode/php", pure:true, /*other options here*/})
    var textarea = $("#pages-text").hide();
    editor.getSession().setValue(textarea.val());
    editor.getSession().on("change", function(){
      textarea.val(editor.getSession().getValue());
    });
    ', \yii\web\View::POS_READY);
?>
<section class="widget">
    <div class="pages-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => 512]) ?>

        <?= $form->field($model, 'file_name')->textInput(['maxlength' => 512]) ?>

        <div style="height: 600px; position: relative; ">
            <?=$form->field($model, 'text')->textarea(['maxlength' => 512]);?>
            <div id="editor">
            </div>
        </div>



        <?//= $form->field($model, 'text')->widget(sim2github\imperavi\widgets\Redactor::className(), [
        //             'options' => [
        //                 'debug' => 'true',
        //             ],
        //             'clientOptions' => [ // [More about settings](http://imperavi.com/redactor/docs/settings/)
        //                 'convertImageLinks' => 'true', //By default
        //                 'convertVideoLinks' => 'true', //By default
        //                 //'wym' => 'true',
        //                 //'air' => 'true',
        //                 'linkEmail' => 'true', //By default
        //                 'lang' => 'ru',
        // //            'imageGetJson' =>  \Yii::getAlias('@web').'/redactor/upload/imagejson', //By default
        //                 'plugins' => [ // [More about plugins](http://imperavi.com/redactor/plugins/)
        //                     'ace',
        //                     'clips',
        //                     'fullscreen'
        //                 ]
        //             ],

        //         ])
        ?>
<!--        <fieldset>-->
<!--            <legend>SEO Атрибуты</legend>-->
<!--            --><?//= $form->field($model, 'seo_title')->textInput(['maxlength' => 512]) ?>
<!---->
<!--            --><?//= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 512]) ?>
<!---->
<!--            --><?//= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>
<!--        </fieldset>-->


        <div class="form-actions">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</section>
