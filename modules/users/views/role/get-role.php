<?php

use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\GridView;

$this->title = "Roles";
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="panel-title">
            <?= $this->title; ?>
            <?= Html::button('<i class="glyphicon glyphicon-plus"></i>', ["data-url"=> Url::to(["/users/role/create"]),"class"=>"btn btn-sm btn-success pull-right btnCreate"])?>
            <div class="clearfix"></div>
        </div>
    </div>
    <div class="panel-body">
        <?=
        GridView::widget([
            'dataProvider' => $dataProvider,
            'columns' => [
                'role_name',
                'role_description',
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
                            return Html::button('<i class="glyphicon glyphicon-edit"></i> Edit', ["data-id" => "$model->id", "data-url" => Url::to(["/users/role/update-role"]), "data-toggle" => "tooltip", "title" => "Edit", "class" => "btn btn-warning btn-xs btnEdit"]);
                        },
                        'delete' => function($url, $model, $key) {
                            return Html::button('<i class="glyphicon glyphicon-trash"></i> Delete', ["data-id" => "$model->id","data-reloadDiv"=>Url::to(['/users/role/get-role']),"data-url" => Url::to(["/users/role/delete"]), "data-toggle" => "tooltip", "title" => "Delete", "class" => "btn btn-danger btn-xs btnDelete"]);
                        }
                    ]
                ],
            ]
        ])
        ?>
    </div>
</div>
<?= yii\bootstrap\Modal::widget([
    'id'=>"modal-users",
    'clientOptions'=>['backdrop' => 'static', 'keyboard' => FALSE]
])?>
<?= app\modules\users\classes\Modal::ModalConfirm("Delete ? ", 'modal-delete')?>
<?php $this->render("/js/jsScript"); ?>