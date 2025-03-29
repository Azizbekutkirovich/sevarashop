<?php
	use yii\helpers\Url;
	use app\models\Category;
	use app\models\Products;
	$category = Category::find()
		->asArray()
		->all();
	$products = Products::find()
		->asArray()
		->all();
?>
    <!-- Hero Section Begin -->
    <section class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="hero__categories">
                        <div class="hero__categories__all">
                            <i class="fa fa-bars"></i>
                            <span>Kategoriyalar</span>
                        </div>
                        <ul>
                        	<?php foreach ($category as $r): ?>
                                <li><a href="<?=Url::to(['main/products', 'category_id' => $r['id']])?>"><?=$r['category_name']?></a></li>
                        	<?php endforeach; ?>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-9">
                    <div class="hero__search">
                        <div class="hero__search__form">
                            <form action="<?=Url::to(['search/search'])?>" method="get">
                                <input type="text" name="search" placeholder="Nimani istaysiz?">
                                <button type="submit" class="site-btn">QIDIRISH</button>
                            </form>
                        </div>
                        <div class="hero__search__phone">
                            <div class="hero__search__phone__icon">
                                <i class="fa fa-phone"></i>
                            </div>
                            <div class="hero__search__phone__text">
                                <h5>+998-93-603-42-08</h5>
                                <span>24/7 soat</span>
                            </div>
                        </div>
                    </div>
                    <div class="hero__item set-bg" data-setbg="<?=Url::base()?>/images/1rasm.jpg">
                        <div class="hero__text">
                            <span style="color: white;">Sevarashop</span>
                            <h2 style="color: red;">Modalar dunyosi</h2>
                            <p style="color: white;">Biz bilan o'z orzularingizni yarating</p>
                            <a href="<?=Url::to(['main/about'])?>" class="primary-btn">Batafsil</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
 	<!-- Categories Section Begin -->
    <section class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <?php foreach ($category as $r): ?>
                    <div class="col-lg-3">
                        <div class="categories__item set-bg" data-setbg="<?=Url::base()?>/images/<?=$r['img']?>">
                            <h5><a href="<?=Url::to(['main/products', 'category_id' => $r['id']])?>"><?=$r['category_name']?></a></h5>
                        </div>
                    </div>
                <?php endforeach; ?>
                </div>
            </div>
        </div>
    </section>
    <!-- Categories Section End -->

    <!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Mahsulotlar</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Barchasi</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            	<?php foreach ($products as $r): ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?=Url::base()?>/images/<?=$r['img']?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="<?=Url::to(['like/add-like', 'product_id' => $r['id']])?>"><i class="fa fa-heart"></i></a></li>
                                <li><a href="<?=Url::to(['main/productdetail', 'product_id' => $r['id']])?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></a></li>
                                <?php if (!Yii::$app->user->isGuest): ?>
                                <li><a href="<?=Url::to(['cart/add-cart', 'product_id' => $r['id']])?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php else: ?>
                                <li><a href="<?=Url::to(['main/login'])?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?=$r['name']?></a></h6>
                            <h5><?=$r['sum']?> so'm</h5>
                            <!-- <a class="btn btn-primary">Xarid savatchaga qo'shish</a> -->
                        </div>
                    </div>
                </div>
            	<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->