<?php
    if(isset($_POST['logout'])){
        header('location:login.php');
    }// Logs out when user click log out.
    if(isset($_POST['catagory'])){
        header('location:category.php');
    }// redirect to category
    if(isset($_POST['posttext']) && isset($_POST['ask'])){
        $posttext=$_POST['posttext'];
        $userid=$_SESSION['currentuser_id'];
        // $postimage=$_POST['postimage'];
        // $postaudio=$_POST['postaudio'];
        // $postvideo=$_POST['postvideo'];
        $posttime=date("Y-m-d h:i:a");
        $postcategory=$_POST['postcategory'];
    
        $postq="INSERT INTO `user_post` SET post_txt='$posttext',
                                            user_id='$userid',
                                            post_time='$posttime',
                                            category_id=$postcategory";  
        $excute = mysqli_query($conn,$postq); 
        header("refresh:0");
        
    }// This condition posts a user question to database
?>