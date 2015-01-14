<?php

use yii\helpers\Html;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);


/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetition */

$this->title = 'Создать конкурс';
$this->params['breadcrumbs'][] = ['label' => 'Побудители прошлых лет', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-competition-create padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'winners' => $winners
    ]) ?>

</div>
