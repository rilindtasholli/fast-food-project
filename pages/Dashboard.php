<?php
include_once '../backend/userMapper.php';

session_start();

if (isset($_SESSION["role"]) && $_SESSION['role'] == '1') {
    $mapper =  new UserMapper();
    $userList = $mapper->getAllUsers();
} else {
    header("Location:../index.php");
}


?>
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> &copy; Star-Food | Order Food Online </title>
        <link rel="stylesheet" href="css/style.css"/>
    </head>

<div>
    <h1>This is Dashboard page</h1>
    <div>
        <h2>User list:</h2>
        <table class="t01">
            
                <tr class="th">
                    <td>Full Name</td>
                    <td>Email</td>
                    <td>Detajet</td>
                    <td>Modifiko</td>
                    <td>Fshij</td>
                </tr>
            
            <tbody>
                <?php
                foreach ($userList as $user) {
                ?>
                    <tr>
                        <td><?php echo $user['usr_fullname']; ?></td>
                        <td><?php echo $user['usr_email']; ?></td>
                        <td><a href=<?php echo "../businessLogic/detailsUser.php?id=" . $user['usr_ID']; //to be continued by students
                                    ?>>Detajet</a></td>
                        <td><a href=<?php echo "../pages/Edit-User.php?id=" . $user['usr_ID'];
                                    ?>>Modifiko</td>
                        <td><a href=<?php echo "../backend/deleteUser.php?id=" . $user['usr_ID'];
                                    ?>>Fshij</td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>



<style>
body{
    margin: 0;
    padding: 0; 
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;

}
   
main{
    border:solid 1px blue;
    width: 99.9%;
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}


.productList{
    border:solid 3px red;
    width: auto;
    margin: 10px 12vw;
}


.header-shadow{
    width: 100%;
    
    background-color: rgb(0, 0, 0, 0.7);
    position: absolute;
    z-index: -1;
}
   

table {
    width: 100%;
}
table, th, td {
    border: 1px solid black;
    border-collapse: collapse;
}
th, td {
    padding: 15px 5px;
    text-align: center;
}
.t01 tr:nth-child(even) {
    background-color: #eee;
}
.t01 tr:nth-child(odd) {
    background-color: #fff;
}
.t01 .th>td {
    background-color: black;
    color: white;
}

.productsTitle{
    background-color:black;
    margin:0;
    padding: 10px 0px;
    color:white;
    text-align:center;
    font-size:15pt;
}

.lastRow{
    height: 45px;
}

.orderButton{
    background-color: rgb(227, 153, 5);
    padding:15px;
    border-radius: 10px;
    text-decoration: none;
    color: black;

    border: solid 1px rgb(0,0,0, 0.5);

}

.removeButton{
    background-color: rgba(190, 33, 28, 0.952);
    padding:10px;
    border-radius: 10px;
    text-decoration: none;
    color: black;
    font-weight: 500;

    border: solid 1px rgb(0,0,0, 0.5);
}

.addProductsButton{
    background-color: rgba(247, 123, 21, 0.952);
    padding:10px;
    border-radius: 10px;
    text-decoration: none;
    color: black;
    font-weight: 500;

    border: solid 1px rgb(0,0,0, 0.6);
}
   
.underline{
    margin-top: 10px;
    border-bottom: solid 2px rgb(241, 145, 0);
}
   
footer h2{
    font-size:5pt;
}
   
   
   
   
   /*------------------media------------------*/
   
   @media(max-width: 1051px){
       .main-container{
           width: 95%;
           height: auto;
           position: relative;
           top: 25%;
       }
       .navigation-bar{
           position: relative;
           top: 0;
       }
   
       .container{
           background-image: url(/img/burger-fries.jpg);
           background-position: center;
           background-repeat: no-repeat;
           background-size: cover;
           
           width: 100%;
           height: 1200px;
      
       }
   
   
       .header-shadow{
           width: 100%;
           height: 1200px;
           background-color: rgb(0, 0, 0, 0.7);
       
       }
   
   
       
      
   }
   
   @media(max-width: 800px){
      
   
        .main-container{
         
           top: 32%;
       }
   
       .main-container h2{
           width: 95%;
       }
   
       .navigation-bar{
           top: 8px;
           right: 2%;
           float: right;
           
       }
       
       ul{
           display: flex;
           justify-content: space-evenly;
           list-style-type: none;
       }
       
       .ul-list a{
           
           margin: 0px 8px;
           font-size: 14px;
      
          
       }
   
       
   }
   
   
   
   
</style>