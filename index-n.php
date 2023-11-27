<!-- 
    Student: JingYi Li, Wei Deng
    File Name: index.php
    Date of creating: Nov 17 2023
    Description: This is for user to add/edit/delete their posts.
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
      <br>
      <br>
      <label for="categoryfilter">Filter by Category</label>
      <ul name="categoryfilter">
        <li><a href="filtercategory.php?category='Food'">Food</a></li>
        <li><a href="filtercategory.php?category='Traveling'">Traveling</a></li>
        <li><a href="filtercategory.php?category='Clothing'">Clothing</a></li>
      </ul>
      <br>
      <br>
      <label for="authorfilter">Filter by Author</label>
      <ul name="authorfilter">
        <li><a href="filterauthor.php?author='Jaya Lee'">Jaya Lee</a></li>
        <li><a href="filterauthor.php?author='Wei Deng'">Wei Deng</a></li>
        <li><a href="filterauthor.php?author='Anna Wu'">Anna Wu</a></li>
      </ul>


      <form action="search2.php" method="GET">
        <lable>Search</lable>
        <input name="search"></input>
        <input type="submit" value="submit"></input>
      </form>
      <!--<form name="filter" method="POST" action=""> -->
        <!--<label for="filtercategory">Category : </label> 
        <select>
          <option value="Food">Food</option>
          <option value="Traveling">Traveling</option>
          <option value="Clothing">Clothing</option>
        </select>
        <input type="submit" name="submit" value="filter category" href="filtercategory.php">
      </form>-->
    </div>

  	<table class="list">
  	  <tr>
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Author</th>
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Category</th>
  	    <th style="text-align: center;">Content</th>
        <th style="text-align: center;">Comment</th>
  	    <th style="text-align: center;">&nbsp</th>
  	    <th style="text-align: center;">&nbsp</th>
        <th style="text-align: center;">&nbsp</th>
  	  </tr>

      <?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
        <!-- get the data from $result_set and store it in $results -->
        <tr>
          <td style="text-align: center;"><?php echo $results['id']; ?></td>
          <td style="text-align: center;"><?php echo $results['author']; ?></td>
          <td style="text-align: center; padding: 10px;"><?php echo $results['title']; ?></td>
          <td style="text-align: center;"><?php echo $results['category'] ; ?></td>
    	    <td style="padding: 10px;"><?php echo $results['content']; ?></td>
          <td style="padding: 10px;"><?php echo $results['comment']; ?></td>
          <td style="text-align: center;"><a class="action" href="<?php echo"show.php?id=" . $results['id']; ?>">Display</a></td>
          <td style="text-align: center;"><a class="action" href="<?php echo "edit.php?id=" . $results['id']; ?>">Edit</a></td>
          <td style="text-align: center;"><a class="action" href="<?php echo "delete.php?id=" . $results['id']; ?>">Remove</a></td>
    	  </tr>
      <?php } ?>

  	</table>
    <br>
    <br>

  </div>
</div>
  

  <?php include("footerEm.php"); ?>

</body>
</html>
