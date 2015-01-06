<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $model common\modules\stage\models\Stage */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Этапы конкурса', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="stage-view padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Сипсок', ['index', 'id' => $model->id], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Создать', ['create', 'id' => $model->id], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить этап?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'number',
            'title',
            'url:url',
            'note',
            'date',
            [
                'label' => 'Текущий этап',
                'value' => ($model->current_stage == 0 ? "Нет" : "Да")
            ],
            [
                'label' => 'Завершенный этап',
                'value' => ($model->past_stage == 0 ? "Нет" : "Да")
            ],

        ],
    ]) ?>

</div>
