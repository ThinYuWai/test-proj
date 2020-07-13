<?php
/**
 * システム名　求人サイト
 * 
 * 新規作成　2020/07/09 Thin Yu Wai uploadFile, _checkFileType, _readFileData
 */
use Phalcon\Mvc\User\Component;

class FileuploadComponent extends Component {

    private $fileResult = null;

    private $isType   = FALSE;

    /** 
     * ファイルアップロード処理
     * params array $fileData
     * return $readFileResult ファイルの読込結果
     */
    public function uploadFile(array $fileData):array {
    
      $returnData = array();
      foreach($fileData as $file) {
          
        $this->isType = $this->_checkFileType($file['type']);

        if(!$this->isType) {
            $returnData['error'] = ErrorMessage::FILE_TYPE_ERROR;
        } else {

            $this->_readFileData($file['tmp_name'], $file['type']);
            
            if($this->fileResult == null) {
                $returnData['error'] = ErrorMessage::FILE_READ_ERROR;
            } else {
                $returnData['data'] = $this->fileResult;
            }
        }
        return $returnData;
      }
        
    }

    /** 
     * ファイルのタイプチェック
     * params String $type
     * return bool
     */
    private function _checkFileType(String $type):bool {

        switch($type) {
            case "text/plain" :
                return true;
            default :
                return false;
        }
    }

    /** 
     * ファイルの読込
     * params String $type, $tmpFile
     * return なし
     */
    private function _readFileData(String $tmpFile,String $type) {

        switch($type) {
            case "text/plain" :
              $this->fileResult = file_get_contents($tmpFile);
              break;
            default :
              break;
        }
    }
}
?>