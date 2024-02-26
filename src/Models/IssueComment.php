<?php

namespace Models;

use Config\Database;

class IssueComment
{
    private $table = 'issue_comments';
    private $id;
    private $issue_id;
    private $user_id;
    private $comment;
    private $created_at;

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
    public function getUserId()
    {
        return $this->user_id;
    }
    public function getComment()
    {
        return $this->comment;
    }
    public function getCreatedAt()
    {
        return $this->created_at;
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
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;
    }
    public function setComment($comment)
    {
        $this->comment = $comment;
    }
    
}
