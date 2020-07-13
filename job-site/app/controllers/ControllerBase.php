<?php
/**
 * システム名　求人サイト
 * 
 * 新規作成　2020/07/09 Thin Yu Wai beforeExecuteRoute
 */
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
use Phalcon\Logger\Adapter\File as DebugLogger;
abstract class ControllerBase extends Controller
{

    /** 
     * 画面表示する前のチェック
     * params なし
     * return なし
     */
    public function beforeExecuteRoute() 
    {
        $logger = new DebugLogger('../public/temp/debug.log');
        $logger->log(print_r("FDSF",true),LOG_DEBUG);
        $logger->log(print_r($this->dispatcher->getActionName(),true),LOG_DEBUG);
        $logger->log(print_r($this->session->get('auth_user'),true),LOG_DEBUG);
        // if ($this->dispatcher->getActionName() !== 'login' 
        //    && empty($this->session->get('auth_user'))) {
        //     $this->response->redirect('login/login');
        //    }
    }

    protected function getPostData(array $keys):array {
        $data = array();
        $request = new Request();
        foreach($keys as $key) {
            $data[$key] = $request->getPost($key);
        }
        return $data;
    }

    abstract public function initialize();
    
}
