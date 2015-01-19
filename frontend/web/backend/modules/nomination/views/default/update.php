<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\modules\nomination\models\Nomination */

$this->title = 'Update Nomination: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nominations', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nomination-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
