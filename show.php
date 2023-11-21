<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="style.css" />
</head>
<body>
  

<?php
require_once('db_credentials.php');
require_once('database.php');
include "headerEm.php" ;
$db = db_connect();
//access URL parameter
$id = $_GET['id'] ;


$sql = "SELECT * FROM shortblogs WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
$result = mysqli_fetch_assoc($result_set);

?>

<div id="content">

<a class="back-link"  href="index.php"> Back to List</a>

  <div class="page show">

  <h1> <?php echo $result['author']; ?></h1>

<div class="attributes">
  <dl>
    <dt>Author</dt>
    <dd><?php echo $result['author']; ?></dd>
  </dl>
      <dl>
        <dt>Category</dt>
        <dd><?php echo $result['category']; ?></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><?php echo $result['content']; ?></dd>
      </dl>
      <dl>
        
    </div>


  </div>

</div>

<?php include 'footerEm.php'; ?>
</body>
</html>
