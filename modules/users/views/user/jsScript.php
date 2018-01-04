<?php
    use yii\helpers\Url;
?>

<?php $this->registerJs("
    $('[data-toggle=\"tooltip\"]').tooltip(); 
    
    function getUser(){
       let url = '".Url::to(['/users/user/get-user'])."';
       $.get(url,function(res){
           $('#get-user').html(res);
       });
    };
    
    $('.btnEdit').click(function(){
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        $.get(url,{id:id},function(res){
            $('#modal-user').modal('show');
            $('#modal-user .modal-content').html(res);
        });
        return false;
    });/*edit user*/
    $('.btnDelete').click(function(){
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        $('#modal-delete').modal('show'); 
        return false;
    });/*delete user*/
    

    $('.btnCloseModal').click(function(){
        CloseModal();
    });
    
    function CloseModal(){
        $('#modal-user').modal('hide');
        setTimeout(function(){getUser();});
    }
 
")?>