<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\modules\jury\models\Jury */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jury-form">

    <?php $form = ActiveForm::begin([
        'options' => [
            'enctype' => 'multipart/form-data'
        ]
    ]); ?>

    <?php
    if ($model->img != "") {
        echo Html::tag('div',
            Html::tag('div',
                Html::img("/".$model->img) . Html::a(Html::tag('i', '', ['class' => 'fa fa-times-circle-o']) . " " . 'Удалить', ['/jury/default/remove-img', 'id' => $model->id],
                    [
                        'class' => 'btn btn-danger',
//                            'data' => [
//                                'confirm' => 'Вы действительно хотите удалить фото?',
//                                'method' => 'get',
//                            ]
                    ]), ['class' => 'photo-item']
            ), ['class' => 'show-img']
        );
    } else {
        echo $form->field($model, 'img')->fileInput();
    }
    ?>
    <div class="row">
        <div class="col-lg-6">
            <?= $form->field($model, 'flp')->textInput(['maxlength' => 512]) ?>
        </div>
        <div class="col-lg-6">
            <?= $form->field($model, 'position')->textInput(['maxlength' => 512]) ?>
        </div>
    </div>

    <?= $form->field($model, 'bio', [
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
            'paragraph' => false,
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
