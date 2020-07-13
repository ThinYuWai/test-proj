<?php

use Phalcon\Mvc\Model;

class TbApply extends Model
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $job_id;

    /**
     * @var integer
     */
    private $user_id;

    /**
     * @var integer
     */
    private $apply_status;

    /**
     * @var string
     */
    private $comment;

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
        $this->setSource('tb_apply');
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId(Integer $id)
    {
        $this->id = $id;
    }

    public function getJobId()
    {
        return $this->job_id;
    }

    public function setJobId(Integer $jobId)
    {
        $this->job_id = $job_id;
    }

    public function getUserId()
    {
        return $this->user_id;
    }

    public function setUserId(Integer $userId)
    {
        $this->user_id = $userId;
    }

    public function getApplyStatus()
    {
        return $this->apply_status;
    }

    public function setApplyStatus(String $applyStatus)
    {
        $this->apply_status = $applyStatus;
    }

    public function getApplyDate()
    {
        return $this->apply_date;
    }

    public function setApplyDate(String $applyDate)
    {
        $this->apply_date = $applyDate;
    }

    public function getComment()
    {
        return $this->comment;
    }

    public function setComment(String $comment)
    {
        $this->comment = $comment;
    }
}
?>