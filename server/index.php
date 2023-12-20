<!-- 
    Student: JingYi Li, Wei Deng
    File Name: index.php
    Date of creating: Nov 17 2023
    Description: This is for user to add/edit/delete their posts.
    Written by: JingYi Li, Wei Deng
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="/A02-organized/blogstyle.css" />
  <title>PHP_DB</title>
</head>
<body>
  

<?php

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

    <!-- Filter -->
    <div class="filter">
      <label for="categoryfilter">Filter by Category</label>
      <ul name="categoryfilter">
        <li><a href="filtercategory.php?category='Food'">Food</a></li>
        <li><a href="filtercategory.php?category='Traveling'">Traveling</a></li>
        <li><a href="filtercategory.php?category='Clothing'">Clothing</a></li>
      </ul>

      <label for="authorfilter">Filter by Author</label>
      <ul name="authorfilter">
        <li><a href="filterauthor.php?author='Jaya Lee'">Jaya Lee</a></li>
        <li><a href="filterauthor.php?author='Wei Deng'">Wei Deng</a></li>
        <li><a href="filterauthor.php?author='Anna Wu'">Anna Wu</a></li>
      </ul>
    </div>

  <!-- Actions -->
  <div class="actions">
      <a class="action add-post" href="new.php">Add a new post</a>

          <!-- Search Form -->
    <form action="search2.php" method="GET" class="search-form">
        <label for="search" class="search-label">Search :</label>
        <input type="text" name="search" id="search" class="search-input" placeholder="Enter keywords...">
        <input type="submit" value="Submit" class="search-submit">
    </form>
  </div>

  <table class="list">
  	  <tr>
        <th >ID</th>
        <th >Author</th>
        <th >Title</th>
        <th >Category</th>
  	    <th >Content</th>
        <th >Comment</th>
  	    <th colspan="3">&nbsp;</th>
  	  </tr>

      <?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
        <!-- get the data from $result_set and store it in $results -->
      <tr>
        <td><?php echo $results['id']; ?></td>
        <td><?php echo $results['author']; ?></td>
        <td><?php echo $results['title']; ?></td>
        <td><?php echo $results['category'] ; ?></td>
    	  <td><?php echo $results['content']; ?></td>
        <td><?php echo $results['comment']; ?></td>
        <td colspan="3">
          <a class="action action-display" style="width: 55px;" href="<?php echo "show.php?id=" . $results['id']; ?>">Display</a>
          <a class="action action-edit" style="width: 55px;" href="<?php echo "edit.php?id=" . $results['id']; ?>">Edit</a>
          <a class="action action-remove" style="width: 55px;" href="<?php echo "delete.php?id=" . $results['id']; ?>">Remove</a>
    	</tr>
      <?php } ?>
  </table>

  <?php include("footerEm.php"); ?>

  </div>
</div>
</body>
</html>
