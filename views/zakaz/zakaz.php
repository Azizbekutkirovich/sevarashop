<?php
	use yii\helpers\Url;
	use app\models\Products;
	$count = 0;
	$sum = 0;
?>
<!-- Breadcrumb Section Begin -->
    <!-- <section class="breadcrumb-section set-bg" data-setbg="<?=Url::base()?>/images/1rasm.jpg">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="breadcrumb__text">
                        <h2>Buyurtmalar</h2>
                        <div class="breadcrumb__option">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- Breadcrumb Section End -->

    <!-- Shoping Cart Section Begin -->
    <section class="shoping-cart spad">
    	<?php if (!empty($zakaz)): ?>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="shoping__cart__table">
                        <h3 style="text-align: center;">Buyurtmalar qabul qilindi! Tez orada operatorlarimiz siz bilan bog'lanadi!</h3>
                        <table>
                            <thead>
                                <tr>
                                    <th class="shoping__product">Mahsulotlar</th>
                                    <th>Narx</th>
                                    <th>Soni</th>
                                    <th>Summa</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php foreach ($zakaz as $r): ?>
                            	<?php
                            		$products = Products::findOne(['id' => $r['product_id']]);
                            		$count += $r['count'];
                            		$sum += $r['sum'];
                            	?>
                                <tr>
                                    <td class="shoping__cart__item">
                                        <img style="width: 100px; height: 100px;" src="<?=Url::base()?>/images/<?=$products->img?>" alt="">
                                        <h5><?=$products->name?></h5>
                                    </td>
                                    <td class="shoping__cart__price">
                                        <?=$products->sum?> so'm
                                    </td>
                                    <td class="shoping__cart__quantity">
                                    	<?=$r['count']?>
                                    </td>
                                    <td class="shoping__cart__total">
                                        <?= $r['sum'] ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="shoping__checkout">
                        <h5>Umumiy hisob</h5>
                        <ul>
                            <li>Mahsulotlar soni: <span><?=$count?></span></li>
                            <li>Umumiy summa: <span><?=$sum?> so'm</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    	<?php else: ?>
    	<div class="container">
    		<div class="alert alert-danger">Buyurtmalar mavjud emas!</div>
    	</div>
    	<?php endif; ?>
    </section>
    <!-- Shoping Cart Section End -->