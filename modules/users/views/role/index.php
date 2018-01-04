<?php
    use yii\helpers\Url;
    $this->title="Roles";
?>

<div class="row">
    <div id="get-user"></div>
</div>

<?php $this->registerJs("
    (function GetRole(){
       $('#get-user').html('Load data...');
       let url = '" . Url::to(['/users/role/get-role']) . "';
       $.get(url,function(res){ $('#get-user').html(res) });
    })();
")?>

