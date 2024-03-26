
<?php 

    include '../db/connection.php';

    $connection = new Connection();
    $conn = $connection->connect();

    $userDataJSON = isset($_COOKIE["user_data"])?$userDataJSON = $_COOKIE["user_data"]:'';
    $userData = json_decode($userDataJSON, true);


    if(isset($_GET['like_dislike'])){

        function getRating($comment_id){

            global $conn;
            $rating = array();

            $sql_like = "SELECT COUNT(*) FROM `rating_info` WHERE `comment_id` = $comment_id AND `rating_action` = 'like'";
            $sql_dislike = "SELECT COUNT(*) FROM `rating_info` WHERE `comment_id` = $comment_id AND `rating_action` = 'dislike'";

            $request_like = mysqli_query($conn,$sql_like);
            $request_dislike = mysqli_query($conn,$sql_dislike);

            $likes = mysqli_fetch_array($request_like);
            $dislike = mysqli_fetch_array($request_dislike);

            $rating = [
                'likes' => $likes[0],
                'dislikes' => $dislike[0]
            ];

            echo json_encode($rating);
        }

        if($_POST['action']){
            $action = $_POST['action'];
            $comment_id = $_POST['comment_id'];

            switch ($action) {
                case 'like':
                    $sql = "INSERT INTO `rating_info`(`comment_id`, `user_id`, `rating_action`) 
                                            VALUES ('$comment_id','".$userData['id']."','like')
                                            ON DUPLICATE KEY UPDATE `rating_action` = 'like' ";
                    break;
                case 'dislike':
                    $sql = "INSERT INTO `rating_info`(`comment_id`, `user_id`, `rating_action`) 
                                            VALUES ('$comment_id','".$userData['id']."','dislike')
                                            ON DUPLICATE KEY UPDATE `rating_action` = 'dislike'";
                    break;
                case 'unlike':
                    $sql = "DELETE FROM `rating_info`WHERE `user_id` = '".$userData['id']."' AND  `comment_id` = '$comment_id'";
                    break;
                case 'undislike':
                    $sql = "DELETE FROM `rating_info`WHERE `user_id` = '".$userData['id']."' AND  `comment_id` = '$comment_id'";
                    break;
                default:
                    break;
            }

            mysqli_query($conn,$sql);
            echo getRating($comment_id);
            exit(0);
        }
    }
?>