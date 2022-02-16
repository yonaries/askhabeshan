<?php
    include ('../config/connect.php');
    include ('../config/header.php');
    $catid=$_GET['id'];
    $getposts = "SELECT * FROM `user_post` WHERE category_id='$catid' ORDER BY post_id DESC";
    $fetchpost = mysqli_query($conn,$getposts);

    $getcategory = "SELECT * FROM `category`";
    $fetchcategory=mysqli_query($conn,$getcategory); 

                    
?>
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

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>ASK HABESHAN</title>
    <link rel="stylesheet" href="../css/home.css" />
</head>

<body>
    <nav>
        <div class="nav-left">
            <img src="../assets/illustrations/logo.jpg" alt="logo" class="logo" />
            <a href="../pages/Home.php">ASK<span>HABESHAN</span>
            </a>

        </div>

        <div class="nav-right">

            <div class="search-box">
                <img src="../assets/icons/search 2.png" alt="" />
                <input type="text" placeholder="Search" />
            </div>
            <div class="ask-btn" onclick="writePostToggle()">
                <a href="#">Ask Question</a>
            </div>
            <ul>
                <li>
                    <a href="#"><img src="../assets/icons/notification.png" alt="notification" /></a>
                </li>
            </ul>
            <div class="nav-user online" onclick="settingMenuToggle()">
                <img src="../assets/icons/user.png" alt="" />
            </div>
        </div>

        <!----------------------ask button on navbar click-------------->

        <div class="write-post-container">
            <div class="user-profile">
                <img src="../assets/icons/user.png" />
                <div>
                    <p><?php echo $_SESSION['user'];?></p>
                    <small></small>
                </div>
            </div>
            <div class="post-input-container">
                <form method="post" autocomplete="off">
                    <textarea name="posttext" id="" rows="3" placeholder="What do you ask today?"></textarea>
                    <div class="attachemet-links">
                        <a href="#"><img src="../assets/icons/photo.png" alt="" />Photo / Video</a>
                        <select name="postcategory" id="cat">
                            <option value="2">Cultural</option>
                            <option value="23">Technology</option>
                        </select>
                        <div class="publish-cta">
                            <button type="submit" name="ask">ASK</button>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
        <!----------------------settings menu on navbar profile click-------------->

        <div class="settings-menu">
            <div id="dark-btn" class="dark-btn-on" onclick="darkbtnon()">

                <span><img src="../assets/icons/display.png" alt=""></span>
            </div>
            <div class="inner-setting-menu">
                <div class="user-profile">
                    <img src="../assets/icons/user.png" />
                    <div>
                        <p style="font-size: 20px;"><?php echo $_SESSION['user'];?></p>
                        <a href="#">Edit profile</a>
                    </div>
                </div>
                <hr>
                <div class="settings-link">

                    <div>
                        <a href="#"><img src="../assets/icons/feedback.png" class="settings-icons" />Feedback</a>
                        <p>Help us on improving</p>

                    </div>
                </div>
                <hr>
                <div class="settings-link">
                    <div>
                        <a href="#"><img src="../assets/icons/help.png" class="settings-icons" />Privacy and Policy</a>
                        <p>Read Our Privacy and Policy</p>
                    </div>
                </div>
                <hr>
                <div class="settings-link">
                    <div>                        
                        <a href="login.php"><img src="../assets/icons/logout.png" class="settings-icons" />Logout</a>
                        <p></p>
                    </div>
                </div>

            </div>

        </div>
    </nav>

    <div class="container">
        <!----------catagory-bar-------->
        <div class="left-side">
            <div class="catagory">
                <p>Catagories</p>
                <?php
                for($i=0;$i<$fetchcategory ->num_rows;$i++){
                    if($fetchcategory->num_rows>0){
                        $row= mysqli_fetch_assoc(($fetchcategory));
                        $_SESSION['category_id']=$row['category_id'];
                        $_SESSION['category']=$row['category_name'];
                    }
                    
                    ?>
                    <a href="../pages/category.php?id=<?php echo $_SESSION['category_id']?>"><img src="../assets/icons/arrow.png" alt="" /><?php echo $_SESSION['category'] ?></a>
                <?php }?>
            </div>
            <div class="shortcut">
                <p>Spaces</p>
                <a href="#"><img src="../assets/images/shortcut-1.png" alt="" /> App Developers
                </a>
                <a href="#"><img src="../assets/images/shortcut-2.png" alt="" />Make Money Online</a>
                <a href="#"><img src="../assets/images/shortcut-3.png" alt="" /> Movie fans</a>
                <a href="#"><img src="../assets/images/shortcut-4.png" alt="" /> Web Experts</a>
            </div>
        </div>
        <!----------post-bar-------->
        <div class="main-content">
            <?php
                $getcat = "SELECT * FROM `category` where category_id='$catid'";
                $fetchcat=mysqli_query($conn,$getcat); 
                if($fetchcat->num_rows>0){
                        $row= mysqli_fetch_assoc(($fetchcat));
                        $_SESSION['category_id']=$row['category_id'];
                        $_SESSION['category']=$row['category_name'];
                        $_SESSION['category_descript']=$row['category_descript'];
                    }
            ?>        
            <div class="posts-container">
                <div class="catagory-title">
                    <h3>
                        <?php echo $_SESSION['category'];?>
                    </h3>
                </div>
                <div class="ans-counter">

                    <p></p>
                </div>

                <div class="catagory-disc">
                    <p><?php echo $_SESSION['category_descript']; ?></p>
                </div>
            </div>
            <?php
              if($fetchpost ->num_rows > 0){
                for($i=0;$i<$fetchpost ->num_rows;$i++){
                    if($fetchpost ->num_rows > 0){
                        $row = mysqli_fetch_assoc($fetchpost);
                            $_SESSION['post_id'] = $row['post_id'];
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['post_txt'] = $row['post_txt'];
                            $_SESSION['post_pic'] = $row['post_pic'];
                            $_SESSION['post_audio'] = $row['post_audio'];
                            $_SESSION['post_video'] = $row['post_video'];
                            $_SESSION['post_time'] = $row['post_time'];
                            $_SESSION['category_id'] = $row['category_id'];
                    }
                    $idpost=$_SESSION['user_id'];
                    $getuser = "SELECT * FROM `users` where user_id='$idpost'";  
                    $fetchuser=mysqli_query($conn,$getuser);
                    if($fetchuser ->num_rows > 0){
                        $row = mysqli_fetch_assoc($fetchuser);
                            $_SESSION['user_id'] = $row['user_id'];
                            $_SESSION['username'] = $row['Username'];
                    }
                    $catid=$_SESSION['category_id'];
                    $getcat = "SELECT * FROM `category` where category_id='$catid'";
                    $fetchcat=mysqli_query($conn,$getcat); 
                    if($fetchcat->num_rows>0){
                        $row= mysqli_fetch_assoc(($fetchcat));
                        $_SESSION['category_id']=$row['category_id'];
                        $_SESSION['category_name']=$row['category_name'];
                    }            
            ?>
                <div class="posts-container">
                    <div class="user-profile">
                        <img src="../assets/icons/user.png" />
                        <div class="user-in">
                            <p><?php
                                echo $_SESSION['username'];
                            ?></p>
                            <small>Asked on <span id="posttime"><?php
                                echo $_SESSION['post_time'];
                            ?></span></small>
                        </div>
                        <div class="ans-counter">
                            <img src="../assets/images/message.png" alt="">
                            <p>108 Answers, 22 Replies</p>
                        </div>
                    </div>
                    <div class="post-content">
                        <div class="post-text">
                            <?php
                                echo $_SESSION['post_txt'];
                            ?>
                            <br>
                            <a href="../pages/category.php?id=<?php echo $_SESSION['category_id']?>">#<?php echo $_SESSION['category_name'] ?></p>

                            <div class="post-row">
                                <button type="button" class="browse-cta">
                                    <a href="../pages/answers.php?id=<?php echo $_SESSION['post_id']?>">SEE ANSWERS</a>
                                </button>
                
                                <form method="post">
                                    <div class="answer-row">
                                    <textarea name="postanswers" id="comment" rows="2" placeholder="Your answer here."></textarea>
                                    <button type="submit" class="answer-cta" name="answer-cta">
                                        <p>ANSWER</p>
                                    </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php           
                    if(isset($_POST['postanswers']) && isset($_POST['answer-cta'])){
                        $postanswer=$_POST['postanswers'];
                        $userid=$_SESSION['currentuser_id'];
                        $postid=$_SESSION['post_id'];
                        // $postimage=$_POST['postimage'];
                        // $postaudio=$_POST['postaudio'];
                        // $postvideo=$_POST['postvideo'];
                        $posttime=date("Y-m-d h:i:a");
                        // $postcategory=$_POST['postcategory'];
                    
                        $answersql="INSERT INTO `user_post_answers` SET answer='$postanswer',
                                                            user_id='$userid',
                                                            post_id='$postid',
                                                            date='$posttime'"; 
                        $publish = mysqli_query($conn,$answersql);    
                    }// This condition inserts user answer to a post from the homepage to database
                }
            }
                 else { ?><div class="no-post"><h2><?php echo "No Questions,<br> Be the first to Ask.";?></h2></div><?php }
                ?>
            <button type="button" class="browse-more-btn">Browse More</button>
        </div>
        <!----------right-bar-------->
        <div class="right-side">
            <div class="sidebar-title">
                <h4>Community Events</h4>
                <a href="#">See All</a>
            </div>
            <div class="events">
                <div class="left-events">
                    <h3>14</h3>
                    <span>December</span>
                </div>
                <div class="right-events">
                    <h4>Free Talk</h4>
                    <p>Blues Cafe</p>
                    <a href="#">More Info</a>
                </div>
            </div>
            <div class="events">
                <div class="left-events">
                    <h3>21</h3>
                    <span>December</span>
                </div>
                <div class="right-events">
                    <h4>Chrismass week</h4>
                    <p>Entoto Park</p>
                    <a href="#">More Info</a>
                </div>
            </div>

            <div class="events">
                <div class="left-events">
                    <h3>02</h3>
                    <span>January</span>
                </div>
                <div class="right-events">
                    <h4>Food Festival</h4>
                    <p>Mechare Meda</p>
                    <a href="#">More Info</a>
                </div>
            </div>
            <div class="sidebar-title">
                <h4>Advertisment</h4>
            </div>
            <img src="../assets/images/bg1.jpg" class="side-ads" />
            <img src="../assets/images/advertisement.png" class="side-ads" />
        </div>
    </div>
    <footer>
        <div class="foot-nav">
            <a href="#">About &nbsp;|&nbsp;</a>
            <a href="#">Contacts &nbsp;|&nbsp;</a>
            <a href="#">Terms of Use &nbsp;|&nbsp; </a>
            <a href="#">Privacy Policy </a>
        </div>
        <br>
        <div class="developer">
            <p>Developed by <span>Yonatan &copy;</span> 2021</p>
        </div>
    </footer>
    <script src="../js/script.js"></script>
</body>

</html>