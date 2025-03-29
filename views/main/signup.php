<?php
	use yii\helpers\Url;
	use yii\helpers\Html;
	use yii\bootstrap4\ActiveForm;
?>
    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=Url::base()?>/images/1rasm.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Ro'yhatdan o'tish</h2>
                        <div class="breadcrumb__option">
                            <span>Tizimda ro'yhatdan o'tish</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Contact Form Begin -->
    <div class="contact-form spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="contact__form__title">
                        <h2>Tizimda ro'yhatdan o'tish</h2>
                        <?php if (Yii::$app->session->hasFlash("error")): ?>
                        <h3 style="color: red;"><?=Yii::$app->session->getFlash("error")?></h3>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php $f = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <?= $f->field($model, 'name')->textInput(['placeholder' => 'FIO'])->label(false); ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                    	<?= $f->field($model, 'phone')->textInput(['placeholder' => 'Telefon raqamni kiriting'])->label(false); ?>
                        <p style="color: blue;">Telefon raqamni quyidagicha kiriting: 93...</p> 
                    </div>
                    <div class="col-lg-6 col-md-6">
                    	<?= $f->field($model, 'password')->textInput(['placeholder' => 'Parolni kiriting'])->label(false); ?>
                        <p style="color: blue;">Parol 4ta belgidan iborat bo'lishi kerak!</p> 
                    </div>
                    <div class="col-lg-12 text-center">
                        <!-- <button type="submit" class="site-btn">SEND MESSAGE</button> -->
                    	<?php
                    		echo Html::submitButton("Ro'yhatdan o'tish", ['class' => 'site-btn']);
                    	?>
                        <p>Ro'yhatdan o'tgan bo'lsangiz <a href="<?=Url::to(['main/login'])?>">tizimga kiring</a></p>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!-- Contact Form End -->