<div class="container ">
  <header class="d-flex flex-wrap justify-content-center py-3 mb-4 border-bottom">
    <p class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-body-emphasis text-decoration-none">
      <span class="fs-4">LovatelCar</span>
    </p>

    <ul class="nav nav-pills">
      <?php
      $currentPage = basename($_SERVER['PHP_SELF']);
      switch ($currentPage) {
        case "index.php":
          echo '<li class="nav-item"><a href="index.php" class="nav-link active" aria-current="page">Home</a></li>';
          break;
        default:
          echo '<li class="nav-item"><a href="index.php" aria-current="page">Home</a></li>';
          break;
      }
      ?>
    </ul>
  </header>
</div>
