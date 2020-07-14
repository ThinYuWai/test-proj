<?php
/**
 * システム名　求人サイト
 * 
 * 新規作成　2020/07/09 Thin Yu Wai beforeExecuteRoute
 */
use Phalcon\Http\Request;
use Phalcon\Mvc\Controller;
abstract class ControllerBase extends Controller
{

    /** 
     * 画面表示する前のチェック
     * params なし
     * return なし
     */
    public function beforeExecuteRoute() 
    {
        if ($this->dispatcher->getActionName() !== 'login' 
           && empty($this->session->get('auth_user'))) {
            $this->response->redirect('login/login');
        }
    }

    /** 
     * 送信データ取得
     * params array $keys
     * return array $data
     */
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
