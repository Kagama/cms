<?php
use yii\helpers\Html;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use frontend\widgets\Alert;

/**
 * @var \yii\web\View $this
 * @var string $content
 */
AppAsset::register($this);

$user = \common\modules\user\models\User::findIdentity(Yii::$app->user->getId());
$is_admin = false;
if (!empty($user) && $user->role->id == 1) {
    $is_admin = true;
}

?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>"/>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>


    <?php
    if ($is_admin) {
        ?>
        <link href="/css/application.css" rel="stylesheet">

        <!-- Add fancyBox -->
        <link rel="stylesheet" href="/js/fancybox/source/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen"/>

        <!-- Optionally add helpers - button, thumbnail and/or media -->
        <link rel="stylesheet" href="/js/fancybox/source/helpers/jquery.fancybox-buttons.css?v=1.0.5" type="text/css"
              media="screen"/>

        <link rel="stylesheet" href="/js/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" type="text/css"
              media="screen"/>
    <?php
    }
    ?>
    <link rel="shortcut icon" href="/favicon.ico?v=2" type="image/x-icon">
    <link rel="icon" href="/favicon.ico?v=2" type="image/x-icon">

</head>
<body>
<?php $this->beginBody() ?>
<header>


    <?php
    if (Yii::$app->controller->uniqueId == "main/default" && Yii::$app->controller->action->id == "index") {
        echo "main menu";
    } else {
        $menu = \common\modules\menu\models\Menu::find()->where(['group_id' => 1])->all();
        ?>
        <!-- РБК Представляет -->
        <div class="top_line">
            <img src="/img/logo.png" alt="">
        </div>

        <!-- Информация о конкурсе -->
        <div class="top_info">
            <div class="container">
                <div class="row">

                    <!-- Ну тут все ясно -->
                    <div class="col-md-2 brand">
                        Брэнд года
                    </div>

                    <!-- Логотип конкурса -->
                    <div class="col-md-3 award">
                        <img src="/img/award.png" alt="">
                    </div>

                    <!-- Меню навигации -->
                    <div class="col-md-7 top_menu">
                        <nav>

                            <ul>
                                <?php
                                $url = Yii::$app->request->getUrl();
                                $url = trim($url, ".html");
                                $ext = "";
                                foreach ($menu as $_m) {
                                    if ($_m->name == "Регистрация") {
                                        $ext = "extra";
                                    }
                                    echo Html::tag('li', Html::a($_m->name, ['/'.$_m->url]), ['class' => (('/'.$_m->url == $url ? 'active' : '')." ".$ext)]);
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    <?php
    }
    //        echo \common\modules\menu\widget\frontend\MenuWidget::widget([
    //            'menu_group' => 1
    //        ]);
    //        ?>

</header>
<?= Alert::widget() ?>
<?= $content ?>

<!-- Подвал -->
<footer>
    <div class="container">
        <div class="copyright">
            <p>РосБизнесКонсалтинг,<br>1995—2014</p>
        </div>
        <div class="copyright">
            <p>Effie Awards Russia</p>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>

    <!--    --><? //= Breadcrumbs::widget([
    //        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [""],
    //    ]) ?>

<?php
if ($is_admin) {
    ?>
    <!-- Add fancyBox -->

    <script type="text/javascript" src="/js/fancybox/source/jquery.fancybox.pack.js?v=2.1.5"></script>
    <!-- Optionally add helpers - button, thumbnail and/or media -->

    <script type="text/javascript" src="/js/fancybox/source/helpers/jquery.fancybox-buttons.js?v=1.0.5"></script>
    <script type="text/javascript" src="/js/fancybox/source/helpers/jquery.fancybox-media.js?v=1.0.6"></script>


    <script type="text/javascript" src="/js/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
<?php
}
?>
</body>
</html>
<?php $this->endPage() ?>
