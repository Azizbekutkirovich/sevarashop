<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Cart;
use app\models\Zakaz;

class ZakazController extends Controller
{
	public function actionOformit() {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/index']);
		}
		$cart = Cart::find()
			->asArray()
			->where(['user_id' => Yii::$app->user->identity->id])
			->all();
		foreach ($cart as $r) {
			$zakaz = Zakaz::findOne([
				'user_id' => Yii::$app->user->identity->id,
				'product_id' => $r['product_id']
			]);
			$delete = Cart::findOne([
				'user_id' => Yii::$app->user->identity->id,
				'product_id' => $r['product_id']
			]);
			if (!empty($zakaz)) {
				$zakaz->count += $r['count'];
				$zakaz->sum += $r['sum'];
				$delete->delete();
				$zakaz->save();
			} else {
				$zakaz = new Zakaz();
				$zakaz->user_id = Yii::$app->user->identity->id;
				$zakaz->product_id = $r['product_id'];
				$zakaz->count = $r['count'];
				$zakaz->sum = $r['sum'];
				$delete->delete();
				$zakaz->save();
			}
		}
		return $this->redirect(['zakaz/zakaz']);
	}

	public function actionZakaz() {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/index']);
		}
		$zakaz = Zakaz::find()
			->asArray()
			->where(['user_id' => Yii::$app->user->identity->id])
			->all();
		return $this->render("zakaz", compact("zakaz"));
	}
}