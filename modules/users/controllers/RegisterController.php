<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\users\controllers;
use Yii;
use yii\web\Controller;
/**
 * Description of RegisterController
 *
 * @author damasa
 */
class RegisterController extends Controller{
    //put your code here
    public function actionIndex(){
        return $this->render("index");
    }
    public function actionCreate(){
        $model = new \app\modules\users\models\Users();
        if(\Yii::$app->request->isAjax && $model->load(\Yii::$app->request->post())) {
            $model->id= time()*1000;
            if($model->save()){
                return \app\modules\users\classes\Response::responseDisplay()->Success("Success","success", "Register")->Output();
            }else{
                return \app\modules\users\classes\Response::responseDisplay()->Error("Error","success", "Register")->Output();
            }
            
        }
        return $this->renderAjax("form",["model"=>$model]);
    }
}
