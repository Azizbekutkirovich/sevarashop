<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Products;

class SearchController extends Controller
{
    public function actionSearch(){
        $get = Yii::$app->request->get("search");
        if (!empty($get)) {
            $products = Products::find()
                ->asArray()
                ->where(['like', 'name', $get])
                ->orWhere(['like', 'sum', $get])
                ->all();
            return $this->render("search", [
                'products' => $products,
                'get' => $get
            ]);
        } else {
            return $this->redirect(['main/index']);
        }
    }
}