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
}
