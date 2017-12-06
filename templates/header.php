<!DOCTYPE html>
<html>
  <head>
    <title>WebTask</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/font-awesome.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/layout.css">
    <script src="scripts/script.js" defer></script>
  </head>
  <body>
    <header>
      <a id="logo_link" href="index.php"><img src="assets/logo.png" width="177px" height="106px"></a>
      <form id="search_form">
        <input type="search" id="searchfield" placeholder="Search" oninput="handleSearch()">
      </form>
      <select id="filter">
        <option value="name">Name</option>
        <option value="category">Category</option>
      </select>

      <?php
      if(isset($_SESSION['is_logged']) && $_SESSION['is_logged'] == true){
        echo("<section id='login'>" . $_SESSION['username']);?>
        <a href="action_logout.php">Logout</a></section>
      <?php }else{
        ?>
        <section id="login">
          <a href="templates/login.php">Login / Sign In<i class="fa fa-sign-in" aria-hidden="true"></i></a>
        </section>
      <?php } ?>

    </header>
