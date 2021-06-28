<?php

/** @var $pdo \PDO */
require_once "../../views/connection.php";
require_once "../../views/function.php";


$errors =[];
$title = '';
$price = '';
$description = '';
$product = [
  'image' => ''
];


// echo $_SERVER['REQUEST_METHOD'].'<br>';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){


  require_once "../../views/validate.php";

if (empty($errors)) {
 

$statement = $pdo->prepare("INSERT INTO products(title, image, description, price, create_date)
                   VALUES( :title, :image, :description, :price, :date)");

$statement->bindValue(':title', $title);
$statement->bindValue(':image', $imagePath);
$statement->bindValue(':description', $description);
$statement->bindValue(':price', $price);
$statement->bindValue(':date', date('Y-m-d H:i:s'));
$statement->execute();

header('Location: index.php');

}
}


?>

<?php include_once "../../views/partials/header.php" ?>


  <body>

  <p>
    <a href="index.php" class="btn btn-secondary">back to product</a>
    </p>
  
    <h1>Create new product</h1>

    <?php include_once "../../views/partials/form.php" ?>


  </body>
</html>