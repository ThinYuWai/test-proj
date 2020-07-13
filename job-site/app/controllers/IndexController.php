<?php
/**
 * システム名　求人サイト
 * 
 * 新規作成　2020/07/09 Thin Yu Wai headerAction/footerAction
 */

class IndexController extends ControllerBase
{
    public function initialize() {
        $this->assets->addCss("css/style.css", true);
        $this->assets->addCss("https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css");
        $this->assets->addJs("js/jquery-3.4.1.min.js", true);
        $this->assets->addJs("https://code.jquery.com/jquery-1.12.4.js");
        $this->assets->addJs("https://code.jquery.com/ui/1.12.1/jquery-ui.js");
        $this->assets->addJs("js/jquery-3.4.1.min.js", true);
        $this->assets->addJs("js/common.js", true);
        $this->view->role = $this->session->get('auth_user') == ADMIN ? "admin" : "user";
    }

    public function indexAction()
    { 
        $this->assets->addCss("css/index.css", true);
    }
}

