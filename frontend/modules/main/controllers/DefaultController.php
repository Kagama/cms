<?php

namespace frontend\modules\main\controllers;


use common\modules\participant\models\ParticipantOfCompetition;
use frontend\modules\main\models\ContactForm;
use Yii;
use yii\helpers\Json;
use yii\web\Controller;
use yii\base\InvalidParamException;
use yii\web\BadRequestHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use frontend\modules\main\models\RegistrationForm;


class DefaultController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['registration', 'captcha'],
                'rules' => [
                    [
                        'actions' => ['registration', 'captcha'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['registration', 'captcha'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['get'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'common\helpers\myCaptchaAction',
                'foreColor' => 0x666666,
                'maxLength' => 5,
                'fontFile' => '@frontend/web/font/carroisgothic-regular.ttf',
                'offset' => -1
                //'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex()
    {
//        $model = new ConsultationForm();
//        $cons = new Consultation();
//        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
//            if ($model->saveConsultation($cons)){
//
//            } else {
//
//            }
//        }
        $regForm = new RegistrationForm();


        if (Yii::$app->request->isAjax) {
            if ($regForm->load(Yii::$app->request->post())) {
                if (!$regForm->validate()) {
                    return Json::encode(['error' => true, 'html' => $this->renderPartial('_reg_form', ['regForm' => $regForm, 'emailSendError' => false])]);
                } else {
                    if ($regForm->add()) {
                        return Json::encode(['error' => false, 'html' => '<p>Мы благодарим Вас за интерес к премии EFFIE/Брэнд года.<br />Наш менеджер свяжется с Вами в ближайшее время, чтобы завершить оформление заявки.</p>']);
                    } else {
                        return Json::encode(['error' => true, 'html' => $this->renderPartial('_reg_form', ['regForm' => $regForm, 'emailSendError' => true])]);
                    }
                }
            }
        }


        return $this->render('index', [
            'regForm' => $regForm
        ]);
    }

    public function actionRegistration()
    {

    }

    /*public function actionLogin()
    {
        if (!\Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        $reg = new SignupForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        if ($reg->load(Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
        return $this->render('login', [
            'model' => $model,
            'reg' => $reg
        ]);
    }

    public function actionLogout()
    {
        Yii::$app->user->logout();
        return $this->goHome();
    }

    public function actionSignup()
    {

        $model = new SignupForm();
        if ($model->load(Yii::$app->request->post())) {
            $user = $model->signup();
            if ($user) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }

        return $this->render('signup', [
            'model' => $model,
        ]);
    }

    public function actionContact()
    {
        $model = new ContactForm();

        if (Yii::$app->request->isAjax) {

            if ($model->load(Yii::$app->request->post()) && $model->validate()) {

                if ($model->sendMessageTo()) {
                    echo Json::encode(['error' => false, 'message' => 'Спасибо за доверие! В ближайшее время мы свяжемся с Вами.']);
                    Yii::$app->end();
                } else {
                    echo Json::encode(['error' => true, 'message' => 'Письмо не отправленно к Администратору сайта.<br />Через некоторое время попробуйте еще раз.']);
                    Yii::$app->end();
                }
            } else {
                echo Json::encode(['error' => true, 'message' => 'Некоторые поля не заполнены']);
            }
            Yii::$app->end();
        }
    }*/
}
