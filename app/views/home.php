<!DOCTYPE html>
<html lang="en">
  <head>
    <?php 
      use core\Configuration;
      $data = Configuration::get('appConfig');
    ?>
    <meta charset="utf-8">
    <title><?php echo $data['appName']; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo $data['description']; ?>">
    <meta name="author" content="<?php echo $data['authorName']; ?>">
    <link rel="stylesheet" href="public/css/app.css">
    <script type="text/javascript" src="./public/js/index.js"></script>

  </head>

  <body>
    <div class="main-container">
      <h1><?php echo $data['title']; ?></h1>
    </div>
  </body>
  </html>
