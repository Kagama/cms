<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24.06.14
 * Time: 20:40
 */


?>
<?php
\common\widget\html\ActiveEdit::begin(['model' => $model, 'url' => "/post/simple-edit/edit"]);
?>
<div class="news-list">
    <?= \yii\helpers\Html::a($model->title, ['/' . $menu->url . '/' . $model->id . "_" . $model->alt_title], ['class' => 'title']); ?>
    <p>
        <?= $model->small_text ?>
    </p>
</div>
<?php
\common\widget\html\ActiveEdit::end();
?>
<br style="clear: both;"/>