<?php
    require_once '../dbconnect.php';

    class UserLogic
    {
        /**
         * ユーザーを登録する
         * @param array $userData
         * @return bool $result
         */
        public static function createUser($userData)
        {
            $result =false;

            $sql ='INSERT INTO users (name, email, password) VALUES (?, ?, ?)';

            $arr = [];
            $arr[] = str_repeat('あ', '64');
            $arr[] = $userData['email'];
            $arr[] = password_hash($userData['password'],PASSWORD_DEFAULT);
            try {
                $stmt = connect()->prepare($sql);
                $result = $stmt->execute($arr);    
                return $result;
            } catch(\Exception $e) {
                echo $e;
                error_log($e, 3, '../error.log');
                return $result;
            }
            return $result;
        }
    }

?>