<?php
	use yii\helpers\Url;
	use app\models\Products;
?>
<!-- Featured Section Begin -->
    <section class="featured spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Istaklar</h2>
                    </div>
                    <div class="featured__controls">
                        <ul>
                            <li class="active" data-filter="*">Barchasi</li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="row featured__filter">
            	<?php foreach ($like as $r): ?>
            		<?php
            			$product = Products::findOne(['id' => $r['product_id']]);
            		?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix oranges fresh-meat">
                    <div class="featured__item">
                        <div class="featured__item__pic set-bg" data-setbg="<?=Url::base()?>/images/<?=$product->img?>">
                            <ul class="featured__item__pic__hover">
                                <li><a href="<?=Url::to(['main/productdetail', 'product_id' => $product->id])?>"><svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-info" viewBox="0 0 16 16">
  <path d="m8.93 6.588-2.29.287-.082.38.45.083c.294.07.352.176.288.469l-.738 3.468c-.194.897.105 1.319.808 1.319.545 0 1.178-.252 1.465-.598l.088-.416c-.2.176-.492.246-.686.246-.275 0-.375-.193-.304-.533L8.93 6.588zM9 4.5a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
</svg></a></li>
                                <?php if (!Yii::$app->user->isGuest): ?>
                                <li><a href="<?=Url::to(['cart/add-cart', 'product_id' => $product->id])?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php else: ?>
                                <li><a href="<?=Url::to(['main/login'])?>"><i class="fa fa-shopping-cart"></i></a></li>
                                <?php endif; ?>
                            </ul>
                        </div>
                        <div class="featured__item__text">
                            <h6><a href="#"><?=$product->name?></a></h6>
                            <h5><?=$product->sum?> so'm</h5>
                        </div>
                    </div>
                </div>
            	<?php endforeach; ?>
            </div>
        </div>
    </section>
    <!-- Featured Section End -->