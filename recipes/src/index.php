<!DOCTYPE html>
<!--
https://mit-license.org
Copyright © 2023 gparap
-->
<html lang="en">

<head>
  <meta charset="UTF-8">
  <title>Title</title>
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link href="public_html/css/style.css" rel="stylesheet">
</head>

<body>
  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Features</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <main>
    <div class="container mt-5">
      <div class="row mx-auto d-flex justify-content-center justify-items-center col-12">

        <?php
        require_once('functions.php');

        //open connection
        $db_connection = connect_to_database();

        //get categories
        $db_query = "SELECT * FROM `categories`";
        $db_query_result = mysqli_query($db_connection, $db_query);

        //display categories 
        while ($category = mysqli_fetch_assoc($db_query_result)) {
          $category_name = $category['title'];
          $category_description = $category['desc'];
          $category_image = $category['img'];
          $category_image_attribution = $category['atrib'];

          //display category
          echo '
          <div class="col-lg-3 col-md-9 col-sm-12 mb-5">
            <div class="card">
              <img src="' . $category_image . '" class="card-img-top" alt="...">
              <p class="card-footer text-muted">' . $category_image_attribution . '</p>
              <div class="card-body">
                <h5 class="card-title">' . $category_name . '</h5>
                <p class="card-text">' . $category_description . '</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        ';
        }

        //close connection
        $db_connection->close();
        ?>

      </div>
  </main>

  <!-- Scripts -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>