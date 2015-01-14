<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\modules\winners\models\WinnersCompetitionType */

$this->title = 'Create Winners Competition Type';
$this->params['breadcrumbs'][] = ['label' => 'Winners Competition Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-competition-type-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
