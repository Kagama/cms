<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $searchModel common\modules\winners\models\search\WinnersCompetitionSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Победители прошлых лет';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="winners-competition-index padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать конкурс', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'years',
            [
                'attribute' => 'type_id',
                'value' => function($model, $action) {
                    return \common\modules\winners\models\WinnersCompetitionType::findOne($model->type_id)->name;
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\modules\winners\models\WinnersCompetitionType::find()->all(), 'id', 'name')
            ],

            'name',
            'description:ntext',
            // 'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
