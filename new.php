<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" media="all" href="blogstyle.css" />
</head>
<body>
  
<?php include 'headerEm.php'; ?>

<div id="content">

  <a class="back-link" href="<?php echo 'index.php'; ?>"> Back to List</a>

  <div class="New Blog">
    <h1>Create New Short Blog</h1>

    <form action='create.php' method="POST">
    
      <dl>
        <dt>Author</dt>
        <dd><input type="text" name="author" /></dd>
      </dl>
      <dl>
        <dt>Category</dt>
        <dd><input type="text" name="category"  /></dd>
          
      </dl>
      <dl>
        <dt>Content</dt>
        <dd><input type="text" name="content"  /></dd>
        </dd>
      </dl>
      <div id="operations">
        <input type="submit" value="Create a new post" />
      </div>
    </form>


  </div>

</div>

<?php include 'footerEm.php'; ?>
