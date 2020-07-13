<?php
use Phalcon\Http\Request;
class JobApplyController extends ControllerBase
{
    public function initialize() {
        $this->assets->addCss("css/style.css", true);
        $this->assets->addCss("https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
        $this->assets->addJs("js/jquery-3.4.1.min.js", true);
        $this->assets->addJs("https://code.jquery.com/jquery-1.12.4.js");
        $this->assets->addJs("https://code.jquery.com/ui/1.12.1/jquery-ui.js");
        $this->assets->addJs("js/common.js", true);
        $this->view->role = $this->session->get('auth_user') == ADMIN ? "admin" : "user";
    }

    /** 
     * ログイン画面のアクション
     * params なし
     * return なし
     */
    public function listAction()
    {
        $this->assets->addCss("css/job.css", true);
        $id = $this->request->getQuery("id") ;

        if($id == null) {
            $this->response->redirect('job_info/detail');
        }

        $applyData = TbJobOffer::getApplyData($id);
        $this->view->setVar("title", $applyData[0]['title']);
        $this->view->setVar("from_date", $applyData[0]['from_date']);
        $this->view->setVar("to_date", $applyData[0]['to_date']);
        $this->view->setVar("apply_data", $applyData);
    }

}

