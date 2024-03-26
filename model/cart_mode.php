<?php 


    class cart extends BaseModel{
        public $table_name = "cart";
        public $id_product;
        public $total;
        public $status;
        public $quantity;
        public $user_id;

        function select_request($sql){
            echo $sql;
            return $this->execute($sql);
        }

        function select_user(){
            return $this->select_all($this->table_name);
        }

        function select_query($table_query, $table_value,$condition){
           
            if($condition == 'select'){
                return $this->select($this->table_name, $table_query, $table_value);
            }else if($condition == 'delete'){
                return $this->delete($this->table_name, $table_query, $table_value);
            }
            
        }

        function create($id_product, $status, $quantity, $user_id){
            $data_user = array(
                "id_product"=>$id_product,
                "status"=>$status,
                "quantity"=> $quantity,
                "user_id"=>$user_id,
            );
            return $this->insert($this->table_name, $data_user);
            
        }

        function select_inner_field($table,$fields,$condition){
            
            return $this->select_inner_join($table,$fields,$condition);
        }
    }
?>