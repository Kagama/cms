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


<!-- Блок новостей -->
<section class="news">
    <div class="container">
        <?=
        \yii\widgets\ListView::widget([
            'dataProvider' => $dataProvider,
            'layout' => '{items}',
            'itemView' => '_news_item',
//                    'emptyText' => '- Нет данных -',
            'viewParams' => ['menu' => $menu],
//                    'showOnEmpty' => '-',
            'itemOptions' => [
                'tag' => false
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
</section>