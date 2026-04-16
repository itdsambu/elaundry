<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('modal_anim_load')) {
    
    function modal_anim_load($msg)
    {
        $html = '<div class="modal fade test" data-backdrop="static" data-keyboard="false" id="modalanimLoadData" tabindex="-1" role="dialog" aria-labelledby="modalanimLoadDataTitle" style="display: none;" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-centered modal-sm" role="document">
                <div class="modal-content">
                    <div class="modal-body text-center">
                         <img src="' . base_url('assets/gif/laundry-icons-square3.gif') . '" width="40%" height="40%">
                        <p class="mt-1">' . $msg . '</p>
                    </div>
                </div>
            </div>
        </div>';
        return $html;
    }
}