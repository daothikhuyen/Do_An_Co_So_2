<?php 
    session_start();
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;

    require '../../PHPMailer/src/Exception.php';
    require '../../PHPMailer/src/PHPMailer.php';
    require '../../PHPMailer/src/SMTP.php';
    include '../../model/base.php';
    include '../../model/user.php';

    if(isset($_POST['send'])){
        $email = htmlentities($_POST['email']);


        $user = new User();
        $res = $user->select_query('email',$email);
        $account = mysqli_fetch_array($res);

        if(empty($account)){
            $_SESSION['status'] = 'wraming';
            $_SESSION['status_code']= 'Email does not exist';
    
        }else{
            $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $randstring = '';
            for ($i = 0; $i < 10; $i++) {
                $randstring = $characters[rand(0, strlen($characters))];
            }
            $randPassword = $randstring;

            $title = 'Update Password';
            $message .= "<p>Your new password is: <b>$randstring</b></p>";

            $mail = new PHPMailer(true);
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'khuyendt.22itb@vku.udn.vn';
            $mail->Password = 'lkparfyzyrecimxn';
            $mail->Port = 465; // Sửa port thành 465 vì bạn đang sử dụng SSL
            $mail->SMTPSecure = 'ssl';
            $mail->addAddress('khuyendt.22itb@vku.udn.vn');
            $mail->Subject = "$title";
            $mail->Body = $message;
            $sendMail = $mail->send();

            if($sendMail){
                $hash = password_hash($randPassword,PASSWORD_DEFAULT);

                $sql_update_pass = "UPDATE `user` SET `password`='$hash' WHERE `email`=".$email;
                $res = $user->select_request($sql_update_pass);

                $_SESSION['status'] = 'success';
                $_SESSION['status_code']= 'E-mail sent successfully';
                header('location:login.php');
            }
        }
    }
?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>