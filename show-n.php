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

  <h1> <?php //echo $result['author']; ?></h1>

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
    <P><?php echo $result['comment']; ?></P> 
  </div>

</div>

<?php include 'footerEm.php'; ?>

</body>
</html>
