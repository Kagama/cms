<?php
/**
 * Created by PhpStorm.
 * User: developer
 * Date: 24.06.14
 * Time: 20:40
 */


?>
<?php
\common\widget\html\ActiveEdit::begin(['model' => $model, 'url' => "/post/simple-edit/edit"]);
?>

<!-- Блок краткого описания новости -->
<div class="news_preview">
    <div class="row">

        <div class="col-md-9">
            <!-- Заголовок -->
            <h1><?=$model->title?></h1>

            <!-- Дата, автор, источник -->
            <div class="meta">
                <span class="date"><?=Yii::$app->formatter->asDate($model->date, "d MMMM Y")?></span>
                <span class="author"><?=$model->author?></span>
                <?=\yii\helpers\Html::a($model->source, 'http://'.$model->source, ['class' => 'source'])?>
<!--                <a href="" class="source">advertology.ru</a>-->
            </div>
        </div>

        <!-- Описание новости -->
        <div class="col-md-9 n_info">

            <!-- Краткий текст новости -->
            <p>
                <?=strip_tags($model->small_text)?>
            </p>

            <!-- Тут все ясно -->
            <?= \yii\helpers\Html::a("Читать полностью", ['/' . $menu->url . '/' . $model->id . "_" . $model->alt_title], ['class' => 'read_full']); ?>

            <!-- Кнопки шаринга в соцсетях -->
            <div class="share"></div>
        </div>

        <!-- Блок картинки-превью -->
        <div class="col-md-3 n_img">
            <?php
            $matches = [];
            preg_match_all('/<img[^>]*src="([^"]*)"/i', $model->text, $matches);
            if (!empty($matches)) {
                for($i=0; $i < 2; $i++) {
                    if (isset($matches[1][$i]))
                        echo \yii\helpers\Html::img($matches[1][$i], ['style' => 'width:240px;']);
                }
            }

            ?>
        </div>
    </div>
</div>

<?php
\common\widget\html\ActiveEdit::end();
?>
