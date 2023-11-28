<!-- 
    Student: JingYi Li, Wei Deng
    File Name: filterauthor.php
    Date of creating: Nov 27 2023
    Description: This is for author filter.
    Written by: Wei Deng
-->
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
if(isset($_GET['author'])){
    $author = $_GET['author'];
    $sql = "SELECT * FROM shortblogs WHERE author= $author";
    $result_set = mysqli_query($db, $sql);
}
else{
    //$category = $_GET['category'];
    $sql = "SELECT * FROM shortblogs";
    $result_set = mysqli_query($db, $sql);
}
?>

<div id="content">
<p style="font-size: 20px; font-weight: margin-bottom: 20px; color: gray;">Result :</p>

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
</body>
</html>
