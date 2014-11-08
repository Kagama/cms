<?php

use yii\helpers\Html;
use yii\grid\GridView;

$this->registerAssetBundle('backend\modules\post\assets\PostModuleAsset', \yii\web\View::POS_HEAD);

/**
 * @var yii\web\View $this
 * @var yii\data\ActiveDataProvider $dataProvider
 * @var common\modules\user\models\search\UserSearch $searchModel
 */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index padding020 widget">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'phone',
            'username',
            [
                'attribute' => 'role_id',
                'value' => function ($model, $index) {
                    return ($model->role == null ? '- - -' : $model->role->name);
                },
                'filter' => \yii\helpers\ArrayHelper::map(\common\modules\user\models\UserRole::find()->all(), 'id', 'name'),
                'format' => 'html'
            ],
            // 'password_reset_token',
            // 'email:email',
            // 'phone',
            // 'role',
            // 'status',
            // 'created_at',
            // 'updated_at',
            // 'approve_newsletter',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
