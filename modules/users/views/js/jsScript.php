<?php
    use yii\helpers\Url;
?>

<?php $this->registerJs("
    $('[data-toggle=\"tooltip\"]').tooltip();
    
    $('#form-users').on('beforeSubmit', function(e) {
        let form = $(this);
        let formData = form.serialize();
        let url = form.attr('action');
        
        let dataUrl = $('#reloadDiv').attr('data-url');
        $.post(url,formData).done(function(res){
            console.log(res);
            CloseModal(dataUrl);
        }).fail(function(){
            console.log('Server Error.');
            CloseModal(dataUrl);
        });
        return false;
    });
    
    $('.btnCreate').on('click',function(e){
        let url = $(this).attr('data-url');
        LoadModal(url,'');
        return false;
    });
    
    $('.btnEdit').click(function(){
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        let data = {id:id};
        LoadModal(url,data);
        return false;
    });
    $('.btnDelete').click(function(){
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        let reloadDiv = $(this).attr('data-reloadDiv');
        let data = {id:id};
        $('#modal-delete').modal('show');
        $('#modal-delete #ModalBtnOk').attr('data-url',url);
        $('#modal-delete #ModalBtnOk').attr('data-id',id);
        $('#modal-delete #ModalBtnOk').attr('data-reloadDiv',reloadDiv);
        return false;
    });
    $('#ModalBtnOk').on('click',function(e){
        let url = $(this).attr('data-url');
        let id = $(this).attr('data-id');
        let UrlreloadDiv = $(this).attr('data-reloadDiv');
        $.post(url,{id:id},function(res){
            console.log(res);
            $('#modal-delete').modal('hide');
            reloadDiv(UrlreloadDiv);
        });
    });
    
    function LoadModal(url,data){
        $('#modal-users').modal('show');
        $('#modal-users .modal-content').html('Loading...');
        $.get(url,data,function(res){
            $('#modal-users .modal-content').html(res);
        });
        return false;
    }
    
    $('.btnCloseModal').on('click',function(e){
         let url = $(this).attr('data-url');
         CloseModal(url);
    });
    
    function CloseModal(url){
        $('#modal-users').modal('hide');
        setTimeout(function(){reloadDiv(url);},1000);
        return false;
    }
    
    function reloadDiv(url){
       $('#get-user button').attr('disabled','true');
       $.get(url,function(res){
           $('#get-user').html(res);
       });
       return false;
    };
 
")?>