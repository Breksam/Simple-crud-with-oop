<?php 
    $pageTitle = 'Employees';
    $pageHeading = 'All Employees';
    include 'init.php';
?>
    <?php if(count($db->retrive("employee")) > 0):?>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-bordered text-center ">
                <tr>
                    <td>#ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Department</td>
                    <td>Control</td>
                </tr>
                <?php foreach($db->retrive("employee") as $employee): ?>
                    <tr>
                        <td><?php echo $employee['id']?> </td>
                        <td><?php echo $employee['name']?></td>
                        <td><?php echo $employee['email']?></td>
                        <td><?php echo $employee['department']?></td>
                        <td>
                            <a href='edit.php?id=<?php echo $employee['id']?>' class='btn btn-success'><i class='fa fa-edit'></i> Edit</a>
                            <a href='delete.php?id=<?php echo $employee['id']?>' class='btn btn-danger confirm'><i class='fa fa-close'></i> Delete </a>
                        </td>
                    </tr>
                <?php endforeach ?>
            </table>
        </div>
        <a href="add.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> New Employee
        </a>
    </div>
    <?php else:?>
        <div class="container">
            <p class="alert alert-danger">No Employees To Show</p>
        <a href="add.php" class="btn btn-primary">
            <i class="fa fa-plus"></i> New Employee
        </a>
    </div>
    <?php endif;?>

<?php include $temp . 'footer.php';?>
