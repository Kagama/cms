<?php

use yii\helpers\Html;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetitionType */

$this->title = 'Создать';
$this->params['breadcrumbs'][] = ['label' => 'Тип конкурса', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-competition-type-create padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
