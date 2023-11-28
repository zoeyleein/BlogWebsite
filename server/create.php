<!-- 
    Student: JingYi Li, Wei Deng
    File Name: create.php
    Date of creating: Nov 17 2023
    Description: This is for creating a post.
    Written by: Wei Deng
-->
<?php

require_once('db_credentials.php');
require_once('database.php');
include "headerEm.php" ;
$db = db_connect();

  // Handle form values sent by new.php
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
 $title = $_POST['title'] ;
 $author = $_POST['author'] ;
 $category = $_POST['category'] ;
 $content = $_POST['content'];

  $sql = "INSERT INTO shortblogs (title, author, category, content) VALUES ('$title','$author','$category','$content')";
$result = mysqli_query($db, $sql);
    // For INSERT statements, $result is true/false
    
  
  $id = mysqli_insert_id($db);
  //redirect to show page
  header("Location: show.php?id=  $id");
  

} else {
    header("Location:  new.php");
}

?>