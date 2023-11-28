<!-- 
    Student: JingYi Li, Wei Deng
    File Name: show.php
    Date of creating: Nov 17 2023
    Description: This is for displaying posts.
    Written by: JingYi Li, Wei Deng
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css" />
  <script src="comment.js" defer></script>
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
  <div class="actions">
    <a class="back-link"  href="index.php"> Back to List</a>
  </div>

<div class="page show">

  <!-- the content of displaying -->
  <div class="attributes">
    <dl>  
      <dt>Title</dt>
      <dd><?php echo $result['title']; ?></dd>
    </dl>

    <dl>
      <dt>Author</dt>
      <dd><?php echo $result['author']; ?></dd>
    </dl>

    <dl>
      <dt>Category</dt>
      <dd><?php echo $result['category']; ?></dd>
    </dl>
  
    <div>    
      <P><?php echo $result['content']; ?></P>
    </div>

    <div>  
    <dt>Comment</dt> 
    <P><?php echo $result['comment']; ?></P> 
  </div>

</div>

  <?php include 'footerEm.php'; ?>

</body>
</html>
