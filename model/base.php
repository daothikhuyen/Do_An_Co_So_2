<?php
    class BaseModel{
        
        function execute($sql){
            $conn = new Connection();
            // echo $sql;
            $cusor = mysqli_query($conn->connect(), $sql);

            return $cusor;
        }

        function select_all($table){
            $sql = "SELECT *FROM `$table`";
            return $this -> execute($sql);
        }

        function select($table, $table_query, $table_id){
            $sql = "SELECT *FROM `$table` WHERE `$table_query`='".$table_id."'";
            // echo $sql;
            // exit;
            return $this -> execute($sql);
        }

        function select_start_end($table,$table_query,$action,$limit,$offset){
            $sql = "SELECT * FROM $table ORDER BY $table_query $action LIMIT $limit OFFSET $offset";
            return $this -> execute($sql);
        }

        function insert($table, $insert_value){
            date_default_timezone_set('Asia/Ho_Chi_Minh');

            $value =[];
            $insert_clumns_db =[];
           
            foreach($insert_value as $column_name => $column_value){
                $insert_clumns_db[] = "`".$column_name."`";
                $value[]="'".$column_value."'";
            }
            $insert_clums_string = implode(",", $insert_clumns_db);
            $insert_value_string = implode(",",$value);

            $sql = "INSERT INTO `".$table."` ($insert_clums_string) VALUES ($insert_value_string)";
            // echo $sql;
            return $this-> execute($sql);
        }

        function update($table,$update_value,$table_query,$table_value){
            date_default_timezone_set('Asia/Ho_Chi_Minh');
            $value =[];
            
            foreach ($update_value as $column_name => $column_value) {
                $value[]="`$column_name` = '$column_value'";
            }

            $update_value_string = implode(",",$value);
            
            $sql = "UPDATE `$table` SET ".$update_value_string." WHERE `".$table_query."` = ".$table_value;
            // echo $sql;
            return $this ->execute($sql);
        }

        function delete($table, $query_delete, $delete_value){
            $sql = "DELETE FROM $table WHERE $query_delete = $delete_value";
            return $this-> execute($sql);
        }

        function select_alll($table, $extra){

            $sql = "SELECT * FROM $table";
            $where_condition = "";
            $order_by = "";
            // {where: {id = 2, category_id: [2,3]}, order_by: {fields: [id, name], type: ASC|DESC}}
            $extr = [
                "where" => [
                    "id" => 1,
                    "category_id" => [3,4]
                ],
                "order" => [
                    "by" => ["id", "name"],
                    "type" => "ASC"
                ]
            ];
            foreach($extr as $column_name => $column_value){
                $sub_condition = "";
                if(gettype($column_value) == 'array'){
                    $sub_condition = $column_name.' IN'.$column_value;
                }else{
                    $sub_condition = $column_name.' = '.$column_value;
                }
                $where_condition .=$sub_condition;
            }
            if($where_condition){
                $sql.=' WHERE '.$where_condition;
            }
            if($order_by){

            }
            return $this -> execute($sql);
            // build_where_query
            // build_order_by
            // build_group_by
            // build_inner_join
            //
        }

        function select_inner_join($table,$fields,$condition){
            $sql = " SELECT ".implode(',',$fields)." FROM ".$table[0];

            for ($i=1; $i < count($table) ; $i++) { 
                $sql.= " INNER JOIN ".$table[$i]."
                        ON ".$condition[0]."
                        WHERE ".$condition[$i]."";
                
            }
            // echo $sql;
            // exit();
            return $this->execute($sql);
        }

    }
?>