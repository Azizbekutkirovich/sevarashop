<?php
	use yii\helpers\Url;
	use app\models\Products;
    use app\models\Category;
	$products = Products::find()
		->asArray()
		->all();
    $category = Category::find()
        ->asArray()
        ->all();
?>
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
<!-- Breadcrumb Section Begin -->
    <section class="breadcrumb-section set-bg" data-setbg="<?=Url::base()?>/images/1rasm.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2><?=$product->name?></h2>
                        <div class="breadcrumb__option">
                            <span>Mahsulot</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Breadcrumb Section End -->

    <!-- Product Details Section Begin -->
    <section class="product-details spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__pic">
                        <div class="product__details__pic__item">
                            <img class="product__details__pic__item--large"
                                src="<?=Url::base()?>/images/<?=$product->img?>" alt="">
                        </div>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="product__details__text">
                        <h3><?=$product->name?></h3>
                        <div class="product__details__rating">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <div class="product__details__price"><?=$product->sum?> so'm</div>
                        <p><?=$product->context?></p>
                        <div class="product__details__quantity">
                            <div class="quantity">
                                <div class="pro-qty">
                                    <input type="text" value="1" id="count">
                                </div>
                            </div>
                        </div>
                        <?php if (!Yii::$app->user->isGuest): ?>
                        <a class="primary-btn" id="cart" type="submit" style="color: white;">Xarid savatchaga qo'shish</a>
                        <a href="<?=Url::to(['like/add-like', 'product_id' => $product->id])?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <?php else: ?>
                        <a class="primary-btn" href="<?=Url::to(['main/login'])?>" type="submit" style="color: white;">Tizimga kirib oling!</a>
                        <a href="<?=Url::to(['like/add-like', 'product_id' => $product->id])?>" class="heart-icon"><span class="icon_heart_alt"></span></a>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Product Details Section End -->

    <!-- Related Product Section Begin -->
    <section class="related-product">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title related__product__title">
                        <h2>Boshqa mahsulotlar</h2>
                    </div>
                </div>
            </div>
            <div class="row">
            	<?php for ($i = 0; $i < 4; $i++): ?>
                <div class="col-lg-3 col-md-4 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="<?=Url::base()?>/images/<?=$products[$i]['img']?>">
                            <ul class="product__item__pic__hover">
                                <li><a href="#"><i class="fa fa-heart"></i></a></li>
                                                 <li><a href="<?=Url::to(['main/productdetail', 'product_id' => $products[$i]['id']])?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></a></li>
                            <?php if (!Yii::$app->user->isGuest): ?>
                                <li><a href="<?=Url::to(['cart/add-cart', 'product_id' => $products[$i]['id']])?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php else: ?>
                                <li><a href="<?=Url::to(['main/login'])?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#"><?=$products[$i]['name']?></a></h6>
                            <h5><?=$products[$i]['sum']?> so'm</h5>
                        </div>
                    </div>
                </div>
            	<?php endfor; ?>
            </div>
        </div>
    </section>
    <!-- Related Product Section End -->
    <script type="text/javascript">
        let id = <?=$product->id?>;
    </script>