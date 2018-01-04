<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\users\controllers;

use Yii;
use yii\web\Controller;
use yii\data\ActiveDataProvider;

/**
 * Description of UserController
 *
 * @author damasa
 */
class UserController extends Controller {

    //put your code here
    public function actionIndex() {
        return $this->render("index", []);
    }

    public function actionGetUser() {
        if (\Yii::$app->request->isAjax) {
            $model = \app\modules\users\models\Users::find();
            $dataProvider = new ActiveDataProvider([
                'query' => $model,
                'sort' => ['defaultOrder' => ['id' => SORT_DESC]],
                'pagination' => [
                    'pageSize' => 20
                ],
            ]);
            return $this->renderAjax("get-user", ["dataProvider" => $dataProvider]);
        }else{
            $this->redirect(["index"]);
        }
    }
    
    public function actionUpdateUser() {
        $id = isset($_GET["id"]) ? $_GET["id"] : "";
        $model = \app\modules\users\models\Users::findOne($id);
        $modelProfile = \app\modules\users\models\Profiles::findOne($id);
        if (\Yii::$app->request->isAjax) {
            if ($model->load(\Yii::$app->request->post())) {
                $modelProfile->fname = $_POST["Profiles"]["fname"];
                $modelProfile->lname = $_POST["Profiles"]["lname"];
                $modelProfile->address = $_POST["Profiles"]["address"];
                $modelProfile->tel = $_POST["Profiles"]["tel"];
                if ($model->save() && $modelProfile->save()) {
                    return \app\modules\users\classes\Response::responseDisplay()->Success("Success", "success", "Register")->Output();
                } else {
                    return \app\modules\users\classes\Response::responseDisplay()->Error("Error", "success", "Register")->Output();
                }
            }
            return $this->renderAjax("update-user", ["model" => $model,"modelProfile"=>$modelProfile]);
        }
    }

}
