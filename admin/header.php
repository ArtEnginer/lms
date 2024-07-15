<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Ruang Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">

      <!-- Dropdown Nama start -->
      <!DOCTYPE html>
      <html>

      <head>
        <style>
          .dropdown {
            position: relative;
            display: inline-block;
          }

          .dropdown-content {
            display: none;
            position: absolute;
            background-color: #f9f9f9;
            min-width: 160px;
            box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
            padding: 12px 16px;
            z-index: 1;
          }

          .dropdown:hover .dropdown-content {
            display: block;
          }
        </style>
      </head>

      <body>

        <?php
        @include 'konek.php';
        session_start();

        if (!isset($_SESSION['admin_name'])) {
          header('location:login_admin.php');
        }
        ?>

        <div class="dropdown">
          <h1> <span><?php echo $_SESSION['admin_name'] ?></span>'s Room</h1>
          <div class="dropdown-content">

            <div class="container">
              <div class="content">
                <font size="3">
                  <a class="btn btn-outline-dark" href="logout_admin.php"> Log Out </a>
                </font>
              </div>
            </div>

          </div>
        </div>

      </body>

      </html>
      <!-- Dropdown Nama End -->

      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="add_edit_exam_question.php"> Manajemen Pertanyaan </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="exam_category.php"> Manajemen Kategori </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="add_materi.php"> Manajemen Course </a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="approvement.php">Approvement</a>
          </li>
        </ul>
      </div>

    </div>
  </nav>

</body>

</html>