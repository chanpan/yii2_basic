<?php
    $this->title = "ลงทะเบียน";
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div id="form-user"></div>
    </div>
</div>

<?php 
$this->registerJs("
   function LoadForm(){
     $.get('".yii\helpers\Url::to(['/users/register/create'])."', function(res){
        $('#form-user').html(res);  
     });
   }
   LoadForm();
");
?>