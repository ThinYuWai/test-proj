<?php
use Phalcon\Http\Request;
class LoginController extends ControllerBase
{
    public function initialize() {
        $this->assets->addCss("../css/login.css", true);
    }

    public function indexAction()
    {
    }

    /** 
     * ログイン画面のアクション
     * params なし
     * return なし
     */
    public function loginAction()
    {
        $request = new Request();
        $email = $request->getPost('userEmail');
        $password = $request->getPost('password');

        if(isset($_POST['login']) && $_POST['login'] === 'Login') {
            $has_data = TbLogin::findFirst([
                "conditions" => "user_email = ?0 and password = ?1 and del_flg = ?2",
                "bind"       => [$email, $password, FALSE]
            ]);
    
            if(!$has_data) {
                $this->view->setVar('error', ErrorMessage::LOGIN_LOST_ERROR);
            } else {
                // セッシュン変数のセット
                $this->session->set('auth_user', $has_data->auth_user);
                $this->response->redirect('index/index');
            }
        }
        $this->view->setVar('email', $email);
        $this->view->setVar('password', $password);
    }

}

