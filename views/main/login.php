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
                        <h2>Login</h2>
                        <div class="breadcrumb__option">
                            <span>Tizimga kirish</span>
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
                        <h2>Tizimga kirish</h2>
                    </div>
                </div>
            </div>
            <?php $f = ActiveForm::begin(); ?>
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <!-- <input type="text" placeholder="Your name"> -->
                    	<?= $f->field($model, 'phone')->textInput(['placeholder' => 'Telefon raqamni kiriting'])->label(false); ?>
                    </div>
                    <div class="col-lg-6 col-md-6">
                    	<?= $f->field($model, 'password')->textInput(['placeholder' => 'Parolni kiriting'])->label(false); ?>
                    </div>
                    <div class="col-lg-12 text-center">
                        <!-- <button type="submit" class="site-btn">SEND MESSAGE</button> -->
                    	<?php
                    		echo Html::submitButton('Kirish', ['class' => 'site-btn']);
                    	?>
                    	<p>Ro'yhatdan o'tmagan bo'lsangiz ro'yhatdan o'ting <a href="<?=Url::to(['main/signup'])?>" class="btn btn-info">Ro'yhatdan o'tish</a></p>
                    </div>
                </div>
            <?php ActiveForm::end(); ?>
        </div>
    </div>
    <!-- Contact Form End -->