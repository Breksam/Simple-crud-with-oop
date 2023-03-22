<?php 
    $pageTitle = 'Add';
    $pageHeading = 'Add Employee';
    include 'init.php';
    $id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0 ;
    $rows = $db->find('employee', $id);

    foreach($rows as $row){
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $errorMsg = "";
        $successMsg = "";
        $departments = array('it','cs','back-end');
        $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
        $department = filter_var($_POST['department'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
        $password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

        // validation form
        if(!empty($name) && !empty($email) && !empty($department)){
            if(strlen($name) > 5){
                $department = strtolower($department);
                if(in_array($department, $departments)){
                    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
                        if(!empty($password)){
                            if(strlen($password) > 6){
                                $password = $db->encPassword($password);
                                if($password !== $row['password']){
                                    
                                }else{
                                    $errorMsg = "please change your password!";
                                }
                        }else{
                            $errorMsg = "Password must be greater than 6 charcter !";
                        }
                    }else {
                        $password = $row['password'];
                    }
                            $sql = "UPDATE employee SET name=?, email=?, department=?, password=? WHERE id=?";
                            $values = array($name, $email, $department, $password ,$id);
                            $db->putData($sql, $values);
                    }else{
                            $errorMsg = 'Email is invalid !';
                        }
                    }else{
                        $errorMsg = 'Department is invalid !';
                    }
                }else{
                    $errorMsg = 'Your name must be greater than 5 Charcter !';
                }
            }else{
                $errorMsg = 'All fields must fill !';
            }
    }
?>


    <div class="container">
        <div class="col-sm-12">
        <?php
            if(!empty($errorMsg)):?>
            <h2 class="p-3 col text-center mt-5 alert alert-danger"><?php echo $errorMsg;?></h2>
        <?php endif;?>
        <?php
            if(!empty($successMsg)):?>
            <h2 class="p-3 col text-center mt-5 alert alert-success"><?php echo $successMsg;?></h2>
        <?php endif;?>
        </div>
        <form class="form-horizontal" action="<?php $_SERVER['PHP_SELF']?>" method="POST">
            <!-- Start name Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Name</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="name" value="<?php echo $row['name']?>" class="form-control" autocomplete="off"/>
                </div>
            </div>
            <!-- End name Field -->
                <!-- Start Department Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Department</label>
                <div class="col-sm-10 col-md-6">
                    <input type="text" name="department" value="<?php echo $row['department']?>" class="form-control"  />
                </div>
            </div>
            <!-- End Department Field -->
            <!-- Start Email Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Email</label>
                <div class="col-sm-10 col-md-6">
                    <input type="email" name="email" value="<?php echo $row['email']?>" class="form-control"  />
                </div>
            </div>
            <!-- End Email Field -->
            <!-- Start Password Field -->
            <div class="form-group form-group-lg">
                <label class="col-sm-2 control-label">Password</label>
                <div class="col-sm-10 col-md-6">
                    <input type="password" name="password" class="password form-control"  autocomplete="new-password" />
                </div>
            </div>
            <!-- End Password Field -->
            <!-- Start Submit Field -->
            <div class="form-group form-group-lg">
                <div class="col-sm-offset-2 col-sm-10">
                    <input type="submit" name="submit" value="Add Employee" class="btn btn-primary btn-lg" />
                </div>
            </div>
            <!-- End Submit Field -->
        </form>
        <?php }?>
    </div>

<?php include $temp . 'footer.php';?>