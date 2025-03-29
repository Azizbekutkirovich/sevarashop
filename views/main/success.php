<?php
	use yii\helpers\Url;
?>
<div class="container">
	<h3 style="color: black;">Tizimga xush kelibsiz <?=Yii::$app->user->identity->name?>! Endi mahsulotlarni bemalol sotib ola olasiz!</h3>
	<a class="btn btn-info btn-lg" href="<?=Url::home()?>">Ishni boshlash</a>
	<br><br>
</div>