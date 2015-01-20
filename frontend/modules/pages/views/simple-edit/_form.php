<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var common\modules\post\models\Post $model
 * @var yii\widgets\ActiveForm $form
 */
?>
<!--<section class="widget">-->
    <div class="row news-form">

        <?php $form = ActiveForm::begin([
            'options' => [
                'novalidate' => "novalidate",
                'method' => "post",
                'data-validate' => "parsley"
            ]
        ]); ?>


        <?= $form->field($model, 'small_text', [
            'template' => '
                {label}
                <div class="textarea-content">{input}</div>
                {error}
            '
        ])->widget(sim2github\imperavi\widgets\Redactor::className(), [
//            'options' => [
//                'debug' => 'true',
//            ],
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
                'debug' => 'false',
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

        <div class="form-actions">
            <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary', 'name' => 'submit', 'value' => 'submit']) ?>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;или&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            <?= Html::submitButton('Опубликовать', ['class' => 'btn btn-danger', 'name' => 'submit', 'value' => 'publish']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
<!--</section>-->

