<?php
if(!isset($_SESSION)) {session_start();}
include 'Post_Com/config.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
   <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Forums</title>
</head>
<body>
    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
                <a href="new_topic.php" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>
                <li class="side-links"><a href="dashboard.php"><i class="fa fa-signal side-nav" aria-hidden="true"></i>Dashboard</a></li>
                <li class="side-links"><a href="profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="forum.php" style="color: #00ffff;"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="chat.php" ><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href="help_center.php"><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
        </div>
        <div class="main" style="width: 83%;">
          <?php include 'top_nav.php'; ?>

            <div class="chat-area">
                <div class="chat-view" style="margin-left: 10px;">
                  <iframe id="new_topics" width='100%' height='1000px' marginwidth='0' marginheight='0' frameborder='0' allowfullscreen='yes' src='Post_Com/new_forum.php?'></iframe>
                  <script>
                     $(document).ready(function () {
                         $('#new_topics').on('load', function () {
                             $('#loader1').hide();
                         });
                     });
                 </script>
  <script>
  $(document).ready(function() {
      new_topics = localStorage.prevUrl || 'Post_Com/new_forum.php?';

      $('#ifplayer2').attr('src', new_topics);
      $('#ifplayer2').load(function() {
          localStorage.new_topics = $(this)[0].contentWindow.location.href;
      });
      $("p.topic").click(function(e){
         // A LI is clicked
         // Set all other li's to not selected
         $("p").removeClass("selected");

         // Add selected class to the clicked li
         $(this).addClass("selected");
     });
  });

  var iframe = document.getElementById("new_topics");

    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 1000'px';
    }


  </script>
  <style>
  .selected{
    color: brown;
    font-weight: bold;
  }
  p.topic:hover{
    background-color: rgba(0, 255, 255, 0.2);
    cursor: pointer;

  }
    #ifplayer2 {
      min-height:1500px;

  }

    body{
      background-color: inherit;
    }
  </style>
            </div>
        </div>
        <?php include 'newpost.php'; ?>
    </div>
</body>
</html>
