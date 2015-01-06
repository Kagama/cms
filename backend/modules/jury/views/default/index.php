<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $searchModel common\modules\jury\models\search\JurySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Жюри';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jury-index padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

            'id',
            [
                'attribute' => 'img',
                'value' => function ($model) {
                    return Html::img("/".$model->img);
                },
                'format' =>'html'
            ],

            'flp',
            'bio:html',
            [
                'attribute' => 'publish',
                'value' => function ($model) {
                    return ($model->publish == 0 ? "Нет" : "Да");
                },
                'filter' => ['Нет', "Да"]
            ],


            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
