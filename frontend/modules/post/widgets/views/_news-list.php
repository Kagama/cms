<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 23.06.14
 * Time: 20:14
 */
use yii\helpers\Html;

$menu = \common\modules\menu\models\Menu::find()->where('name = :name', [':name' => 'Новости'])->one();

?>
<div class="row">
<?php
if ($news_list == null) {
    ?>
    <div class="col-lg-24 info-block-item" >
        <div class="row radius-3px">
            Нет новостей
        </div>

    </div>
    <?php
} else {
    foreach ($news_list as $new) {
?>
    <div class="col-lg-24 info-block-item radius-3px">
        <div class="row ">
            <div class="col-lg-24">
                <?= Html::a($new->title, ['/'.$menu->url.'/'.$new->id."_".$new->alt_title]); ?>

                <p><?= $new->small_text ?></p>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-24 text-right author"><?= $new->user->camp->name ?></div>
        </div>
        <div class="row message-info">
            <div class="col-lg-16 date">
                <?= \Yii::$app->formatter->asDate($new->date, 'LLLL dd, y');?>

            </div>
            <div class="col-lg-4 comment">
                <span class="glyphicon glyphicon-comment">&nbsp;</span> <?php echo $new->getCommentCount() ?>
            </div>
            <div class="col-lg-4 views">
                <span class="glyphicon glyphicon-eye-open">&nbsp;</span> <?=$new->views_count ?>
            </div>
        </div>
    </div>
<?php
    }
}
?>
</div>
<div class="col-lg-24 read-more-block radius-3px">
    <?= Html::a('Все новости', ['/'.$menu->url])?>
</div>
