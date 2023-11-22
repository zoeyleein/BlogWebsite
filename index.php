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
      <a class="action" href="new.php">Add a post</a>
      <label for="filtercategory">Category : </label>
      <select name="filtercategory">
        <option value="Food">Food</option>
        <option value="Traveling">Traveling</option>
        <option value="Clothing">Clothing</option>
      </select>
      <input type="submit" value="Submit">
    </div>

  	<table class="list">
  	  <tr>
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Author</th>
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Category</th>
  	    <th style="text-align: center;">Content</th>
  	    <th colspan="3" style="text-align: center;">&nbsp;</th>
  	  </tr>

      <?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
        <!-- get the data from $result_set and store it in $results -->
        <tr>
          <td style="width: 20px; text-align: center;"><?php echo $results['id']; ?></td>
          <td style="width: 20px; text-align: center;"><?php echo $results['author']; ?></td>
          <td style="width: 90px; padding: 10px;"><?php echo $results['title']; ?></td>
          <td style="width: 100px; text-align: center;"><?php echo $results['category'] ; ?></td>
    	    <td style="width: 400px; padding: 10px;"><?php echo $results['content']; ?></td>
          <td colspan="3" style="text-align: center;">
            <a class="action action-display" href="<?php echo "show.php?id=" . $results['id']; ?>">Display</a>
            <a class="action action-edit" href="<?php echo "edit.php?id=" . $results['id']; ?>">Edit</a>
            <a class="action action-remove" href="<?php echo "delete.php?id=" . $results['id']; ?>">Remove</a>
          </td>
    	  </tr>
      <?php } ?>
  	</table>
    <br>
    <br>
  

  <?php include("footerEm.php"); ?>

</body>
</html>
