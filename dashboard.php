<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Josefin+Sans&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Profile</title>
</head>
<body>

    <div class="container">
        <div class="side-nav-bar">
            <ul class="chat-side-nav">
              <a href="#exampleModal-4" data-toggle="modal" data-target="#exampleModal-4" data-whatever="@fat" id="create-user"><li id="create-chat"><i class="fa fa-pencil side-nav" aria-hidden="true" ></i>Create New</li></a>

                <li class="side-links" style="background-color: rgba(0, 255, 255, 0.2);"><a href="dasboard.php" style="color: #00ffff;"><i class="fa fa-signal side-nav" aria-hidden="true"></i>Dashboard</a></li>
                <li class="side-links"><a href="profile.php"><i class="fa fa-user side-nav" aria-hidden="true"></i>Your Profile</a></li>
                <li class="side-links"><a href="forum.php"><i class="fa fa-users side-nav" aria-hidden="true"></i>Forum</a></li>
                <li class="side-links"><a href="chat.php"><i class="fa fa-comments side-nav" aria-hidden="true"></i>Chat</a></li>
                <li class="side-links"><a href=""><i class="fa fa-globe side-nav" aria-hidden="true"></i>Help Center</a></li>
                <li class="side-links cog"><a href=""><i class="fa fa-cog side-nav" aria-hidden="true"></i>Settings</a></li>
                <li class="side-links"><a href="auth/test_auth.php?logout='1"><i class="fa fa-sign-out side-nav" aria-hidden="true"></i>Logout</a></li>
            </ul>
        </div>

        <div class="main" style="width: 83%;">
            <div class="top-nav" style="border-bottom: 1px solid rgba(192, 192, 192, 0.2);">
                    <i class="fa fa-search" aria-hidden="true"></i>
                    <input type="text" placeholder="Search" class="search-bar">
                    <ul class="chat-top-nav">
                        <li class="top-links"><a href="">Home</a></li>
                        <li class="top-links"><a href="">Chats</a></li>
                        <li class="top-links"><a href="">About Us</a></li>
                    </ul>
                    <img src="https://picsum.photos/id/237/75/30" alt="User Profile" class="session-profile">
            </div>
        </div>
    </div>
    <div class="head-dash">
        <h2>Dashboard</h2>
    </div>

        <section class="graph">
            <div class="graph-posts">
                <h3 style="margin-top: 15px;">Total posts</h3>
                    <?php
                    session_start();
                    //$id = $_SESSION['userid'];

                        $link = mysqli_connect("localhost", "root", "", "educo");

                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT * FROM topics WHERE topic_by = 1";
                        $result = mysqli_query($link, $sql);
                        $row_Count = mysqli_num_rows($result);

                        if($row_Count > 0){
                            echo $row_Count;
                        }else{
                            //echo 0;
                            echo "<div id='postsCount'>0</div>";
                        }
                    ?>
                
            </div>
            <div class="graph-reply">
                <h3 style="margin-top: 15px;">Total replies</h3>
                    <?php
                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT * FROM replies WHERE reply_by = 1";
                        $result = mysqli_query($link, $sql);
                        $row_Count = mysqli_num_rows($result);

                        if($row_Count > 0){
                            echo $row_Count;
                        }else{
                            echo "<div id='replyCount'>0</div>";
                        }
                    ?>
                
            </div>
            
                <h3 id="cont">Contributions</h3>
                <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
                <script>
                    google.charts.load('current', {
  packages: ['corechart', 'line']
});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
  var data = new google.visualization.DataTable();
  data.addColumn('number', 'X');
  data.addColumn('number', 'Dogs');

  data.addRows([
    [1, 1],
    [2, 20]
       
  ]);

  var options = {
  scales: {
    xAxes: [
      {
        type: "time",
        time: {
          displayFormats: {
            hour: "MMM DD"
          },
          tooltipFormat: "MMM D"
        }
      }
    ],
    yAxes: [
      {
        ticks: {
          beginAtZero: true
        }
      }
    ]
  }
};

  /*var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Contributions'
    },
    backgroundColor: '#f1f8e9'
  };*/

  var chart = new google.visualization.LineChart(document.getElementById('graph-graph'));
  chart.draw(data, options);
}

                </script>
                <div id="graph-graph" style="width: 600px; height: 300px"></div>
        </section>  

        <section class="posts">
            <div class="posts-recent">
                <h3>Recent Posts</h3>
                <?php
                        if(!$link){
                            die("Could not connect: ".mysqli_error());
                        }

                        $sql = "SELECT topic_subject FROM topics WHERE topic_by = 1";
                        $result = mysqli_query($link, $sql);

                        function getData($result){
                            $rows = array();

                            if(mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $rows[] = $row;
                                }
                                return $rows;
                            }
                        }
                        $res = getData($result);

                        if($res > 0){
                            foreach ($res as $key => $value) {
                                echo $vaue['topic_subject'];
                            }
                        }else{
                            echo "<div id='noPosts'>No recent posts</div>";
                        }
                    ?>
            </div>
            <div class="posts-calendar">
                <p id="monthName"></p>
                <p id="dayName"></p>
                <p id="dayNumber"></p>
                <p id="year"></p>
            </div>
            <script>
                const lang = navigator.language;
                let date = new Date();
                let dayNumber = date.getDate();
                let month = date.getMonth();
                let dayName = date.toLocaleString(lang, {weekday: 'long'});
                let monthName = date.toLocaleString(lang, {month: 'long'})
                let year = date.getFullYear();

                document.getElementById('monthName').innerHTML = monthName;
                document.getElementById('dayName').innerHTML = dayName;
                document.getElementById('dayNumber').innerHTML = dayNumber;
                document.getElementById('year').innerHTML = year;

            </script>     
        </section> 
</body>
</html>