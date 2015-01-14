<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetition */

$this->title = 'Create Winners Competition';
$this->params['breadcrumbs'][] = ['label' => 'Winners Competitions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-competition-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
