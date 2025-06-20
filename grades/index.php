<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Grades List</title>
  <style>
    table {
      width: 100%;
      border-collapse: collapse;
      min-width: 600px;
    }
    th, td {
      padding: 8px;
      border: 1px solid #333;
      text-align: center;
    }
    th {
      background-color: #f2f2f2;
    }
    a {
      text-decoration: none;
      color: blue;
    }
    .create-link {
      margin: 10px 0;
      display: inline-block;
      padding: 8px 12px;
      background: #007BFF;
      color: white;
      border-radius: 4px;
    }
    .create-link:hover {
      background: #0056b3;
    }
  </style>
</head>
<body>

<?php
  $connection = mysqli_connect("localhost", "root", "root", "crudsystem");
  if (!$connection) {
      die("Connection failed: " . mysqli_connect_error());
  }

  $sql = "SELECT id , grade
          FROM grades ";

  $result = mysqli_query($connection, $sql);
  if (!$result) {
      die("Query failed: " . mysqli_error($connection));
  }

  $grades = mysqli_fetch_all($result, MYSQLI_ASSOC);
  mysqli_close($connection);
?>

<a href="index.php?page=create&section=grades" class="create-link">Create Grade</a>

<div style="overflow-x: auto;">
  <table>
    <tr>
      <th>Grade ID</th>
      <th>Grade</th>
      <th colspan="2">Actions</th>
    </tr>
    <?php if (count($grades) > 0): ?>
      <?php foreach ($grades as $g): ?>
        <tr>
          <td><?php echo $g['id']; ?></td>
          <td><?php echo $g['grade']; ?></td>
          <td><a href="index.php?page=delete&section=grades&id=<?php echo $g['id']; ?>" onclick="return confirm('Do you want to delete?')">Delete</a></td>
        </tr>
      <?php endforeach; ?>
    <?php else: ?>
      <tr>
        <td colspan="5">No grade records found.</td>
      </tr>
    <?php endif; ?>
  </table>
</div>

</body>
</html>
