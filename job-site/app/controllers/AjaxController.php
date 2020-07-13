<?php

use Phalcon\Logger\Adapter\File as DebugLogger;
class AjaxController extends ControllerBase {

    public function initialize() {
        $this->view->disable();
    }

    public function fileUploadAction() {

        if(count($_FILES) == 0) {
            return json_encode(ErrorMessage::FILE_UPLOAD_ERROR);
        }
        $readFileData = $this->fileUploadComponent->uploadFile($_FILES);
        
        return json_encode($readFileData);
    } 
}
?>