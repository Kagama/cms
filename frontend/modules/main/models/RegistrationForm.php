<?php
/**
 * Created by PhpStorm.
 * User: pashaevs
 * Date: 18.01.15
 * Time: 3:07
 */

namespace frontend\modules\main\models;

use common\modules\participant\models\ParticipantOfCompetition;
use yii\base\Model;

class RegistrationForm extends Model
{


    public $seminar;
    public $brand_name;
    public $company_name;
    public $nomination_id;
    public $first_name;
    public $last_name;
    public $job;
    public $phone;
    public $email;
    public $verifyCode;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['brand_name'], 'required', 'message' => 'Пожалуйста, укажите брэнд'],
            [['company_name'], 'required', 'message' => 'Пожалуйста, укажите компанию'],
            [['first_name'], 'required', 'message' => 'Пожалуйста, укажите Ваше имя'],
            [['last_name'], 'required', 'message' => 'Пожалуйста, укажите Вашу фамилию'],
            [['job'], 'required', 'message' => 'Пожалуйста, укажите Вашу должность'],
            [['phone'], 'required', 'message' => 'Пожалуйста, укажите номер телефона'],
            [['email'], 'required', 'message' => 'Пожалуйста, укажите e-mail'],
            [['nomination_id'], 'required', 'message' => 'Пожалуйста, укажите номинацию'],
            [['verifyCode'], 'required'],

            [['seminar', 'nomination_id'], 'integer'],

            [['brand_name', 'company_name', 'first_name', 'last_name', 'job', 'email', 'verifyCode'], 'string', 'min' => 2, 'max' => 255],

            [['phone'], 'match', 'pattern' => '/^(\+7|8)\s?\((\d{3}|\d{5})\)\s?(\d{5}|(\d{3}\s?\d{2}\s?\d{2}))$/i', 'message' => 'Пожалуйста, укажите номер телефона в формате +7 (495) 363 1111'],
            [['phone'], 'string', 'min' => 11, 'max' => 24],

            [['email'], 'email', 'message' => 'Пожалуйста, укажите корректный e-mail в формате user@server.com'],

            ['verifyCode', 'captcha', 'captchaAction' => 'main/default/captcha'],
            ['email', 'unique', 'targetClass' => '\common\modules\participant\models\ParticipantOfCompetition', 'message' => 'Email адрес уже занят.'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'seminar' => 'Участвовать в семинаре',
            'brand_name' => 'Название брэнда',
            'company_name' => 'Название компании',
            'nomination_id' => 'Номинация',
            'first_name' => 'Имя',
            'last_name' => 'Фамилия',
            'job' => 'Должность',
            'phone' => 'Номер телефона',
            'email' => 'Электронная почта',
            'verifyCode' => 'Введите цифры с картинки'
        ];
    }

    public function add()
    {
        $model = new ParticipantOfCompetition();
        $model->setAttributes($this->getAttributes());
        $model->reg_date = time();
        if ($model->save()) {
            return \Yii::$app->mailer->compose('/mail/registration', ['participant' => $model])
                                    ->setFrom($model->email)
                                    ->setTo(\Yii::$app->params['adminEmail'])
                                    ->setSubject('Заявка на регистрацию от '.date('d/m/Y', $model->reg_date)."г.")
                                    ->send();
        }

    }
}