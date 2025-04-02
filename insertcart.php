<?php
session_start();
if(isset($_SESSION['user'])){
if (!isset($_SESSION['CART'])) {
    $_SESSION['CART'] = [];
}

// Get product details from form
$product_name     = $_POST['PName'];
$product_price    = $_POST['PPrice'];
$product_quantity = $_POST['PQuantity'];

// Add product to cart
if (isset($_POST['addcart'])) {
    $check_product = array_column($_SESSION['CART'], 'productName');

    if (in_array($product_name, $check_product)) {
        echo "
            <script>
                alert('Product already added');
                window.location.href='index.php';
            </script>
        ";
    } else {
        $_SESSION['CART'][] = [
            'productName'     => $product_name,
            'productPrice'    => $product_price,
            'productQuantity' => $product_quantity
        ];
        header("location:viewcart.php");
        exit();
    }
}

if (isset($_POST['remove'])) {
    if (!empty($_SESSION['CART'])) {
        foreach ($_SESSION['CART'] as $key => $value) {
            if ($value['productName'] === $_POST['item']) {
                unset($_SESSION['CART'][$key]);  
                $_SESSION['CART'] = array_values($_SESSION['CART']); // Re-index array
                break;
            }
        }
    }
    header("location:viewcart.php");
    exit();
}

if (isset($_POST['update'])) {
    if (!empty($_SESSION['CART'])) {
        foreach ($_SESSION['CART'] as $key => $value) {
            if ($value['productName'] === $_POST['item']) {
                $_SESSION['CART'][$key] = [
                    'productName'     => $product_name,
                    'productPrice'    => $product_price,
                    'productQuantity' => $product_quantity
                ];
                break;
            }
        }
    }
    header("location:viewcart.php");
    exit();
}

}else{
    header('location:  form/login.php');
}
?>
