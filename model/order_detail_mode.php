<?php 
    class Order_Detail extends BaseModel{
        public $table_name = 'order_detail';
        public $order_id;
        public $product_id;
        public $quantity;
        public $price;
        public $create_time;
        public $last_update;

        function select_request($sql){
            return $this->execute($sql);
        }
        
        function select_where($table_name,$table_query,$table_id){
            return $this->select($table_name,$table_query,$table_id);
        }

        function create($order_id, $product_id, $quantity, $price,$create_time,$last_update){
            $data_user = array(
                "order_id" =>$order_id,
                "product_id"=>$product_id,
                "quantity" => $quantity,
                "price" => $price,
                "create_time" =>$create_time,
                "last_update" => $last_update
            );

            return $this->insert($this->table_name,$data_user);
        }

    }
?>