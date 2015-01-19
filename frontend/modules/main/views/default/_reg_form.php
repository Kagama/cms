<?php
use yii\widgets\ActiveForm;


$form = ActiveForm::begin([
    'id' => 'reg_form',
]); ?>

<?php
if ($emailSendError) {
?>
    <p>
        Ошибка регистрации попробуйте зарегистрироваться через несколько 5 минут.
    </p>
<?php
}
?>

    <!--        <form action="/" id="reg_form">-->
<?=$form->field($regForm, 'seminar', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">
                        {input}
                        <label for="registrationform-seminar"></label>
                        {error}
                        {hint}
                    </div>
                </div>
            '
])->checkbox([], false)?>

<?=$form->field($regForm, 'brand_name', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>

                </div>
            '
])->textInput()?>

<?=$form->field($regForm, 'company_name', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>
                </div>
            '
])->textInput()?>

<?//=$form->field($regForm, 'nomination_id', [
//    'template' => '
//                <div class="row">
//                    <div class="col-md-4">{label}</div>
//                    <div class="col-md-8">{input}
//                    {error}
//                    {hint}
//                    </div>
//                </div>
//            '
//])->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\nomination\models\Nomination::find()->all(), 'id', "name"), ['prompt' => '---'])?>


<?=$form->field($regForm, 'nomination_id', [
            'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}
                    <div class="nomi_select">
                        <div class="select">
                            – – – – – –
                        </div>
                        <div class="list">
                            <ul class="select_list">

                            </ul>
                        </div>
                    </div>
                    {error}
                    {hint}
                    </div>
                </div>
            '
        ])->dropDownList(\yii\helpers\ArrayHelper::map(\common\modules\nomination\models\Nomination::find()->all(), 'id', "name"), ['prompt' => '---'])?>



    <p>Представитель компании</p>

<?=$form->field($regForm, 'first_name', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>
                </div>
            '
])->textInput()?>

<?=$form->field($regForm, 'last_name', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>
                </div>
            '
])->textInput()?>

<?=$form->field($regForm, 'job', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>
                </div>
            '
])->textInput()?>

<?=$form->field($regForm, 'phone', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>
                </div>
            '

])->textInput([
    'placeholder' => '+7 (495) 363 1111'
])?>

<?=$form->field($regForm, 'email', [
    'template' => '
                <div class="row">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">{input}{error}
                    {hint}</div>
                </div>
            ',

])->textInput([
    'placeholder' => 'user@server.com'
])?>


<?= $form->field($regForm, 'verifyCode',[
    'template' => '
                <div class="row captcha">
                    <div class="col-md-4">{label}</div>
                    <div class="col-md-8">
                        {input}
                        {error}
                        {hint}
                        <div class="cap_upd">
                            <img src="/img/icons/captcha.png"/> <span>Обновить картинку</span>
                        </div>

                    </div>
                </div>',
])->widget(\yii\captcha\Captcha::className(), [

    'imageOptions' => [
        'style' => 'height:32px;'
    ],
    'captchaAction' => 'default/captcha',
]); ?>

    <div class="row">
        <div class="col-md-4"><button class="reg inactive">Зарегистрироваться</button></div>
        <div class="col-md-8">Осталось заполнить поля: <span id="fields"></span></div>
    </div>
    <!--        </form>-->
<?php ActiveForm::end(); ?>