<?php
use yii\captcha\Captcha;
use yii\helpers\Html;
use \yii\widgets\ActiveForm;
use yii\web\View;

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 01.07.14
 * Time: 17:18
 */

Yii::$app->getView()->registerJs("

//    $('.comment-form #comment-submit').on('click', function(){
//
//        var _url = $('.comment-form').attr('action');
//        $.ajax({
//            method:'post',
//            url:_url,
//            data:$('.comment-form').serialize(),
//            dataType:'json',
//            success: function (msg) {
//                if (msg.error) {
//                    alert(msg.message);
//                } else {
//                    $('#main_contact_form .success').slideDown( 400 ).delay( 2600 ).slideUp( 400 );
//                    $('.comment-form')[0].reset();
//                }
//            }
//        });
//        return false;
//    });
", View::POS_END, 'comment-form-actions')
?>


<div id="main_contact_form" style=" width: 650px; margin-top: 30px;">
    <div class="wrapper" style="width: 560px;">
        <h2>Форма добавления комментария</h2>
<!--        <div class="hit">Комментарий будет отображен после премодерации</div>-->
        <div id="success"></div>
        <div class="l" style=" width: 100%; ">
            <?php $form = ActiveForm::begin([
                'id' => 'contact-form',
                'action' => ['/comment/add'],
                'options' => [
                    'novalidate' => "novalidate",
                    'method' => "post",
                    'data-validate' => "parsley",
                    'class' => 'comment-form',

                ]
            ]); ?>
            <?= $form->errorSummary($model) ?>
            <?= $form->field($model, 'email')->textInput() ?>
            <?= $form->field($model, 'text')->textarea(['rows' => '7']) ?>

            <?=
            $form->field($model, 'verifyCode')->widget(Captcha::className(), [
                'options' => [
                    'placeholder' => 'Код',
                    'maxlength' => 8,
//                    'style' => 'width:95px;'
                ],
                'captchaAction' => '/comment/captcha',
            ]) ?>

            <?= Html::hiddenInput('CommentForm[model_name]', $obj->className()) ?>
            <?= Html::hiddenInput('CommentForm[model_id]', $obj->id) ?>
            <?= Html::hiddenInput('CommentForm[parent_id]', null, ['id' => 'CommentForm-parent_id']) ?>

            <input type="submit" value="Отправить" id="comment-submit">
        </div>
        <?php ActiveForm::end(); ?>
    </div>
</div>
