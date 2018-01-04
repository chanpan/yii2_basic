<?php
    use yii\helpers\Url;
    use yii\bootstrap\ActiveForm;
    $this->title = "Update User";
?>

<?php $form = ActiveForm::begin([
        'layout' => 'horizontal',
        'id' =>'form-users',
        'enableAjaxValidation' => false,
        'enableClientValidation' => true,

]);?>

<div class="modal-content">
    <div class="modal-header">
        <button type="button" class="close btnCloseModal" data-url="<?= Url::to(['/users/user/get-user'])?>">&times;</button>
        <h4 class="modal-title"><?= $this->title; ?></h4>
    </div>
    <div class="modal-body">
        <div id="reloadDiv" data-url="<?= Url::to(['/users/user/get-user'])?>"></div>
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
        <?= \yii\helpers\Html::button("Cancel", ["data-url"=>Url::to(['/users/user/get-user']),"class"=>"btn btn-default btnCloseModal"])?>
        <?= \yii\helpers\Html::submitButton("Update", ["class"=>"btn btn-primary"])?>
    </div>
</div>
 

<?php ActiveForm::end(); ?>
<?php $this->render("/js/jsScript");?>
 