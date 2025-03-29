<?php
	use yii\helpers\Url;
	use app\assets\AppAsset;
	use app\models\Category;
    use app\models\Cart;
    use app\models\UserLike;
    use app\models\Zakaz;

	AppAsset::register($this);
?>
<?php $this->beginPage(); ?>
<!DOCTYPE html>
<html lang="<?=Yii::$app->language?>">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ogani Template">
    <meta name="keywords" content="Ogani, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sevarashop</title>

    <!-- Google Font -->
    <link rel="icon" href="<?=Url::base()?>/logo/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@200;300;400;600;900&display=swap" rel="stylesheet">
    <?php $this->head(); ?>
</head>
<body>
	<?php $this->beginBody(); ?>
    <div id="preloder">
        <div class="loader"></div>
    </div>
    <!-- Humberger Begin -->
    <div class="humberger__menu__overlay"></div>
    <div class="humberger__menu__wrapper">
        <div class="humberger__menu__logo">
            <a id="logo"><img src="<?=Url::base()?>/logo/logo.png" alt=""></a>
        </div>
        <div class="humberger__menu__cart">
        </div>
        <div class="humberger__menu__widget">
            <div class="header__top__right__auth">
                <?php if (Yii::$app->user->isGuest): ?>
                <a href="<?=Url::to(['main/login'])?>"><i class="fa fa-user"></i> Kirish</a>
                <?php else: ?>
                <a href="<?=Url::to(['main/logout'])?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Chiqish</a>
                <?php endif; ?>
            </div>
        </div>
        <nav class="humberger__menu__nav mobile-menu">
            <ul>
                <li id="home"><a href="<?=Url::to(['main/index'])?>">Bosh sahifa</a></li>
                <li id="products"><a href="<?=Url::to(['main/products'])?>">Mahsulotlar</a></li>
                <?php if (!Yii::$app->user->isGuest): ?>
                <li><a href="<?=Url::to(['cart/cart'])?>">Xarid savatcha</a></li>
                <li><a href="<?=Url::to(['zakaz/zakaz'])?>">Buyurtmalar</a></li>
            	<li><a href="<?=Url::to(['main/about'])?>">Biz haqimizda</a></li>
            	<?php else: ?>
            		<li><a href="<?=Url::to(['main/about'])?>">Biz haqimizda</a></li>
            	<?php endif; ?>
            </ul>
        </nav>
        <div id="mobile-menu-wrap"></div>
        <div class="header__top__right__social">
        	<a href="#"><i class="fa fa-telegram"></i></a>
            <a href="https://www.facebook.com/profile.php?id=100088713336950"><i class="fa fa-facebook"></i></a>
            <a href="https://www.linkedin.com/in/azizbek-safarov-743287222/"><i class="fa fa-linkedin"></i></a>
        </div>
        <div class="humberger__menu__contact">
            <ul>
                <li><i class="fa fa-envelope"></i> azizbekutkirovich@gmail.com</li>
                <li>Biz bog'lanish uchun yuqorida email adress</li>
            </ul>
        </div>
    </div>
    <!-- Humberger End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__left">
                            <ul>
                                <li><i class="fa fa-envelope"></i> azizbekutkirovich@gmail.com</li>
                                <li>Biz bog'lanish uchun yuqorida email adress</li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="header__top__right">
                            <div class="header__top__right__social">
                                <a href="#"><i class="fa fa-telegram"></i></a>
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-linkedin"></i></a>
                            </div>
                            <div class="header__top__right__auth">
                                <?php if (Yii::$app->user->isGuest): ?>
                                <a href="<?=Url::to(['main/login'])?>"><i class="fa fa-user"></i> Kirish</a>
                                <?php else: ?>
                                <a href="<?=Url::to(['main/logout'])?>"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
</svg> Chiqish</a>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="header__logo">
                        <a href="<?=Url::home();?>" type="submit"><img style="width: 119px; height: 50px;" src="<?=Url::base()?>/logo/logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-6">
                    <nav class="header__menu">
                        <ul>
                            <li id="home_li">
                                <a href="<?=Url::to(['main/index'])?>" type="submit">
                                <div style="text-align: center;">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
  <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.707 1.5ZM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5 5 5Z"/>
</svg>
                                </div>
                                Bosh sahifa</a></li>
                            <li id="products_li"><a href="<?=Url::to(['main/products'])?>" type="submit">
                            <div style="text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-shop" viewBox="0 0 16 16">
  <path d="M2.97 1.35A1 1 0 0 1 3.73 1h8.54a1 1 0 0 1 .76.35l2.609 3.044A1.5 1.5 0 0 1 16 5.37v.255a2.375 2.375 0 0 1-4.25 1.458A2.371 2.371 0 0 1 9.875 8 2.37 2.37 0 0 1 8 7.083 2.37 2.37 0 0 1 6.125 8a2.37 2.37 0 0 1-1.875-.917A2.375 2.375 0 0 1 0 5.625V5.37a1.5 1.5 0 0 1 .361-.976l2.61-3.045zm1.78 4.275a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0 1.375 1.375 0 1 0 2.75 0V5.37a.5.5 0 0 0-.12-.325L12.27 2H3.73L1.12 5.045A.5.5 0 0 0 1 5.37v.255a1.375 1.375 0 0 0 2.75 0 .5.5 0 0 1 1 0zM1.5 8.5A.5.5 0 0 1 2 9v6h1v-5a1 1 0 0 1 1-1h3a1 1 0 0 1 1 1v5h6V9a.5.5 0 0 1 1 0v6h.5a.5.5 0 0 1 0 1H.5a.5.5 0 0 1 0-1H1V9a.5.5 0 0 1 .5-.5zM4 15h3v-5H4v5zm5-5a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-2a1 1 0 0 1-1-1v-3zm3 0h-2v3h2v-3z"/>
</svg>
                            </div>
                            Mahsulotlar</a></li>
                        	<li id="about_li"><a href="<?=Url::to(['main/about'])?>">
                            <div style="text-align: center;">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-bookmark" viewBox="0 0 16 16">
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v13.5a.5.5 0 0 1-.777.416L8 13.101l-5.223 2.815A.5.5 0 0 1 2 15.5V2zm2-1a1 1 0 0 0-1 1v12.566l4.723-2.482a.5.5 0 0 1 .554 0L13 14.566V2a1 1 0 0 0-1-1H4z"/>
</svg>
                            </div>
                            Biz haqimizda</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__cart">
                        <?php if (!Yii::$app->user->isGuest): ?>
                        <?php
                            $cart = Cart::find()
                                ->asArray()
                                ->where(['user_id' => Yii::$app->user->identity->id])
                                ->all();
                            $zakaz = Zakaz::find()
                                ->asArray()
                                ->where(['user_id' => Yii::$app->user->identity->id])
                                ->all();
                            $zakaz_count = 0;
                            $count = 0;
                            foreach ($cart as $r) {
                                $count += $r['count'];
                            }
                            foreach ($zakaz as $r) {
                                $zakaz_count += $r['count'];
                            }
                            $like_count = 0;
                            $like = UserLike::find()
                                ->asArray()
                                ->where(['user_id' => Yii::$app->user->identity->id])
                                ->all();
                            foreach ($like as $r) {
                                $like_count += 1;
                            }
                        ?>
                        <ul>
                            <!-- <li><a href="<?=Url::to(['like/like'])?>">
                                <div style="text-align: center;">
                                    <i class="fa fa-heart"></i>
                                    <span style="background-color: red; position: relative; right: 0.4vw; top: -5px;"><?=$like_count?></span>
                                </div>
                                <p>Istaklar</p>
                            </a></li> -->
                            <li><a href="<?=Url::to(['cart/cart'])?>" style="text-align: center;">
                                <div>
                                    <svg style="color: black;" xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart3" viewBox="0 0 16 16">
                                      <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                                    </svg>
                                    <span style="background-color: red; position: relative; right: 0.4vw; top: -5px;"><?=$count?></span>
                                </div>
                                <p>Xarid savatcha</p>
                            </a></li>
                            <li><a href="<?=Url::to(['zakaz/zakaz'])?>" style="text-align: center;"><div><i class="fa fa-shopping-bag"></i>
                             <span style="background-color: red; position: relative; right: 0.4vw; top: -5px;"><?=$zakaz_count?></span>
                         </div> 
                         <p>Buyurtmalar</p>
                         </a></li>
                        </ul>
                        <?php else: ?>

                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="humberger__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <div id="content">
        <?= $content ?>
    </div>
    <!-- Footer Section Begin -->
    <footer class="footer spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="footer__about">
                        <div class="footer__about__logo">
                            <a href="./index.html"><img src="<?=Url::base()?>/logo/logo.png" alt=""></a>
                        </div>
                        <ul>
                            <li>Manzilimiz: Qashqadaryo viloyati Muborak tumani 4 kichik tumani</li>
                            <li>Telefon raqam: +998-93-603-42-08</li>
                            <li>Email: azizbekutkirovich@gmail.com</li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
                    <div class="footer__widget">
                        <h6>Linklar</h6>
                        <ul>
                            <li><a href="#">Biz haqimizda</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-12">
                    <div class="footer__widget">
                        <h6>Biz bilan bog'lanish uchun</h6>
                        <!-- <p>Get E-mail updates about our latest shop and special offers.</p>
                        <form action="#">
                            <input type="text" placeholder="Enter your mail">
                            <button type="submit" class="site-btn">Subscribe</button>
                        </form> -->
                        <div class="footer__widget__social">
                            <a href="#"><i class="fa fa-telegram"></i></a>
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-instagram"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="footer__copyright">
                        <div class="footer__copyright__text"><p><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
   &copy; Mening do'konim <script>document.write(new Date().getFullYear());</script> - modalar dunyosi | Bu platforma <a href="" target="_blank">Best_developer</a> tomonidan ishlab chiqilgan
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <?php $this->endBody(); ?>
</body>
</html>
<?php $this->endPage(); ?>