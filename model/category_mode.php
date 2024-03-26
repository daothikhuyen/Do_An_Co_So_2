<?php 
    class Category extends BaseModel{
        public $table_name = 'category';
        public $name;
        public $image;

        function select_all_category(){
            return $this->select_all($this->table_name);
        }
    }

    
?>