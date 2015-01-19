<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->registerAssetBundle('backend\modules\layoutEditor\assets\AceEditorAsset', \yii\web\View::POS_HEAD);

/* @var $this yii\web\View */
/* @var $searchModel common\modules\nomination\models\search\NominationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Номинации';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomination-index padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'value' => function($model, $action) {
                    return (!empty($model->category) ? $model->category->name : "---");
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\modules\nomination\models\NominationCategory::find()->all(), 'id', 'name')
            ],
            'name',
            'link',
            'position',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
