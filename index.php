<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Layout</title>
  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    body, html {
      height: 100%;
      font-family: Arial, sans-serif;
    }

    .header, .footer {
      height: 50px;
      background-color: lightblue;
      display: flex;
      justify-content: center;
      align-items: center;
      font-weight: bold;
    }

    .main {
      display: flex;
      height: calc(100vh - 100px); 
    }

    .sidebar {
      width: 10%;
      background-color: lightgray;
      padding: 10px;
    }

    .sidebar ul {
      list-style-type: none;
    }

    .sidebar li {
      margin-bottom: 10px;
    }

    .sidebar a {
      text-decoration: none;
      color: blue;
      font-size: 14px;
    }

    .content {
      width: 90%;
      padding: 10px;
      background-color: white;
      overflow-y: auto;
    }

    @media (max-width: 768px) {
      .main {
        flex-direction: column;
      }

      .sidebar, .content {
        width: 100%;
        height: auto;
      }
    }
  </style>
</head>
<body>

  <div class="header">Student Management System</div>

  <div class="main">
    <div class="sidebar">
      <ul>
        <li><a href="index.php?page=index&section=students">Students</a></li>
        <li><a href="index.php?page=index&section=subjects">Subjects</a></li>
        <li><a href="index.php?page=index&section=hobbies">Hobbies</a></li>
        <li><a href="index.php?page=index&section=grades">Grades</a></li>
      </ul>
    </div>

    <div class="content">
      <?php
        if(!isset($_GET['page'])) {
            $_GET['page'] = 'index';
        }
        if(!isset($_GET['section'])){
            $_GET['section'] = 'students';
        }
        $page = $_GET['page'];
        $section = $_GET['section'];
        $path = './' . $section . '/' . $page . '.php';
        if(file_exists($path)){
            include $path;
        } else {
            echo "<h1>Page not found!</h1>";
        }
      ?>
    </div>
  </div>

  <div class="footer">Yarl IT</div>

</body>
</html>
