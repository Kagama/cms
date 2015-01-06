<?php

use yii\helpers\Html;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $model common\modules\jury\models\Jury */

$this->title = 'Создать запись';
$this->params['breadcrumbs'][] = ['label' => 'Жюри', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jury-create padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
