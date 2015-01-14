<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetitionType */

$this->title = 'Update Winners Competition Type: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Winners Competition Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="winners-competition-type-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
