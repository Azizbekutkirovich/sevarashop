<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use app\models\Cart;

class CartController extends Controller
{
	public function actionAddCart() {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/index']);
		}
		if (!empty(Yii::$app->request->get("product_id"))) {
			$product_id = Yii::$app->request->get("product_id");
			if (!empty(Yii::$app->request->get("count"))) {
				$count = Yii::$app->request->get("count");
			} else {
				$count = 1;
			}
			$product = Products::findOne(['id' => $product_id]);
			if (!empty($product)) {
				$history = Cart::findOne([
					'user_id' => Yii::$app->user->identity->id,
					'product_id' => $product_id
				]);
				if (!empty($history)) {
					$history->count += $count;
					$history->sum += $product->sum;
					if ($history->save()) {
						return $this->redirect(['cart/cart']);	
					}
				} else {
					$model = new Cart();
					$model->user_id = Yii::$app->user->identity->id;
					$model->product_id = $product_id;
					$model->count = $count;
					$model->sum = $product->sum;
					if ($model->save()) {
						return $this->redirect(['cart/cart']);
					}
				}
			}
		} else {
			return $this->redirect(['main/index']);
		}
	}

	public function actionCart() {
		if (Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		$cart = Cart::find()
			->asArray()
			->where(['user_id' => Yii::$app->user->identity->id])
			->all();
		return $this->render("cart", compact("cart"));
	}

	public function actionDelete() {
		if (Yii::$app->user->isGuest) {
			return $this->goHome();
		}
		if (!empty(Yii::$app->request->get("id"))) {
			$product_id = Yii::$app->request->get("id");
			$cart = Cart::findOne([
				'user_id' => Yii::$app->user->identity->id,
				'product_id' => $product_id
			]);
			if (!empty($cart)) {
				if ($cart->delete()) {
					return $this->redirect(['cart/cart']);
				}
			} else {
				return $this->redirect(['cart/cart']);
			}
		} else {
			return $this->redirect(['cart/cart']);
		}
	}
}