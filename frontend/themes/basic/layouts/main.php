<?php
use yii\helpers\Html;
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
    <!--[if lt IE 9]>
    <script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" type="text/css" href="/css/no-queries-ie-8.css">
    <![endif]-->


    <?php
    if ($is_admin) {
        ?>

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
    $menu = \common\modules\menu\models\Menu::find()->where(['group_id' => 1])->all();

    if (Yii::$app->controller->uniqueId == "main/default" && Yii::$app->controller->action->id == "index") {
        ?>
        <!-- РБК Представляет -->
        <div class="top_line">
            <img src="/img/logo.png" alt="">
        </div>

        <!-- Информация о конкурсе -->
        <div class="top_info main">
            <div class="container">
                <div class="row">

                    <!-- Ну тут все ясно -->
                    <a class="col-xs-12 col-sm-5 col-md-3 col-md-push-0 brand main" href="<?=\yii\helpers\Url::home()?>">
                        Брэнд года
                    </a>

                    <!-- Логотип конкурса -->
                    <a class="col-xs-12 col-sm-7 col-md-5 col-md-push-0 award" href="<?=\yii\helpers\Url::home()?>">
                        <img src="/img/award_big.png" alt="effie awards russia">
                    </a>

                    <!-- Меню навигации -->
                    <div class="col-xs-12 col-sm-12 col-md-4 top_menu">
                        <?= \common\modules\contentBlock\widget\ContentBlockWidget::widget([
                            'id' => 1
                        ]);
                        ?>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12 top_menu main">
                        <nav>
                            <ul>
                                <?php
                                $count = count($menu);

                                foreach ($menu as $index => $_m) {
                                    if ($_m->name == "Регистрация") {
                                        continue;
                                    }
                                    echo Html::tag('li', Html::a($_m->name, ['/' . $_m->url]));
                                }
                                ?>
                            </ul>
                        </nav>
                    </div>

                </div>
            </div>
        </div>
    <?php
    } else {

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
                    <a class="col-md-2 brand" href="<?=\yii\helpers\Url::home()?>">
                        Брэнд года
                    </a>

                    <!-- Логотип конкурса -->
                    <a class="col-md-3 award" href="<?=\yii\helpers\Url::home()?>">
                        <img src="/img/award.png" alt="effie awards russia">
                    </a>

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
                                        echo Html::tag('li', Html::a($_m->name, '/?form=registration'), ['class' => (('/' . $_m->url == $url ? 'active' : (substr_count($url, $_m->url) > 0 ? 'active' : '')) . " extra")]);
                                    }  else {
                                        echo Html::tag('li', Html::a($_m->name, ['/' . $_m->url]), ['class' => (('/' . $_m->url == $url ? 'active' : (substr_count($url, $_m->url) > 0 ? 'active' : '')))]);
                                    }

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
<?//= Alert::widget() ?>
<?= $content ?>

<!-- Подвал -->
<footer>
    <div class="container">
        <div class="copyright">
            <p>РосБизнесКонсалтинг,<br>2014—2015</p>
        </div>
        <div class="copyright">
            <p>Effie Awards Russia</p>
        </div>
    </div>
</footer>
<?php $this->endBody() ?>

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
<script type="text/javascript">
    (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
        (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
        m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
    })(window,document,'script','//www.google-analytics.com/analytics.js','ga');

    ga('create', 'UA-58465779-1', 'auto');
    ga('send', 'pageview');

</script>
</body>
</html>
<?php $this->endPage() ?>
