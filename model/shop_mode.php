<?php  

    class Shop extends BaseModel{
        public $table_name = 'product';
        public $category_id;
        public $title;
        public $price;
        public $discount;
        public $description;
        public $created_time;
        public $last_update;
        public $quantity;
        public $image;
        public $star;
        public $request;
        public $limit;
        public $offset;

        function select_request($sql){
            return $this->execute($sql);
        }

        function select_all_product(){
            return $this->select_all($this->table_name);
        }

        function update_product($data_user_update,$table_where_query,$table_where_value){
            return $this->update($this->table_name,$data_user_update,$table_where_query,$table_where_value);
        }

        function select_query( $table_query, $table_id,$condition){
            if($condition == 'select'){
                return $this->select($this->table_name, $table_query, $table_id);
            }else if($condition == 'delete'){
                
                return $this->delete($this->table_name, $table_query, $table_id);
            }
        }

        function select_action($table_query,$action,$limit,$offset){
            return $this->select_start_end($this->table_name,$table_query,$action,$limit,$offset);
        }

        //comments
        function select_inner_field($table,$fields,$condition){
            
            return $this->select_inner_join($table,$fields,$condition);
        }

        //insert
        function create($data_array){
            return $this->insert($this->table_name,$data_array);
        }        

    }
?>