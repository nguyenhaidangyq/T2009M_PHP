<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style/EditForm.css"/>
</head>
<body>
    <?php
    include_once "Database.php";
    $id = $_GET["id"];
    $conn = connectDB();
    $txt_sql = "select * from listproduct where id = $id";
    $products = queryDB($txt_sql);
    $product = $products[0];
    ?>
<div class="edit-form">
    <h1>Add to cart</h1>
    <form action="ConfirmAddToCart.php" method="post" class="form">
        <input type="hidden" name="id" class="form-control" value="<?php echo $product["id"]; ?>" />
        <div class="form-group">
            <label class="label-input">Product name</label>
            <input type="text"   name="name" class="form-control" value="<?php echo $product["name"]; ?>"/>
        </div>
        <div class="form-group">
            <label class="label-input">Quantity</label>
            <input type="number" name="quantity" class="form-control" min="1" max="<?php echo $product["quantity"]; ?>" value="<?php echo $product["quantity"]; ?>"/>
        </div>
        <div class="form-group">
            <input type="hidden" name="price" class="form-control" value="<?php echo $product["price"]; ?>"/>
        </div>
        <input type="hidden" name="categoryId" value="<?php echo $product["categoryId"] ?>"/>
        <div class="btn-group-control">
            <button onclick="location.href='ListProduct.php?id=<?php echo $product["categoryId"] ?>'" type="button" class="btn btn-secondary btn-lg">Close</button>
            <button onclick="location.href='Cart.php'" type="submit" class="btn btn-primary btn-lg">Confirm</button>
        </div>
    </form>

</div>
</body>
</html>