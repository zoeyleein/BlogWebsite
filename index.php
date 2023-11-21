<!-- 
    Student: JingYi Li, Wei Deng
    File Name: index.php
    Date of creating: Nov 17 2023
    Description: This is for user to add/edit/delete their posts.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" href="blogstyle.css" />
  <title>PHP_DB</title>
</head>
<body>
  

<?php
// Check if the user is already logged in
// session_start();
// if (!isset($_SESSION['user_id'])) {
//   If not logged in, show the login form
//   include("login_form.php"); // Create a separate file for the login form
//   exit();
// }

include ("headerEm.php");


require_once('db_credentials.php');
require_once('database.php');

$db = db_connect();
?>


<?php 

  $sql = "SELECT * FROM shortblogs ";
  $sql .= "ORDER BY id ASC";
  $result_set = mysqli_query($db,$sql);
  
  ?>

<div id="content">
  <div class="subjects listing">
    <h1>Short Blogs</h1>

    <div class="actions">
      <a class="action" href="new.php">Add a new post</a>
    </div>

  	<table class="list">
  	  <tr>
        <th>ID</th>
        <th>Author</th>
        <th>Topic</th>
        <th>Category</th>
  	    <th>Content</th>
  	    <th>&nbsp</th>
  	    <th>&nbsp</th>
        <th>&nbsp</th>
  	  </tr>

      <?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
        <!-- get the data from $result_set and store it in $results -->
        <tr>
          <td><?php echo $results['id']; ?></td>
          <td><?php echo $results['author']; ?></td>
          <td><?php echo $results['title']; ?></td>
          <td><?php echo $results['category'] ; ?></td>
    	    <td><?php echo $results['content']; ?></td>
          <td><a class="action" href="<?php echo"show.php?id=" . $results['id']; ?>">Display</a></td>
          <td><a class="action" href="<?php echo "edit.php?id=" . $results['id']; ?>">Edit</a></td>
          <td><a class="action" href="<?php echo "delete.php?id=" . $results['id']; ?>">Remove</a></td>
          
    	  </tr>
      <?php } ?>
  	</table>
    <br>
    <br>
  

  <?php include("footerEm.php"); ?>

</body>
</html>
