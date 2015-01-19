<?php

use yii\helpers\Html;

$this->registerAssetBundle('backend\modules\layoutEditor\assets\AceEditorAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $model common\modules\nomination\models\Nomination */

$this->title = 'Создать номинацию';
$this->params['breadcrumbs'][] = ['label' => 'Номинации', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomination-create padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
