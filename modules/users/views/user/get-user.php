<?php

use yii\helpers\Html;
use yii\helpers\Url;
use \yii\grid\GridView;
use yii\bootstrap\Modal;
$this->title = "Users";
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="pull-left" style="line-height: 30px;"><b><?= $this->title; ?></b></div>
        
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
            <?php
            echo GridView::widget([
                'dataProvider' => $dataProvider,
                'tableOptions' => [
                    'class' => 'table table-striped table-bordered table-responsive table-hover',
                    'id'=>'table-users'
                ],
                'columns' => [
                    'username',
                    [
                        'label' => 'ชื่อ-นามสกุล',
                        'value' => function($model) {
                            return isset($model->profiles->fname) ? $model->profiles->fname . " " . $model->profiles->lname : "";
                        }
                    ],
                    [
                        'label' => 'เบอร์โทรศัพท์',
                        'value' => function($model) {
                            return isset($model->profiles->tel) ? $model->profiles->tel : " ";
                        }
                    ],
                    [
                        'class' => 'yii\grid\ActionColumn',
                        'template' => '{update} {delete}',
                        'contentOptions' => [
                            'noWrap' => true,
                            'width' => '135px',
                            'text-align' => 'center'
                        ],
                        'buttons' => [
                            'update' => function($url, $model, $key) {
                                return Html::button('<i class="glyphicon glyphicon-edit"></i> Edit', ["data-id"=>"$model->id","data-url"=> Url::to(["/users/user/update-user"]),"data-toggle"=>"tooltip","title"=>"Edit","class" => "btn btn-warning btn-xs btnEdit"]);
                            },
                            'delete' => function($url, $model, $key) {
                                return Html::button('<i class="glyphicon glyphicon-trash"></i> Delete', ["data-id"=>"$model->id","data-reloadDiv"=>Url::to(['/users/user/get-user']),"data-url"=> Url::to(["/users/user/delete"]),"data-toggle"=>"tooltip","title"=>"Delete","class" => "btn btn-danger btn-xs btnDelete"]);
                            }
                        ]
                    ],
                ],
            ]);
            ?>
        </div>
    </div>
</div>

<?= yii\bootstrap\Modal::widget([
    'id'=>'modal-users',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);?>
<?= \app\modules\users\classes\Modal::ModalConfirm("Delete?")?>
<?php $this->render("/js/jsScript");?>
