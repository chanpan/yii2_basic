<?php
    use yii\helpers\Url;
    $this->title="User";
?>


<div class="row">
    <div class="col-md-6">
        <div id="get-user"></div>
    </div>
    <div class="col-md-6">
        <h1>Study for a recognised undergraduate degree with a British university, fully online!</h1>
    </div>
</div>

<?php $this->registerJs("
       $('#get-user').html('Load data...');
       let url = '" . Url::to(['/users/user/get-user']) . "';
       $.get(url,function(res){
           $('#get-user').html(res);
       });
")?>
