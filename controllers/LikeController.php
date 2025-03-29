<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use app\models\UserLike;

class LikeController extends Controller
{
	public function actionAddLike() {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/login']);
		}
		if (!empty(Yii::$app->request->get("product_id"))) {
			$product_id = Yii::$app->request->get("product_id");
			$product = Products::findOne(['id' => $product_id]);
			if (!empty($product)) {
				$tek = UserLike::findOne([
					'user_id' => Yii::$app->user->identity->id,
					'product_id' => $product_id
				]);
				if (empty($tek)) {
					$like = new UserLike();
					$like->user_id = Yii::$app->user->identity->id;
					$like->product_id = $product_id;
					if ($like->save()) {
						return $this->redirect(['like/like']);
					}
				} else {
					return $this->redirect(['like/like']);
				}
			} else {
				return $this->redirect(['main/index']);
			}
		} else {
			return $this->redirect(['main/index']);
		}
	}

	public function actionLike() {
		if (Yii::$app->user->isGuest) {
			return $this->redirect(['main/login']);
		}
		$like = UserLike::find()
			->asArray()
			->where(['user_id' => Yii::$app->user->identity->id])
			->all();
		return $this->render("like", compact("like"));
	}
}