<?php
    class Database{
        
        public function select($limit) : array {
            try {                
                $users = json_decode(file_get_contents(DATABASE_FILE), true);
                $users = array_slice($users, 0, $limit);
                return $users;
            } catch (Throwable $th) {
                throw $th->getMessage();
            }
            return false;
        }
    }
?>