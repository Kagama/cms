<?php
use yii\helpers\Html;

?>

<section class="winners">
    <div class="container">
        <h1>Победители прошлых лет</h1>

        <div class="years">
            <?php
            $years = \common\modules\winners\models\WinnersYears::find()->orderBy('year desc')->all();
            foreach ($years as $index => $_y) {
                $option = [];
                if (empty($year)) {
                    $option = ($index == 0) ? ['class' => 'active'] : [];
                } else {
                    $option = ($_y->year == $year) ? ['class' => 'active'] : [];
                }

                echo Html::a($_y->year, ['/past-winners/' . $_y->year], $option);
            }
            ?>
        </div>

        <?php
        if (!empty($competitions)) {

            foreach ($types as $_t) {
                ?>
                <div class="cat">
                <?= Html::tag('h2', $_t->name, ['class' => 't-g']); ?>
                <div class="row conc">
                <?php
                foreach ($competitions as $_c) {
                    if ($_c->type_id == $_t->id) {
                        ?>
                        <div class="col-xs-12 col-sm-3 col-md-3">
                            <h3><?= $_c->name ?></h3>

                            <p>
                                <?= $_c->description ?>
                            </p>
                        </div>
                        <?php
                        foreach ($_c->winners as $_w) {
                            ?>
                            <div class="col-xs-4 col-sm-3 col-md-3">
                                <?php
                                if ($_w->place == 'gold') {
                                    ?>
                                    <div class="medal gold">Золото</div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($_w->place == 'silver') {
                                    ?>
                                    <div class="medal silver">Серебро</div>
                                <?php
                                }
                                ?>
                                <?php
                                if ($_w->place == 'bronze') {
                                    ?>
                                    <div class="medal bronze">Бронза</div>
                                <?php
                                }
                                ?>
                                <h3><?= $_w->name ?></h3>

                                <p><?= $_w->description ?></p>
                            </div>
                        <?php
                        }
                    }
                }
            }
            ?>
            </div>
            </div>


        <?php
        } else {
            ?>
            <p style="height: 400px;">Нет данных</p>
        <?php
        }
        ?>


    </div>
</section>
