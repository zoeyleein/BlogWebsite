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
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $sql = "SELECT * FROM shortblogs WHERE author LIKE '%$search%' or title LIKE '%$search%' or category LIKE '%$search%' or content LIKE '%$search%'";
    $result_set = mysqli_query($db, $sql);
}
else{
    //$category = $_GET['category'];
    $sql = "SELECT * FROM shortblogs";
    $result_set = mysqli_query($db, $sql);
}
?>

<table class="list">
    <tr>
        <th style="text-align: center;">ID</th>
        <th style="text-align: center;">Author</th>
        <th style="text-align: center;">Title</th>
        <th style="text-align: center;">Category</th>
        <th style="text-align: center;">Content</th>
        <th style="text-align: center;">&nbsp</th>
        <th style="text-align: center;">&nbsp</th>
        <th style="text-align: center;">&nbsp</th>
    </tr>

<?php while($results = mysqli_fetch_assoc($result_set)) { ?> 
        <!-- get the data from $result_set and store it in $results -->
    <tr>
        <td style="width: 20px; text-align: center;"><?php echo $results['id']; ?></td>
        <td style="width: 20px; text-align: center;"><?php echo $results['author']; ?></td>
        <td style="width: 20px; text-align: center; padding: 10px;"><?php echo $results['title']; ?></td>
        <td style="width: 100px; text-align: center;"><?php echo $results['category'] ; ?></td>
        <td style="width: 400px; padding: 10px;"><?php echo $results['content']; ?></td>
        <td style="text-align: center;"><a class="action" href="<?php echo"show.php?id=" . $results['id']; ?>">Display</a></td>
        <td style="text-align: center;"><a class="action" href="<?php echo "edit.php?id=" . $results['id']; ?>">Edit</a></td>
        <td style="text-align: center;"><a class="action" href="<?php echo "delete.php?id=" . $results['id']; ?>">Remove</a></td>
    </tr>
<?php } ?>
        

<?php include 'footerEm.php'; ?>
</body>
</html>