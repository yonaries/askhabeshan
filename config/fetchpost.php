<?
session_start();
include ('../config/connect.php');
    $getposts = "SELECT * FROM `user_post` WHERE user_id=8";
    $fetchpost = mysqli_query($conn,$getposts);
        if($fetchpost ->num_rows > 0){
            $row = mysqli_fetch_assoc($fetchpost);
                $_SESSION['post_id'] = $row['post_id'];
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['post_txt'] = $row['post_txt'];
                $_SESSION['post_pic'] = $row['post_pic'];
                $_SESSION['post_audio'] = $row['post_audio'];
                $_SESSION['post_video'] = $row['post_video'];
                $_SESSION['post_time'] = $row['post_time'];
                $_SESSION['catagory_id'] = $row['catagory_id'];
        }
    $getuser = "SELECT * FROM `users` WHERE user_id=8";
    $fetchuser=mysqli_query($conn,$getuser);
        if($fetchuser ->num_rows > 0){
            $row = mysqli_fetch_assoc($fetchuser);
                $_SESSION['user_id'] = $row['user_id'];
                $_SESSION['username'] = $row['Username'];
        }

?>