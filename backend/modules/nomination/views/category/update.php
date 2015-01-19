<?php

use yii\helpers\Html;


$this->registerAssetBundle('backend\modules\layoutEditor\assets\AceEditorAsset', \yii\web\View::POS_HEAD);


/* @var $this yii\web\View */
/* @var $model common\modules\nomination\models\NominationCategory */

$this->title = 'Обновить категорию: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Категория номинации', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Обновить';
?>
<div class="nomination-category-update padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
