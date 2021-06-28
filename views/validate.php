<?php

$title =$_POST['title'];
$description =$_POST['description'];
$price =$_POST['price'];
$imagePath = '';



if (!$title){
  $errors[] = 'PRODUCT TITLE IS REQUIRED';
}
if (!$price){
   $errors[] = 'PRODUCT PRICE IS REQUIRED';
}

if (!is_dir(__DIR__.'/public/image')){
  mkdir(__DIR__.'/public/image');
}

if (empty($errors)) {
  $image = $_FILES['image'] ?? null;
  $imagePath = $product['image'];



  if ($image && $image['tmp_name']){

    if ($product['image']) {
      unlink( __DIR__.'/public/'.$product['image']);
    }

    $imagePath = 'image/'.randomString(8).'/'.$image['name'];
    mkdir(dirname( __DIR__.'/public/' . $imagePath));
    
   
    move_uploaded_file($image['tmp_name'], __DIR__.'/public/' . $imagePath);

  }



}