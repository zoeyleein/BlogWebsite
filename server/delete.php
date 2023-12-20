<!-- 
    Student: JingYi Li, Wei Deng
    File Name: delete.php
    Date of creating: Nov 17 2023
    Description: This is for deleting posts.
    Written by: JingYi Li, Wei Deng
-->
<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" media="all" href="/A02-organized/blogstyle.css" />
</head>
<body>
<?php
require_once('db_credentials.php');
require_once('database.php');
include "headerEm.php" ;
$db = db_connect();

if(!isset($_GET['id'])) {
  header("Location:  index.php");
}
$id = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $sql = "DELETE FROM shortblogs WHERE id ='$id'";
    $result = mysqli_query($db, $sql);

  header("Location: index.php");

} 
else 
{
  $sql = "SELECT * FROM shortblogs WHERE id= '$id' ";
    
$result_set = mysqli_query($db, $sql);
    
    $result = mysqli_fetch_assoc($result_set);
    
}

?>

<?php $page_title = 'Delete Page'; ?>


<div id="content">

  <a class="back-link" href="index.php">&laquo; Back to List</a>

  <div class="page delete">
    <h1>Remove Short Blog</h1>
    <p>Are you sure you want to remove this Short Blog?</p>
    <p class="item"><?php echo $result['content']; ?></p>

    <form form action="<?php echo 'delete.php?id=' . $result['id']; ?>"  method="post">
      <div id="operations">
        <input type="submit" name="commit" value="Remove Short Blog" />
      </div>
    </form>
  </div>
  <?php include 'footerEm.php'; ?>
</div>


