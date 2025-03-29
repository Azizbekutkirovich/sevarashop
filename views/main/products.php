<?php
	use yii\helpers\Url;
	use app\models\Category;
	use app\models\Products;
	$category = Category::find()
		->asArray()
		->all();
?>
<!-- Hero Section Begin -->
   	<section class="hero hero-normal">
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
                            <form action="<?=Url::to(['search/search'])?>">
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
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->

    <!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=Url::base()?>/images/1rasm.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Sevara shop</h2>
                        <div class="breadcrumb__option">
                            <a>Mahsulotlar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-5">
                    <div class="sidebar">
                        <div class="sidebar__item">
                            <h4>Mahsulotlar bo'limlari</h4>
                            <ul>
                            	<?php foreach ($category as $r): ?>
                                <li><a><?=$r['category_name']?></a></li>
                            	<?php endforeach; ?>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-7">
                    <div class="filter__item">
                        <div class="row">
                            <div class="col-lg-4 col-md-5">
                                <div class="filter__sort">
                                    <span>Filtr</span>
                                    <select>
                                        <option value="0">Sana</option>
                                        <option value="0">Narx</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-4">
                                <div class="filter__found">
                                    <h6><span><?=count($products)?></span> ta mahsulot mavjud!</h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <?php foreach ($products as $r): ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="<?=Url::base()?>/images/<?=$r['img']?>">
                                    <ul class="product__item__pic__hover">
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
                                <div class="product__item__text">
                                    <h6><a href="#"><?=$r['name']?></a></h6>
                                    <h5><?=$r['sum']?> so'm</h5>
                                </div>
                            </div>
                        </div>
                    	<?php endforeach; ?>
                    </div>
                    <!-- <div class="product__pagination">
                        <a href="#">1</a>
                        <a href="#">2</a>
                        <a href="#">3</a>
                        <a href="#"><i class="fa fa-long-arrow-right"></i></a>
                    </div> -->
                </div>
            </div>
        </div>
    </section>
    <!-- Product Section End -->