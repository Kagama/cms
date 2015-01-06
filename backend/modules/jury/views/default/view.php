<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $model common\modules\jury\models\Jury */

$this->title = $model->flp;
$this->params['breadcrumbs'][] = ['label' => 'Жюри', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jury-view padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Список', ['index'], ['class' => 'btn btn-default']) ?>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Обновить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы действительно хотите удалить запись?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'img',
                'value' => Html::img("/".$model->img),
                'format' => 'html'
            ],
            'flp',
            'bio:html',
            [
                'label' => 'Опубликован',
                'value' => ($model->publish == 0 ? "Нет" : "Да")
            ]

        ],
    ]) ?>

</div>
