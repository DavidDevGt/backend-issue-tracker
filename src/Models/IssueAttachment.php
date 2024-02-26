<?php
namespace Models;

use Config\Database;

class IssueAttachment
{
    private $table = 'issue_attachments';
    private $id;
    private $issue_id;
    private $filename;
    private $filepath;
    private $uploaded_by_user_id;
    private $upload_date;

    protected function getDbConnection()
    {
        return Database::getInstance()->getConnection();
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getIssueId()
    {
        return $this->issue_id;
    }
    public function getFilename()
    {
        return $this->filename;
    }
    public function getFilepath()
    {
        return $this->filepath;
    }
    public function getUploadedByUserId()
    {
        return $this->uploaded_by_user_id;
    }
    public function getUploadDate()
    {
        return $this->upload_date;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setIssueId($issue_id)
    {
        $this->issue_id = $issue_id;
    }
    public function setFilename($filename)
    {
        $this->filename = $filename;
    }
    public function setFilepath($filepath)
    {
        $this->filepath = $filepath;
    }
    public function setUploadedByUserId($uploaded_by_user_id)
    {
        $this->uploaded_by_user_id = $uploaded_by_user_id;
    }

}