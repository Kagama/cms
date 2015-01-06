<?php

$this->title = $model->title . " - " . $menu->seo_title . " - " . Yii::$app->params['seo_title'];
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $model->seo_keywords]);
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $model->seo_description]);
?>




<?php
\common\widget\html\ActiveEdit::begin(['model' => $model, 'url' => "/post/simple-edit/edit"]);
?>
<article class="nominees">

    <div class="container">
        <a href="<?= \yii\helpers\Url::toRoute("/" . $menu->url) ?>" class="back-link">&larr; <?= $menu->name ?></a>
        <h1><?= $model->title ?></h1>

        <?= $model->text ?>
    </div>

</article>
<?php
//$string = strip_tags($model->small_text);
//$str_len = strlen($string);
//?>
<!---->
<!--    <p --><?//= ($str_len > 200 ? "style='font-size:12px; font-weight:normal;'" : "") ?><!-->
<!---->
<!--        --><?//= $string ?>


<?php
\common\widget\html\ActiveEdit::end();
?>

