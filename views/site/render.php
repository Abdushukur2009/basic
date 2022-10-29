<div class="site-render">
    <?php

    use yii\bootstrap5\ActiveForm;
    use yii\bootstrap5\Html;
    use yii\helpers\Url;
    use yii\helpers\VarDumper;
    use yii\rest\OptionsAction;

$this->title='yii2';
    
    ?>

    <p>Please fill out the following fields to login:</p>
    <h1><?= (isset($_SESSION['lub'])) ? $_SESSION['lub'] : "so'ngi javob " ?></h1>
    <?php
    echo Yii::alias('imgdir');

    ?>
    <div class="row">
        <div class="col-6">
            <div class="carousel slide a-b" data-ride="carousel" id="cor">
                <div class="carousel-inner c1">
                    <div class="carousel-item active border shadow c2">
                        <div class="col-8 offset-2 b text-center">
                            Lorem ipsum dolor sit, amet consectetur adipisicing elit. Veritatis officiis assumenda suscipit rem voluptatum qui nulla veniam dolor, animi, labore saepe ratione iste dolore modi, obcaecati sit nemo sint adipisci!
                            </div>
                        <div class="qt"><img src="image/тАЬ.png" alt="" /></div>
                        <div class="qb"><img src="image/тАЭ.png" alt="" /></div>
                    </div>
                    <?php
                    for ($i = 0; $i < count($rrr); $i++) :
                        if ($ty != 'mp4') :
                    ?>
                            <div class="b carousel-item border shadow c2">

                                <div class="col-8 offset-2 text-center">
                                    <img src="<?= Url::base() . '/img/' . $rrr[$i] ?>" class="form-control" alt="">
                                </div>
                                <div class="qt"><img src="image/тАЬ.png" alt="" /></div>
                                <div class="qb"><img src="image/тАЭ.png" alt="" /></div>
                            </div>
                        <?php
                        else :
                        ?>
                            <div class="carousel-item b border shadow c2">

                                <div class="col-8 offset-2 text-center">
                                    <video src="<?= Url::base() . '/img/' . $rrr[$i] ?>" class="form-control" controls>
                                </div>
                                <div class="qt"><img src="image/тАЬ.png" alt="" /></div>
                                <div class="qb"><img src="image/тАЭ.png" alt="" /></div>

                            </div>
                    <?php
                        endif;
                    endfor;
                    ?>

                </div>

                <a class="carousel-control-prev" data-slide="prev" data-target="#cor">
                    <div class="lr l"></div>
                </a>
                <a class="carousel-control-next" data-slide="next" data-target="#cor">
                    <div class="lr r"></div>
                </a>
                <ul class="carousel-indicators jj">
                    <li class="active lin" data-slide-to="0" data-target="#cor"></li>
                    <?php
                    for ($i = 1; $i <= count($rrr); $i++) :
                    ?>
                        <li data-target="#cor" data-slide-to="<?= $i ?>"></li>

                    <?php
                    endfor;
                    ?>
                </ul>
            </div>
        </div>
    </div>
</div>

</div>
</div>