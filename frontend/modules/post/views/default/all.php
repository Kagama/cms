<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24.06.14
 * Time: 20:16
 */


$this->title = $menu->seo_title." - ".Yii::$app->params['seo_title'];
Yii::$app->view->registerMetaTag(['name' => 'keywords', 'content' => $menu->seo_keywords]);
Yii::$app->view->registerMetaTag(['name' => 'description', 'content' => $menu->seo_description]);
?>
<div class="content">
    <div class="wrapper">

        <!-- Конец правой колонки -->

        <div class="left_cont">
            <div class="article">
                <h1><?=$menu->name?></h1>
                <?php
                if ($menu->name == 'Обсуждение Вашего случая') {
                    echo "<span class='add-my-case'>Добавить свой случай</span>";
                }
                ?>
                <br/>
                <?=
                \yii\widgets\ListView::widget([
                    'dataProvider' => $dataProvider,
                    'layout' => '{items}{pager}',
                    'itemView' => '_news_item',
//                    'emptyText' => '- Нет данных -',
                    'viewParams' => ['menu' => $menu],
//                    'showOnEmpty' => '-',
                    'itemOptions' => [
                        'tag' => 'article'
                    ],
                    'pager' => [
                        'maxButtonCount' => 10,
//                        'firstPageLabel' => '', //&laquo;
                        'prevPageLabel' => '&larr;',
                        'nextPageLabel' => '&rarr;',
//                        'lastPageLabel' => '' //&raquo;
                    ]
                ])
                ?>
            </div>
        </div>

    </div>
</div>