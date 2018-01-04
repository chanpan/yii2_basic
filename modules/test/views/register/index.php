<?php
    $this->title = "ลงทะเบียน";
?>
<div class="row">
    <div class="col-md-6 col-md-offset-3">
        <div id="test-user">OK</div>
    </div>
</div>
<?php 
$this->registerJs("
   let url = '".yii\helpers\Url::to(['/test/register/create'])."';
   $.get(url, function(res){
      $('#test-user').html(res);  
   });
");
?>
