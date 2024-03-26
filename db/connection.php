
<?php
       
    class Connection{
        public $server = 'localhost';
        public $user = 'root';
        public $pass = '';
        public $database = 'do_an_cs2';

        function connect(){
            $con = new mysqli($this->server, $this->user,$this-> pass,$this-> database);
            if($con){
                mysqli_query($con, "SET NAMES 'utf8' ");
                // session_start();
                // echo 'Đã kết nối thành công';
                // echo '<br>';
            }else{
                echo 'Kết nối không thành công';
            }
            return $con;
        }
    }
?>