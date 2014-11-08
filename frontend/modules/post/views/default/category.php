<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24.06.14
 * Time: 20:16
 */
?>
<div class="orange-white-delimiter">
    <div class="margin03percent">
        <img src="/img/news-icon.png" class="icon-bg" alt="Информационные сообщения" /> <span><a href="<?= \yii\helpers\Url::toRoute('/'.$menu->url); ?>">Все новости</a> - <?= $category->name ?></span>
    </div>
</div>
<div class="row white-bg" style="background-color: #f4f4f4;">

    <div class="margin03percent">
        <div class="col-lg-17">
            <?=
            \yii\widgets\ListView::widget([
                'dataProvider' => $dataProvider,
                'layout' => '{items}{pager}',
                'itemView' => '_news_item',
                'emptyText' => '- Нет новостей -',
                'viewParams' => ['menu' => $menu],
                'showOnEmpty' => '-',
                'itemOptions' => [
                    'tag' => 'article'
                ],
                'pager' => [
                    'prevPageLabel' => '&nbsp;',
                    'nextPageLabel' => '&nbsp;'
                ]
            ])
            ?>
        </div>
        <div class="col-lg-6 col-lg-offset-1">
            <?= \common\widget\frontend\CategoryWidget::widget([
                'model' => new \common\modules\news\models\Category,
                'module_name' => $menu->url,
                'selected' => $category->id
            ]) ?>

            <div class="feed-back-small-block">
                <div class="head">
                    <img src="/img/question-answer-icon.png" alt="number one"/>
                    <span>ВОПРОС-ОТВЕТ</span>
                </div>
                <div class="list-block">
                    <p>Сомневаетесь? Есть вопросы? Пишите нам, не стесняйтесь. Мы ответим на все ваши вопросы!</p>
                    <a href="#" class="red-button">ЗАДАТЬ ВОПРОС</a>
                </div>
            </div>
        </div>
    </div>
</div>