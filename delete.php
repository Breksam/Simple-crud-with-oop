<?php 
    $pageTitle = 'Delete';
    $pageHeading = 'Delete Employee';
    include 'init.php';
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0 ;
    $db->delete('employee', $id);
    header("refresh:1;url= employees.php");
?>



<?php include $temp . 'footer.php';?>
