<?php
/**
 * システム名　求人サイト
 * 
 * 新規作成　2020/07/09 Thin Yu Wai headerAction/footerAction
 */
class JobInfoController extends ControllerBase
{

    /** 
     * 初期処理
     * params なし
     * return なし
     */
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
     * 求人登録画面
     * params なし
     * return なし
     */
    public function indexAction()
    {
        $this->assets->addJs("js/jquery.validate.min.js",true);
        $this->assets->addJs("js/jquery.validate.js",true);
        $this->assets->addJs("js/job.js", true);
        $id = $this->request->getQuery("id") ;

        if($id != null) {
            
            $jobData = TbJobOffer::findFirst([
                "conditions" => "id = ?0 and del_flg = ?1",
                "bind"       => [$id, FALSE]
            ]);

            $this->view->setVar('job_data', $jobData);
        }
    }

    /** 
     * 求人登録処理
     * params postデータ $getPost
     * return なし
     */
    public function insertAction() {
        $getKeyArr = array(
            'job_id',
            'job_title',
            'job_description',
            'hire_number',
            'FromDate',
            'ToDate'
        );
        //POST データの取得
        $postData = $this->getPostData($getKeyArr);

        //データの登録
        $this->_insertJobOffer($postData);

        $this->response->redirect('job_info/detail');
    }

    /** 
     * 求人リスト処理
     * params postデータ $getPost　検索項目
     * return なし
     */
    public function detailAction() {
        
        $this->assets->addCss("css/job.css", true);
        $searchKey = array(
            'searchFromDate',
            'searchToDate'
        );
        
        //POST データの取得
        $searchCon = $this->getPostData($searchKey);
        $jobData = TbJobOffer::getJobData($searchCon['searchFromDate'], $searchCon['searchToDate']);
        
        $this->view->setVar("searchFromDate", $searchCon['searchFromDate']);
        $this->view->setVar("searchToDate", $searchCon['searchToDate']);
        $this->view->setVar("job_data", $jobData);
    }

    /** 
     * 求人登録処理　Transaction Begin End
     * params postデータ $getPost
     * return なし
     */
    private function _insertJobOffer($postData) {

        try {
            $this->db->begin();
            
            if($postData['job_id'] == null) {
                $jobModel = new TbJobOffer();
                $jobModel->title = $postData['job_title'];
                $jobModel->description = $postData['job_description'];
                $jobModel->hire_number = (int)$postData['hire_number'];
                $jobModel->from_date   = date("Y-m-d", strtotime($postData['FromDate']));
                $jobModel->to_date     = date("Y-m-d", strtotime($postData['ToDate']));
                $success = $jobModel->create();
            } else {
                
                $jobData = TbJobOffer::findFirst([
                    "conditions" => "id = ?0 and del_flg = ?1",
                    "bind"       => [$postData['job_id'], FALSE]
                ]);
                $jobData->title = $postData['job_title'];
                $jobData->description = $postData['job_description'];
                $jobData->hire_number = (int)$postData['hire_number'];
                $jobData->from_date   = date("Y-m-d", strtotime($postData['FromDate']));
                $jobData->to_date     = date("Y-m-d", strtotime($postData['ToDate']));
                $success = $jobData->update();
            }
            if(!$success) {
                throw new Exception();
            }
            $this->db->commit();
        } catch(exception $e) {
            $this->db->rollback();
            throw new Exception();
        }
    }
}

