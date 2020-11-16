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
            <div class="chat-area" style="height: 636px;">
                <div class="topics-bar">
                    <h3 style="padding: 5px; padding-left: 15px;">Topics</h3>
                    <?php
                    $sqlby1="select * from topics order by topic_id desc";
                    $statementby1 = $connect->prepare($sqlby1);
                    if($statementby1->execute()){
                      $resultby1 = $statementby1->fetchAll();
                      foreach($resultby1 as $rowby1)
                      {
                      echo '<p style="width: 190px;word-wrap: break-word;
                      text-overflow: ellipsis;" id='.$rowby1['topic_id'].' class="topic">';
                      echo html_entity_decode($rowby1["topic_subject"]).'</p></b>';
                      echo "
                      <script>
                      document.getElementById('".$rowby1['topic_id']."').onclick = function() {
                      var el = document.getElementById('ifplayer2');
                      el.src = 'Post_Com/index.php?id=".$rowby1['topic_id']."';
                    }
                      </script>";
                    }
                    }else {
                      echo 'No topics';
                    }
                     ?>
                </div>
                <div class="chat-view" style="margin-left: 210px;">
                  <iframe id="ifplayer2" width='100%' height='auto' marginwidth='0' marginheight='0' frameborder='0' allowfullscreen='yes' src='Post_Com/index.php?'></iframe>
                  <script>
                     $(document).ready(function () {
                         $('#ifplayer2').on('load', function () {
                             $('#loader1').hide();
                         });
                     });
                 </script>
  <script>
  $(document).ready(function() {
      currentLocation1 = localStorage.prevUrl || 'Post_Com/index.php?';

      $('#ifplayer2').attr('src', currentLocation1);
      $('#ifplayer2').load(function() {
          localStorage.prevUrl = $(this)[0].contentWindow.location.href;
      });
      $("p.topic").click(function(e){
         // A LI is clicked
         // Set all other li's to not selected
         $("p").removeClass("selected");

         // Add selected class to the clicked li
         $(this).addClass("selected");
     });
  });

  var iframe = document.getElementById("ifplayer2");

    // Adjusting the iframe height onload event
    iframe.onload = function(){
        iframe.style.height = iframe.contentWindow.document.body.scrollHeight + 'px';
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
