<?php if(!isset($_SESSION)) {session_start();}
if(isset($_SESSION['user_id'])) {} else{
  $_SESSION['msg']="Session Expired! Please login";
  echo '<a id="link" target="_parent" href="../auth/login.php"></a>

<script type="text/javascript">
    document.getElementById("link").click();
</script>';}
include "Post_Com/config.php";?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Dashboard</title>
</head>
<body>
<
    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
              <a href="#exampleModal-4" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="dashboard.php" style="color: #00ffff;"><i class="fa fa-signal side-nav" aria-hidden="true"></i>Dashboard</a></li>
                <li class="side-links"><a href="profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links"><a href="forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
        </div>

        <div class="main" style="width: 83%;">
          <?php include 'top_nav.php'; ?>
        </div>
    </div>

    <h3 style="margin-left: 16rem; margin-top: -39rem;"><a href="admin_dashboard.php">Back</a></h3>

    <?php
    include_once 'auth/db_connect.php';
    $link = connect();

    $name = $_GET['name'];
    switch ($name) {
        case 'users':
            echo "Displaying names";

            $query = "SELECT * FROM users";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>User ID</th>
                        <th>Full Name</th>
                        <th>User Name</th>
                        <th>User Email</th>
                        <th>User About</th>
                        <th>Date Created</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['user_id']?></td>
                                <td><?php echo $value['full_name']?></td>
                                <td><?php echo $value['user_name']?></td>
                                <td><?php echo $value['user_email']?></td>
                                <td><?php echo $value['user_about']?></td>
                                <td><div style="width: 10rem;"><?php echo $value['date_created']?></div></td>
                            </tr>
                        <?php 
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'issues':
            echo "Displaying issues";

            $query = "SELECT * FROM issues ORDER BY issue_date DESC";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>Issue ID</th>
                        <th>Issue Name</th>
                        <th>Issue Description</th>
                        <th>Issue Date</th>
                        <th>Status</th>
                        <th>Update</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['issue_id']?></td>
                                <td><?php echo $value['issue_name']?></td>
                                <td><?php echo $value['issue_desc']?></td>
                                <td><div style="width: 7rem;"><?php echo $value['issue_date']?></div></td>
                                <td><?php echo $value['status']?></td>
                                <td><a href="auth/server_auth.php?id=<?php echo $value['issue_id']?>">Update</a></td>
                            </tr>
                        <?php 
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'posts':
            echo "Displaying posts";

            $query = "SELECT * FROM topics";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>Topic ID</th>
                        <th>Topic Subject</th>
                        <th>Topic Date</th>
                        <th>Topic Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['topic_id']?></td>
                                <td><?php echo $value['topic_subject']?></td>
                                <td><div style="width: 10rem;"><?php echo $value['topic_date']?></div></td>
                                <td><?php echo $value['topic_description']?></td>
                            </tr>
                        <?php 
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;
        
        case 'reply':
            echo "Displaying replies";

            $query = "SELECT * FROM replies";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>Topic ID</th>
                        <th>Topic Subject</th>
                        <th>Topic Date</th>
                        <th>Topic Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['topic_id']?></td>
                                <td><?php echo $value['topic_subject']?></td>
                                <td><?php echo $value['topic_date']?></td>
                                <td><?php echo $value['topic_description']?></td>
                            </tr>
                        <?php 
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'comments':
            echo "Displaying comments";

            $query = "SELECT comments.comment_id, comments.comment_message, comments.comment_date, topics.topic_subject FROM comments INNER JOIN topics ON topics.topic_id = comments.comment_topic";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>Comment ID</th>
                        <th>Topic Subject</th>
                        <th>Comment Message</th>
                        <th>Comment Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['comment_id']?></td>
                                <td><?php echo $value['topic_subject']?></td>
                                <td><?php echo $value['comment_message']?></td>
                                <td><?php echo $value['comment_date']?></td>
                            </tr>
                        <?php 
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        case 'categories':
            echo "Displaying categories";

            $query = "SELECT * FROM categories";
            $result = mysqli_query($link, $query);
            $res = getData($result);

            ?>
            <div class="users">
            <table>
                <thead>
                    <tr>
                        <th>Category ID</th>
                        <th>Category Name</th>
                        <th>Category Description</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        foreach ($res as $key => $value) {?>
                            <tr>
                                <td><?php echo $value['category_id']?></td>
                                <td><?php echo $value['category_name']?></td>
                                <td><?php echo $value['category_description']?></td>
                            </tr>
                        <?php 
                        }

                    ?>
                </tbody>
            </table>
        </div>
        <?php
            break;

        default:
            # code...
            break;
    }


    ?>
</body>
</html>
