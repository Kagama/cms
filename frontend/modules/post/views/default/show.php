<?php

$this->title = $model->title . " - " . $menu->seo_title . " - " . Yii::$app->params['seo_title'];
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords]);
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->seo_description]);
?>

    <div class="article">
        <a href="<?= \yii\helpers\Url::toRoute("/" . $menu->url) ?>" class="back-link">&larr; <?= $menu->name ?></a>
    </div>
<?php
\common\widget\html\ActiveEdit::begin(['model' => $model, 'url' => "/post/simple-edit/edit"]);
?>
    <div class="big_info">
        <div class="title post">
            <h1><?= $model->title ?></h1>

        </div>
        <?php
        $string = strip_tags($model->small_text);
        $str_len = strlen($string);
        ?>
        <div class="desc">

            <p <?= ($str_len > 200 ? "style='font-size:12px; font-weight:normal;'" : "") ?>>

                <?= $string ?>
                <!--                        Заболевание, требующее экстренного оказания медицинской помощи-->
            </p>
        </div>
    </div>
    <div class="article">
        <?= $model->text ?>
    </div>

<?php
\common\widget\html\ActiveEdit::end();
?>
<?php
if ($menu->name == 'Обсуждение Вашего случая') {
    echo \frontend\modules\comment\widgets\Comments::widget([
        'model' => $model
    ]);
}
?>
