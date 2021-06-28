<?php

/** @var $pdo \PDO */
require_once "../../views/connection.php";

require_once "../../views/search.php";

?>

<?php include_once "../../views/partials/header.php" ?>

  <body>
    <h1>Products Crud</h1>
<p>
<a href="create.php" class="btn btn-sm btn-success">Add Product</a>
</p>

<form action="">
<div class="input-group mb-3">
  <input type="text" class="form-control" 
  placeholder="Search products" 
  name="search" value="<?php echo $search ?>">
  <button class="btn btn-outline-secondary" type="submit">Search</button>
</div>
</form>

    <table class="table">
  <thead>
    <tr>
      <th scope="col">Serial</th>
      <th scope="col">Image</th>
      <th scope="col">Title</th>
      <th scope="col">Price($)</th>
      <th scope="col">Create Date</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($products as $i => $product): ?>
        <tr>
      <th scope="row"><?php echo $i + 1 ?></th>
      <td>
      <img src="/<?php echo $product['image'] ?>" class="thumb-image">
      </td>
      <td><?php echo $product['title'] ?></td>
      <td><?php echo $product['price'] ?></td>
      <td><?php echo $product['create_date'] ?></td>
      <td>
      <a href="update.php?id=<?php echo $product['id'] ?>" class="btn btn-sm btn-outline-primary">edit</a>
<form style="display: inline-block" method="post" action="delete.php">
<input type="hidden" name="id" value="<?php echo $product['id'] ?>">
<button  type="submit" class="btn btn-sm btn-outline-danger">delete</button>
</form>
     </td>
      
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
    <p>
      <a href="index.php" class="btn btn-secondary">back to product</a>
    </p>
  </body>
</html>