<?php
namespace app\modules\users\classes;
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Response
 *
 * @author damasa
 */
class Response extends \yii\base\Component{
    //put your code here
    public $result = [];
    public function Success($msg,$status,$action="create"){
        $this->result = [
            'status' => $status,
            'action' => $action,
            'message' => '<div class="alert alert-success alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong><i class="glyphicon glyphicon-ok"></i>'.$msg.'</strong>
                          </div>'                       
        ];
         
        return $this;
    }
    public function Error($msg,$status,$action="create"){
        $this->result = [
            'status' => $status,
            'action' => $action,
            'message' => '<div class="alert alert-danger alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <strong><i class="glyphicon glyphicon-exclamation-sign"></i>'.$msg.'</strong>
                          </div>'
            
        ];
        return $this;
    }
    public function Output(){
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        return $this->result;
    }
    
    /**
     * @inheritdoc
     * @return Response the newly created [[Response]] instance.
     */
    public static function responseDisplay() {
        return \Yii::createObject(Response::className());   //, [get_called_class()]
    }
}
