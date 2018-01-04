<?php
    use yii\bootstrap\ActiveForm;
    $this->title = "Update User";
?>

<?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' =>$model->formName(),
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,

]);?>

<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?= $this->title; ?></h4>
    </div>
    <div class="modal-body">
        <?= $form->field($model, "email")->textInput(); ?>
        <?= $form->field($model, "username")->textInput(); ?>
        <?= $form->field($model, "password")->passwordInput(); ?>
        
        <?= $form->field($modelProfile, "fname")->textInput(); ?>
        <?= $form->field($modelProfile, "lname")->textInput(); ?>
        <?= $form->field($modelProfile, "address")->textarea(); ?>
        <?= $form->field($modelProfile, "tel")->widget(\yii\widgets\MaskedInput::className(), [
            'mask' => '999-999-9999',
        ]) ?>
        
    </div>
    <div class="modal-footer text-right">   
        <?= \yii\helpers\Html::button("Cancel", ["class"=>"btn btn-default btnCloseModal"])?>
        <?= \yii\helpers\Html::submitButton("Update", ["class"=>"btn btn-primary"])?>
    </div>
</div>
 

<?php ActiveForm::end(); ?>
<?php $this->render("jsScript");?>
<?php $this->registerJs("
    $('form#".$model->formName()."').on('beforeSubmit', function(e) {
        let form = $(this);
        let formData = form.serialize();
        let url = form.attr('action');
        $.post(url,formData).done(function(res){
            console.log(res);
            CloseModal();
        }).fail(function(){
            console.log('Server Error.');
        });
        
        return false;
    });
")?>
