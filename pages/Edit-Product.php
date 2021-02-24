<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/edit-page.css">
    <title>Edit Product</title>
</head>
<body>
    <a id="home-button" class="home-button" href="Dashboard.php?id=products">Back</a>
    <?php
        include '../backend/mappers/productMapper.php';
        session_start();
        if($_SESSION['role']==0){
            header("Location:../index.php");
        }
        else{
                if (isset($_GET['id'])) {
                    $productId = $_GET['id'];
                    
                    $mapper = new ProductMapper();
                    $product = $mapper->getProductbyID($productId);

                    if(isset($_POST['edit-btn'])){
                        $productId = $_POST['edit-ID'];
                        $name = $_POST['edit-name'];
                        $price = $_POST['edit-price'];
                        $img = $_POST['edit-img'];
                        $category = $_POST['edit-category'];
                        

                        $mapper->edit($productId, $name, $price, $img, $category);
                        header("Location:../pages/dashboard.php?id=products");
                    }
                
            
            echo '
                <form id="register" class="formRegister" method = "POST">  
                <h2>Update Data</h2>
                <input type="hidden"  class="input-field" name = "edit-ID" value="'.$product['prod_ID'].'"/>
                <input type="text"  class="input-field" name = "edit-name"  value="'.$product['prod_name'].'"/>
                <input type="text"  class="input-field" name = "edit-price"  value="'.$product['prod_price'].'"/>
                <input type="text"  class="input-field" name = "edit-img"  value="'.$product['prod_img'].'"/>
                <input type="text"  class="input-field" name = "edit-category"  value="'.$product['prod_category'].'"/>
            
            
                <button type="submit" class="input-submit" name = "edit-btn" >Update</button>
                </form>
            ';

            }
        }
    ?>

</body>
</html>