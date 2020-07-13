<?php

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset\Simple as Resultset;
class TbJobOffer extends Model
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $description;

    /**
     * @var integer
     */
    private $hire_number;

    /**
     * @var string
     */
    private $from_date;

    /**
     * @var string
     */
    private $to_date;

    /**
     * @var string
     */
    private $created_date;

    /**
     * @var string
     */
    private $modified_date;

    /**
     * @var integer
     */
    private $del_flg;
    
    public function initialize()
    {
        $this->setSource('tb_job_offer');
        $this->useDynamicUpdate(true);
    }

    public function getId() {
        return $this->id;
    }

    public function getTitle() {
        return $this->title;
    }

    public function setTitle(String $title) {
        $this->title = $title;
    }

    public function getDescription() {
        return $this->description;
    }

    public function setDescription(String $description) {
        $this->description = $description;
    }

    public function getHireNumber() {
        return $this->hire_number;
    }

    public function setHireNumber(String $hire_number) {
        $this->hire_number = $hire_number;
    }

    public function getFromDate() {
        return (new DateTime($this->from_date))->format('Y/m/d');
    }

    public function setFromDate(String $from_date) {
        $this->from_date = $from_date;
    }

    public function getToDate() {
        return (new DateTime($this->to_date))->format('Y/m/d');
    }

    public function setToDate(String $to_date) {
        $this->to_date = $to_date;
    }

    public function beforeValidationOnCreate() {
        
        $this->created_date = date('Y-m-d H:i:s');
        $this->modified_date = date('Y-m-d H:i:s');
    }

    public function beforeValidationOnUpdate() {
        $this->modified_date = date('Y-m-d H:i:s');
    }

    /** 
     * 求人情報取得
     * params string $fromDate, $toDate
     * return array 求人データ
     */
    public static function getJobData($fromDate, $toDate) {

        $params = [
            'del_flg' => FALSE
        ];
        $whereCondition = '';
        if($fromDate != null) {
            $whereCondition .= " AND DATE_FORMAT(jo.from_date, '%Y/%m/%d') >= :from_date ";
            $params['from_date'] = $fromDate;
        }
        
        if($toDate != null) {
            $whereCondition .= " AND DATE_FORMAT(jo.to_date, '%Y/%m/%d') <= :to_date ";
            $params['to_date'] = $toDate;
        }
        
        $sql = "SELECT 
                  jo.id,
                  jo.title,
                  jo.description,
                  jo.hire_number,
                  jo.from_date,
                  jo.to_date,
                  COUNT(a.id) AS count_apply
                FROM tb_job_offer AS jo
                LEFT JOIN tb_apply AS a
                ON a.job_id = jo.id
                WHERE jo.del_flg = :del_flg
                $whereCondition 
                GROUP BY jo.id";

        $model = new TbJobOffer();
        $rows  = new Resultset(
            null,
            $model,
            $model->getReadConnection()->query($sql, $params)
        );;

        if(!$rows) {
            return array();
        }

        return $rows->toarray();
    }

    /** 
     * 応募情報取得
     * params string $id
     * return array 応募データ
     */
    public static function getApplyData($id)
    {
        
        $sql = "SELECT 
                  jo.id,
                  jo.title,
                  jo.description,
                  jo.hire_number,
                  jo.from_date,
                  jo.to_date,
                  u.name,
                  u.age,
                  u.degree,
                  a.apply_status
                FROM tb_job_offer AS jo
                LEFT JOIN tb_apply AS a
                ON a.job_id = jo.id
                LEFT JOIN tb_user AS u
                ON u.user_id = a.user_id
                WHERE jo.id = :id
                AND jo.del_flg = :del_flg";
            
        $params = array(
            "id" => $id,
            "del_flg" => FALSE
        );
        $model = new TbJobOffer();
        $rows  = new Resultset(
            null,
            $model,
            $model->getReadConnection()->query($sql, $params)
        );

        if(!$rows) {
            return array();
        }

        return $rows->toarray();

    }
}
?>