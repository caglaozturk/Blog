<?php

namespace BigBear\Model;

use BigBear\System\Model;
use \PDO;

class SettingModel extends Model{
    protected $tableName = 'settings';

    public function getAllSettings(){
        $result = $this->selects()->fetchAll();
        return $result;
    }

    public function getSetting($id){
        $result = $this->where('id', $id)->fetch();
        /*
        echo "<pre>";
        print_r($result);
        echo "</pre>";
        */
        return $result;
    }
}