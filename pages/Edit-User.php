<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit-page.css">
    <title>Edit User</title>
</head>
<body>
    <a id="home-button" class="home-button" href="Dashboard.php?id=users">Back</a>
    <?php
        include '../backend/mappers/userMapper.php';
        session_start();
        if($_SESSION['role']=='0'){
            header("Location:../index.php");
        }
        else{
            if (isset($_GET['id'])) {
                $userId = $_GET['id'];
                
                $mapper = new UserMapper();
                $user = $mapper->getUserbyID($userId);

                if(isset($_POST['edit-btn'])){
                    $userId = $_POST['edit-ID'];
                    $fullname = $_POST['edit-fullname'];
                    $userEmail = $_POST['edit-email'];

                    $mapper->edit($userId, $fullname, $userEmail);
                    header("Location:../pages/dashboard.php");
                }
            
            
            echo '
                <form id="register" class="formRegister" method = "POST">  
                <h2>Update Data</h2>
                <input type="hidden"  class="input-field" name = "edit-ID" placeholder="User ID" value="'.$user['usr_ID'].'"/>
                <input type="text"  class="input-field" name = "edit-fullname" placeholder="Full Name" value="'.$user['usr_fullname'].'"/>
                <input type="text"  class="input-field" name = "edit-email" placeholder="Email"  value="'.$user['usr_email'].'"/>
                <input type="text"  class="input-field" name = "edit-role" placeholder="Role"  value="'.$user['usr_role'].'"/>
            
            
                <button type="submit" class="input-submit" name = "edit-btn" onclick="goToEditUser()">Update</button>
                </form>
            ';

            }
        }
    ?>

</body>
</html>