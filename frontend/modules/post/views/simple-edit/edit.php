<?php

use yii\helpers\Html;
/**
 * @var yii\web\View $this
 * @var common\modules\post\models\Post $model
 */
if (Yii::$app->session->hasFlash('post-success')) {
    $this->registerJs('$.fancybox.close();');
}
?>

<div class="news-update">
    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
