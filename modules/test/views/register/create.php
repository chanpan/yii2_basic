<?php
    use yii\bootstrap\ActiveForm;
    $this->title = "ลงทะเบียน";
?>
<?php
$form = ActiveForm::begin([
            'layout' => 'horizontal',
            'id' => $model->formName(),
            'enableAjaxValidation' => false,
            'enableClientValidation' => true,
        ]);
?>
<div class="panel panel-default">
    
    <div class="panel-heading"><?= $this->title; ?></div>
    <div class="panel-body">
        <div id="dialog"></div>
        <?= $form->field($model, "email")->textInput(); ?>
        <?= $form->field($model, "username")->textInput(); ?>
        <?= $form->field($model, "password")->passwordInput(); ?>
    </div>
    <div class="panel-footer text-right">
        <?= \yii\helpers\Html::submitButton("Register", ["class" => "btn btn-primary"]) ?>
    </div>
</div>
<?php ActiveForm::end(); ?>

<?php $this->registerJs("
    $('form#".$model->formName()."').on('beforeSubmit', function(e) {
        let form = $(this);
        let formData = form.serialize();
        let url = form.attr('action');
        $.post(url,formData)
        .done(function(res){
            $('#dialog').html(res.message); 
            console.log(res);
        }).fail(function(){
            console.log('Server Error.');
        });
        
        return false;
    });
    
")?>