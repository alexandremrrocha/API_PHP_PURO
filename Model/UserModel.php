<?php
    require_once ROOT_PATH ."/Model/Database.php";

    class UserModel extends Database{
        
        public function getUser($limit) : array{
            
            return $this->select($limit);
        }
    }
?>