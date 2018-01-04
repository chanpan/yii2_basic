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
 * Description of RolesController
 *
 * @author damasa
 */
class RoleController extends Controller{
    //put your code here
    public function actionIndex(){
        return $this->render("index",[]);
    }
    
    public function actionGetRole(){
        $model = \app\modules\users\models\Roles::find();
        $dataProvider = new ActiveDataProvider([
            'query'=>$model
        ]);
        return $this->renderAjax("get-role",["dataProvider"=>$dataProvider]);
    }
    public function actionCreate(){
        if(\Yii::$app->request->isAjax){
             
            $model = new \app\modules\users\models\Roles();
            if ($model->load(\Yii::$app->request->post())) {
                if($model->save()){
                    return \app\modules\users\classes\Response::responseDisplay()->Success("Success", "success", "Create Roles")->Output(); 
                }else{
                    return \app\modules\users\classes\Response::responseDisplay()->Error("Error", "success", "Create Roles")->Output();
                }     
            }
            return $this->renderAjax("create",["model"=>$model]);
        }
    }
    public function actionDelete(){
        $id = isset($_POST["id"]) ? $_POST["id"] : "";
        if(\Yii::$app->request->isAjax && !empty(\Yii::$app->request->post())){
            $model = \app\modules\users\models\Roles::findOne($id);
            if ($model->delete()) {
                return \app\modules\users\classes\Response::responseDisplay()->Success("Success", "success", "Delete Role")->Output();
            } else {
                return \app\modules\users\classes\Response::responseDisplay()->Error("Error", "success", "Delete Role")->Output();
            }
        }
    }
}
