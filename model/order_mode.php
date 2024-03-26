<?php

    class Order extends BaseModel{
        public $table_name = 'order';
        public $user_id;
        public $fullname;
        public $email;
        public $adress;
        public $phone_number;
        public $status;
        public $total_money;

        function select_request($sql){
            return $this->execute($sql);
        }

        function select_all_order(){
            return $this->select_all($this->table_name);
        }

        function select_where($table_name,$table_query,$table_id){
            return $this->select($table_name,$table_query,$table_id);
        }

        function create($con, $user_id, $fullname, $email, $adress, $phone_number,$status,$total_money,$create_time,$last_time){
            $data_user = array(
                "user_id" =>$user_id,
                "fullname"=>$fullname,
                "email" => $email,
                "adress" => $adress,
                "phone_number" => $phone_number,
                "status" => $status,
                "total_money" => $total_money,
                "create_time" =>$create_time,
                "last_time" =>$last_time
            );

            // Thực hiện câu lệnh insert
            $this->insert($this->table_name, $data_user);

            return $con->insert_id;

        }

        function update_order($data_user_update,$table_where_query,$table_where_value){
            return $this->update($this->table_name,$data_user_update,$table_where_query,$table_where_value);
        }

    }

?>