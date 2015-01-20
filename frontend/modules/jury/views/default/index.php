<section class="jury">
    <div class="container">
        <?php
        foreach ($juries as $_jury) {
            ?>
            <div class="member">
                <a name="<?=\common\helpers\CString::translitTo($_jury->flp)?>"></a>
                <div class="row">
                    <div class="col-md-3">
                        <?=\yii\helpers\Html::img("/".$_jury->img, ['alt' => $_jury->flp])?>
                    </div>
                    <div class="col-md-9">
                        <h2><?=$_jury->flp?></h2>
                        <?=$_jury->bio?>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</section>