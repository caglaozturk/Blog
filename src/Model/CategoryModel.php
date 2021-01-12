<?php

namespace BigBear\Model;

use BigBear\System\Model;
use \PDO;

class CategoryModel extends Model{
    protected $tableName = 'category';

    public function getAll(){
        $result = $this->selects()->fetchAll();
        return $result;
    }
}