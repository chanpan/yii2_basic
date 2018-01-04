<?php
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
?>
<?php $form= ActiveForm::begin([
    'layout' => 'horizontal',
    'id' =>'form-users',
    'enableAjaxValidation' => false,
])?>


<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close btnCloseModal" data-url="<?= Url::to(['/users/role/get-role'])?>">&times;</button>
        <h4 class="modal-title"><?= $this->title; ?></h4>
    </div>
    <div class="modal-body">
        <div id="reloadDiv" data-url="<?= Url::to(['/users/role/get-role']);?>"></div>
        <?= $form->field($model, "role_name")->textInput(); ?>
        <?= $form->field($model, "role_description")->textInput(); ?>
    </div>
    <div class="modal-footer text-right">   
        <?= \yii\helpers\Html::button("Cancel", ['data-url'=>Url::to(['/users/role/get-role']),"class"=>"btn btn-default btnCloseModal"])?>
        <?= \yii\helpers\Html::submitButton("Save", ["class"=>"btn btn-primary"])?>
    </div>
</div>

<?php ActiveForm::end();?>
<?php $this->render("/js/jsScript")?>
 