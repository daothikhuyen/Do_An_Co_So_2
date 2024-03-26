<?php 
    include '../db/connection.php';

    class BaseModel{
        public $id;
        public $created_at;
        public $updated_at;
        
        function execute($sql){            
            $con = new Connection();
            echo $sql;
            $cusor = mysqli_query($con->connect(), $sql);
            return mysqli_fetch_assoc($cusor);
        }

        function insert($table, $insert_values){
            $value = "";
            $insert_clumns_db = "";
            foreach($insert_values as $column_name => $column_value){
                $insert_clumns_db = $insert_clumns_db."$column_name,";
                $value = $value."'$column_value',";
            }
            $value = substr($value, 0, -1);
            $insert_clumns_db = substr($insert_clumns_db,0, -1);
            $sql = "
                INSERT INTO $table($insert_clumns_db) VALUE($value)
            ";
            return $this -> execute($sql);
        }

        function update($table, $insert_values){
            $value = "";
            foreach($insert_values as $column_name => $column_value){
                $value += "'$column_name'='$column_value";
            }
            $sql = "
                INSERT INTO '$table' VALUE('$value')
            ";
            return $this -> execute($sql);
        }

        function delete($table, $insert_values){
            $value = "";
            foreach($insert_values as $column_name => $column_value){
                $value += "'$column_name'='$column_value";
            }
            $sql = "
                INSERT INTO '$table' VALUE('$value')
            ";
            return $this -> execute($sql);
        }
    }
?>