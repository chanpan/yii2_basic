<?= yii\bootstrap\Modal::widget([
    'id'=>'modal-user',
    'clientOptions' => ['backdrop' => 'static', 'keyboard' => FALSE]
]);?>
<?= \app\modules\users\classes\Modal::ModalConfirm("Delete?")?>