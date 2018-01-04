<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\modules\users\classes;

/**
 * Description of Modal
 *
 * @author damasa
 */
class Modal {
    //put your code here
    public static function ModalConfirm($title,$id="modal-delete"){
        return '
                <div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" id="'.$id.'">
                    <div class="modal-dialog modal-md">
                      <div class="modal-content">
                        <div class="modal-header">
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                          <h4 class="modal-title" id="myModalLabel">'.$title.'</h4>
                        </div>
                        <div class="modal-footer">
                          <button type="button" data-dismiss="modal" aria-label="Close" class="btn btn-default" id="modal-btn-si">Cancel</button>
                          <button type="button" class="btn btn-primary" id="ModalBtnOk">Ok</button>
                        </div>
                      </div>
                    </div>
                  </div>
               ';
            
    }
}
