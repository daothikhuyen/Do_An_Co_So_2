<?php 

    class User extends BaseModel{
        public $table_name = "user";
        public $name;
        public $email;
        public $password;

        function create($username, $email, $avatar, $password){
            $data_user = array(
                "username"=>$username,
                "email"=>$email,
                "avatar"=> $avatar,
                "password"=>$password,
            );
            return $this->insert($this->table_name, $data_user);
        }
    }
?>