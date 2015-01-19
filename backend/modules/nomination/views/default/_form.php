<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\nomination\models\Nomination */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="nomination-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => 512]) ?>


    <?= $form->field($model, 'intro', [
        'template' => "
                {label}
                <div class='textarea-content'>{input}</div>
                {error}
            "
    ])->widget(sim2github\imperavi\widgets\Redactor::className(), [
        'options' => [
            'debug' => 'true',
        ],
        'clientOptions' => [ // [More about settings](http://imperavi.com/redactor/docs/settings/)
            'convertImageLinks' => 'false', //By default
            'convertVideoLinks' => 'false', //By default
            'buttonSource' => true,
            //'wym' => 'true',
            //'air' => 'true',
            'linkEmail' => 'true', //By default
            'lang' => 'ru',
            'tidyHtml' => true,
            'allowedTags' => ['p', 'blockquote', 'b', 'strong', 'i', 'ul', 'li', 'ol', 'a', 'div', 'span', 'bold', 'table', 'tr', 'td', 'thead', 'tbody', 'tfoot', 'img', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            'phpTags' => true,
            'pastePlainText' => false,
            'replaceDivs' => false,
            'paragraphy' => false,
            'convertDivs' => false,
            'deniedTags' => false,
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
                <div class='textarea-content'>{input}</div>
                {error}
            "
    ])->widget(sim2github\imperavi\widgets\Redactor::className(), [
        'options' => [
            'debug' => 'true',
        ],
        'clientOptions' => [ // [More about settings](http://imperavi.com/redactor/docs/settings/)
            'convertImageLinks' => 'false', //By default
            'convertVideoLinks' => 'false', //By default
            'buttonSource' => true,
            //'wym' => 'true',
            //'air' => 'true',
            'linkEmail' => 'true', //By default
            'lang' => 'ru',
            'tidyHtml' => true,
            'allowedTags' => ['p', 'blockquote', 'b', 'strong', 'i', 'ul', 'li', 'ol', 'a', 'div', 'span', 'bold', 'table', 'tr', 'td', 'thead', 'tbody', 'tfoot', 'img', 'h1', 'h2', 'h3', 'h4', 'h5', 'h6'],
            'phpTags' => true,
            'pastePlainText' => false,
            'replaceDivs' => false,
            'paragraphy' => false,
            'convertDivs' => false,
            'deniedTags' => false,
//            'imageGetJson' =>  \Yii::getAlias('@web').'/redactor/upload/imagejson', //By default
            'plugins' => [ // [More about plugins](http://imperavi.com/redactor/plugins/)
                'ace',
                'clips',
                'fullscreen'
            ]
        ],

    ])
    ?>
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model, 'category_id')->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\nomination\models\NominationCategory::find()->all(), 'id', 'name'), ['prompt' => '---']) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'link')->textInput(['maxlength' => 512]) ?>
        </div>
        <div class="col-lg-4">
            <?= $form->field($model, 'position')->textInput() ?>
        </div>

    </div>


    <fieldset>
        <legend>SEO Атрибуты</legend>
        <?= $form->field($model, 'seo_title')->textInput(['maxlength' => 512]) ?>

        <?= $form->field($model, 'seo_keywords')->textInput(['maxlength' => 512]) ?>

        <?= $form->field($model, 'seo_description')->textarea(['rows' => 6]) ?>
    </fieldset>

    <div class="form-actions">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
