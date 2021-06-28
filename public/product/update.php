<?php

/** @var $pdo \PDO */
require_once "../../views/connection.php";
require_once "../../views/function.php";


$id = $_GET['id']?? null;

if (!$id){
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM products WHERE id=:id');
$statement->bindValue(':id', $id);
$statement->execute();
$product = $statement->fetch(PDO::FETCH_ASSOC);


$errors =[];

$title = $product['title'];
$price = $product['price'];
$description = $product['description'];


// echo $_SERVER['REQUEST_METHOD'].'<br>';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){

  require_once "../../views/validate.php";


if (empty($errors)) {
  

$statement = $pdo->prepare("UPDATE products SET title = :title, image= :image, description = :description, price = :price 
WHERE id = :id");

$statement->bindValue(':title', $title);
$statement->bindValue(':image', $imagePath);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->bindValue(':id', $id);

$statement->execute();
header('Location: index.php');

}
}


?>

<?php include_once "../../views/partials/header.php" ?>


  <body>
    <h1>Update product <b><?php echo $product['title'] ?></b></h1>
    <p>
    <a href="index.php" class="btn btn-secondary">back to product</a>
    </p>




<?php include_once "../../views/partials/form.php" ?>

  </body>
</html>