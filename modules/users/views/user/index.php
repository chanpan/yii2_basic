<?php
    use yii\helpers\Url;
    $this->title="User";
?>


<div class="row">
    <div id="get-user"></div>
</div>

<?php $this->registerJs("
       $('#get-user').html('Load data...');
       let url = '" . Url::to(['/users/user/get-user']) . "';
       $.get(url,function(res){
           $('#get-user').html(res);
       });
")?>
