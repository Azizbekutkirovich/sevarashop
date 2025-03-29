<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Products;
use app\models\LoginForm;
use app\models\Signup;

class MainController extends Controller
{
	public function actionIndex() {
		return $this->render("index");
	}

	public function actionProducts() {
		if (!empty(Yii::$app->request->get("category_id"))) {
			$products = Products::find()
				->asArray()
				->where(['category_id' => Yii::$app->request->get("category_id")])
				->all();
		} else {
			$products = Products::find()
			->asArray()
			->all();
		}
		return $this->render("products", compact("products"));
	}

	public function actionAbout() {
		return $this->render("about");
	}

	public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->render("success");
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    public function actionSignup() {
    	if (!Yii::$app->user->isGuest) {
    		return $this->goHome();
    	}
    	$model = new Signup();

    	if ($model->load(Yii::$app->request->post())) {
    		if (strlen($model->phone) != 9) {
    			Yii::$app->session->setFlash("error", "Telefon raqamni kiritishda xatoga yo'l qo'ydingiz! Telefon raqam quyidagicha kiritiladi: 93....");
    			return $this->render("signup", compact("model"));
    		}
    		if (strlen($model->password) != 4) {
    			Yii::$app->session->setFlash("error", "Parol 4ta belgidan iborat bo'lishi lozim!");
    			return $this->render("signup", compact("model"));
    		}
    		if ($model->create() == true) {
    			$login = new LoginForm();
    			$login->phone = $model->phone;
    			$login->password = $model->password;
		        if ($login->login()) {
		            return $this->render("success");
		        }
    		}
    	}

    	return $this->render("signup", compact("model"));
    }

    public function actionProductdetail() {
    	if (!empty(Yii::$app->request->get("product_id"))) {
    		$product = Products::findOne(['id' => Yii::$app->request->get("product_id")]);
    		if (!empty($product)) {
    			return $this->render("product-detail", compact("product"));
    		} else {
    			return $this->redirect(['main/index']);
    		}
    	} else {
    		return $this->redirect(['main/index']);
    	}
    }
}