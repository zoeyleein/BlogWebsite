<!-- 
    Student: JingYi Li, Wei Deng
    File Name: new.php
    Date of creating: Nov 27 2023
    Description: This is for creating a new post.
    Written by: JingYi Li, Wei Deng
-->
<!DOCTYPE html>
<html lang="en">
<head>
  <link rel="stylesheet" media="all" href="blogstyle.css" />
</head>
<body>
  
<?php include 'headerEm.php'; ?>

<div id="content">
  <div class="actions">
    <a class="back-link" href="<?php echo 'index.php'; ?>">< &nbsp&nbspBack to List</a>
  </div>
  <div class="New Blog">
    <h3>Create a new post : </h3>

    <form action='create.php' method="POST">
      <dl>
        <dt>Title</dt>
        <dd><input class="input" type="text" name="title"  /></dd>
      </dl>  
      <dl>
        <dt>Author</dt>
        <dd><input class="input" type="text" name="author" /></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><input class="input" type="text" name="category"  /></dd>
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><textarea class="input" name="content" rows="10" style="width: 350px;" required></textarea></dd>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create a new post" />
      </div>
    </form>

  </div>
  <?php include 'footerEm.php'; ?>

</div>
