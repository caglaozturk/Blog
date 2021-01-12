<?php

namespace BigBear\Model;

use BigBear\System\Model;
use \PDO;

class PostModel extends Model{
    protected $tableName = 'post';

    public function getAll(){
        $result = $this->selects()->fetchAll();
        return $result;
    }
}