<?php 
    class Comments extends BaseModel{
        public $table_name = 'comments';
        public $user_id;
        public $product_id;
        public $content;
        public $content_time;

        function create($user_id, $product_id, $content, $content_time){
            $data_user = array(
                "user_id" =>$user_id,
                "product_id"=>$product_id,
                "content" => $content,
                "content_time" => $content_time,
            );

            return $this->insert($this->table_name,$data_user);
        }
    }
?>