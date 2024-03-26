<?php 


    class user extends BaseModel{
        public $table_name = "user";
        public $username;
        public $email;
        public $address;
        public $phone;
        public $avatar;
        public $password;
        public $status;
        public $bank;
        public $bank_account_number;
        public $adress;


        function select_request($sql){
            return $this->execute($sql);
        }

        function select_user(){
            return $this->select_all($this->table_name);
        }

        function select_query($table_query, $table_value){
            return $this->select($this->table_name,$table_query,$table_value);
        }

        function create($data_user){
            return $this->insert($this->table_name, $data_user);
        }

        function update_user( $username,$email,$address,$phone_number,$avatar,$gender,$Nationality, $table_where_query, $table_where_value){
            $data_user_update = array(
                "username"=>$username,
                "email"=>$email,
                "adress"=> $address,
                "phone_number"=>$phone_number,
                "avatar" =>$avatar,
                "gender" => $gender,
                "Nationality" =>$Nationality,
                
            );
            return $this->update($this->table_name,$data_user_update,$table_where_query,$table_where_value);
        }

        function select_inner_field($table,$fields,$condition){    
            return $this->select_inner_join($table,$fields,$condition);
        }
    }
?>