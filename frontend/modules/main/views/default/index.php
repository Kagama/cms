<?php
use \yii\helpers\Html;

/**
 * Created by PhpStorm.
 * User: developer
 * Date: 16.05.14
 * Time: 12:01
 */


$this->title = Yii::$app->params['seo_title'];
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => Yii::$app->params['seo_keywords']]);
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => Yii::$app->params['seo_description']]);
?>
<!-- Описание -->
<section class="main-description">

    <div class="left">
        <div class="big_y">2014</div>
    </div>

    <div class="right">
        <div class="big_y">2015</div>

        <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
            'id' => 4
        ]);?>
        <div class="row">
            <div class="col-md-4">
                <a href="" class="reg">Регистрация</a>
            </div>

            <div class="col-md-8">
                <p>Для подачи заявки на конкурс и участия в семинаре пройдите онлайн-регистрацию. Бланки заявки мы пришлем по электронной почте.</p>
            </div>
        </div>

    </div>

</section>

<!-- Слайдер новостей -->
<section class="news-slider">
    <div class="container">

        <h1>Новости</h1>

        <div class="row">

            <div class="button left"><img src="/img/icons/slider_prev.png" /></div>

            <div class="slider">
                <?php
                $menuNews = \common\modules\menu\models\Menu::find()->where(['id' => 4])->one();
                $news = \common\modules\post\models\Post::find()->where(['menu_id' => $menuNews->id])->all(); // Новости
                foreach ($news as $_new) {
                    ?>
                    <div class="col-xs-12 col-sm-6 col-md-6 item">

                        <h3><?=Html::a($_new->title, ['/' . $menuNews->url . '/' . $_new->id . "_" . $_new->alt_title])?></h3>
                        <h5><?=Yii::$app->formatter->asDate($_new->date, "d MMMM")?></h5>
                        <?=strip_tags($_new->small_text)?>
                    </div>
                <?php
                }
                ?>
            </div>

            <div class="button right"><img src="/img/icons/slider_next.png" /></div>

        </div>
    </div>
</section>

<!-- О премии -->
<section class="main-about">
    <div class="container">
        <div class="row">
            <div class="col-xs-7 col-sm-8 col-md-9">
                <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
                    'id' => 3
                ]);?>

            </div>
            <div class="col-xs-5 col-sm-4 col-md-3">
                <img src="/uploads/1/1.jpg">
            </div>
        </div>

    </div>
</section>

<!-- Этапы конкурса -->
<section class="levels">
    <div class="container">

        <h1>Этапы 2014</h1>
        <div class="row">
            <?php
            $stages = \common\modules\stage\models\Stage::find()->all();

            foreach ($stages as $index => $stage) {
                ?>
                <div class="col-xs-6 col-sm-4 col-md-3 level <?=$stage->past_stage == 1  ? "disabled" : ""?> <?=$stage->current_stage == 1  ? "current" : ""?>">
                    <h2><?=$stage->number?></h2>
                    <span class="date <?=(count($stages) == ($index + 1) ? "t-g" : "")?>"><?=$stage->date?></span>
                    <a class="title"><?=$stage->title?></a>
                    <span class="stat"><?=($stage->past_stage == 1 ? "Этап завершен" : $stage->note)?></span>
                </div>
            <?php
            }
            ?>
        </div>

    </div>
    </div>
</section>

<!-- Слайдер жюри -->
<section class="jury-slider">
    <div class="container">

        <h1>Жюри конкурса</h1>

        <div class="row">
            <div class="button left"><img src="/img/icons/slider_prev.png" /></div>

            <div class="slider">

                <?php
                $juryArr = \common\modules\jury\models\Jury::find()->all();

                foreach ($juryArr as $_jury) {
                ?>
                    <div class="col-xs-6 cols-sm-4 col-md-3 item">
                        <?=Html::img("/".$_jury->img, ['alt' => $_jury->flp])?>
                        <?php
                        $flpExplode = explode(" ", $_jury->flp);
                        echo "<span>".implode("</span><span>", $flpExplode)."</span>";
                        ?>
                    </div>
                <?php
                }
                ?>

            </div>

            <div class="button right"><img src="/img/icons/slider_next.png" /></div>

            <div class="col-md-4 all">
                <?php
                $_menu = \common\modules\menu\models\Menu::find()->where(['name' => 'Жюри конкурса'])->one();
                echo Html::a('Весь состав жюри', ['/'.$_menu->url], ['class' => 'reg']);
                unset($_menu);
                ?>

            </div>

        </div>

    </div>
</section>

<!-- Номинации -->
<section class="main-about">
    <div class="container">
        <div class="row">

            <div class="col-xs-7 col-sm-8 col-md-9">
                <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
                    'id' => 5
                ]);?>
            </div>

            <div class="col-xs-5 col-sm-4 col-md-3">
                <img src="/img/photo/1.jpg" alt="">
            </div>

        </div>
    </div>
</section>

<!-- Партнеры -->
<section class="main-partners">
    <div class="container">
        <div class="row">

            <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
                'id' => 6
            ]);?>

        </div>
    </div>
</section>

<!-- Контакты -->
<section class="main-contacts">
    <div class="container">
        <?=\common\modules\contentBlock\widget\ContentBlockWidget::widget([
            'id' => 7
        ]);?>
    </div>
</section>
