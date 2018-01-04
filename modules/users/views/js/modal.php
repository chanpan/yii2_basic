<?= yii\bootstrap\Modal::widget([
    'id'=>'modal-users',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);?>
<?= \app\modules\users\classes\Modal::ModalConfirm("Delete?")?>