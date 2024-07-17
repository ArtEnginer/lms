<?php
include "header2.php";
?>

<!-- home section start -->
<section class="home">

  <body>

    <!-- Carousel -->
    <div id="demo" class="carousel slide" data-bs-ride="carousel">

      <!-- Indicators/dots -->
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#demo" data-bs-slide-to="0" class="active"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="1"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="2"></button>
        <button type="button" data-bs-target="#demo" data-bs-slide-to="3"></button>
      </div>

      <!-- The slideshow/carousel -->
      <div class="carousel-inner" width: 100%;">
        <div class="carousel-item active">
          <img src="pict/slide1.png" alt="" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="pict/slide2.png" alt="" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="pict/slide3.png" alt="" class="d-block w-100">
        </div>
        <div class="carousel-item">
          <img src="pict/slide4.png" alt="" class="d-block w-100">
        </div>
      </div>

      <!-- Left and right controls/icons -->
      <button class="carousel-control-prev" type="button" data-bs-target="#demo" data-bs-slide="prev">
        <span class="carousel-control-prev-icon"></span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#demo" data-bs-slide="next">
        <span class="carousel-control-next-icon"></span>
      </button>
    </div>

  </body>

</section>
<!-- home section end -->


<!-- home services section start -->

<section class="services">
  <h1 class="heading-title"> Program Kami </h1>

  <div class="box-container">

    <div class="box">
      <a href="child.php" style="text-decoration: none"> <img src="pict/child.jpg" alt="">
        <h3> Child </h3>
      </a>
    </div>

    <div class="box">
      <a href="teen.php" style="text-decoration: none"> <img src="pict/teen.jpg" alt="">
        <h3> Teenager </h3>
      </a>
    </div>

    <div class="box">
      <a href="adult.php" style="text-decoration: none"> <img src="pict/adult.jpg" alt="">
        <h3> Adult </h3>
    </div>

    <div class="box">
      <a href="work.php" style="text-decoration: none"> <img src="pict/work.jpg" alt="">
        <h3> Corporate </h3>
    </div>

    <div class="box">
      <a href="conversation.php" style="text-decoration: none"> <img src="pict/conver.png" alt="">
        <h3> Conversation </h3>
    </div>

  </div>
</section>
<!-- home services section end -->

<!-- home about section start -->
<section class="home-about">

  <div class="image">
    <img src="pict/bbc.jpg" alt="">
  </div>

  <div class="content">
    <h3> Tentang Kami </h3>
    <p> BBC English Training Specialist adalah lembaga pendidikan Bahasa Inggris yang didirikan pada Juni 1980.
      Lembaga yang dilengkapi dengan fasilitas modern, kurikulum serta manajemen yang teratur dan terkontrol rapi,
      saat ini memiliki siswa ± 15.000 orang terbagi dalam kelompok anak-anak, pelajar, dewasa, para eksekutif, ataupun manajer.
      Kami BBC English Training Specialist.</p>
    <a href="about.php" class="btn"> Read More </a>
  </div>

</section>
<!-- home about section end -->

<!-- home product section start -->

<section class="home-packages">
  <h1 class="heading-title"> Online Course </h1>
  <div class="box-container">
    <?php
    $res = mysqli_query($link, "SELECT * FROM materi");
    while ($row = mysqli_fetch_array($res)) :
      $datetime = new DateTime();
      $now = $datetime->format('Y-m-d H:i:s');
    ?>
      <div class="box">
        <div class="image">
          <img src="pict/toefl.png" alt="">
        </div>

        <div class="content">
          <h3> Structure TOEFL </h3>
          <p> <?= $row['materi_course'] ?></p>
          <?php
          if ($row['billing_type'] == 'pay') :
            $user_id = $_SESSION['id'];
            $materi_id = $row['id'];
            $result = mysqli_query($link, "SELECT * FROM billing WHERE user_id = $user_id AND materi_id = $materi_id");
            $billing = mysqli_fetch_assoc($result);

            if (!$billing) : ?>
              <a href="bayar.php?id=<?= $row['id'] ?>" class="btn btn-primary fs-3">Paying <span class="badge bg-danger">Rp. <?= $row['price'] ?></span></a>
            <?php elseif ($billing['status'] == 'pending') : ?>
              <div class="alert alert-warning" role="alert">
                Your payment is being processed by the admin
              </div>
            <?php elseif ($billing['status'] == 'approved') : ?>
              <div class="alert alert-success" role="alert">
                Your payment has been approved and processed
              </div>

              <?php
              // Decode the JSON schedule array
              $schedule_array = json_decode($row['schedule'], true);
              $current_time = time(); // Get the current time
              $timenow = date('Y-m-d H:i:s');
              $userschedule = mysqli_query($link, "SELECT * FROM schedule WHERE user_id = $user_id AND materi_id = $materi_id");
              $schedule = mysqli_fetch_assoc($userschedule);


              if ($schedule) {
                $start = strtotime($schedule['start']);
                $end = strtotime($schedule['end']);

                if ($timenow >= $start) {
                  echo '<a href="materi.php?id=' . $row['id'] . '" class="btn btn-info fs-3">Read More</a>';
                } elseif ($timenow >= $end) {
                  echo '<div class="alert alert-info" role="alert">Your schedule has ended</div>';
                } else {
                  echo '<div class="alert alert-info" role="alert">You have not scheduled this materi yet</div>';
                }
              } else {

                if (is_array($schedule_array) && count($schedule_array) > 0) : ?>
                  <form method="POST" action="save_schedule.php">
                    <div class="form-group">
                      <label for="schedule">Choose a schedule:</label>
                      <select class="form-control text-center" id="schedule" name="schedule_id">
                        <?php foreach ($schedule_array as $index => $schedule) : ?>
                          <option value="<?= $index ?>">
                            <?= date('d M Y, H:i', strtotime($schedule['start'])) ?> - <?= date('d M Y, H:i', strtotime($schedule['end'])) ?>
                          </option>
                        <?php endforeach; ?>
                      </select>
                      <button type="submit" class="badge bg-primary w-100">Submit</button>
                    </div>
                    <input type="hidden" name="materi_id" value="<?= $materi_id ?>">
                    <input type="hidden" name="user_id" value="<?= $user_id ?>">
                  </form>

                  <?php foreach ($schedule_array as $schedule) :

                    if ($timenow >= strtotime($schedule['start'])) : ?>
                      <!-- <a href="materi.php?id=<?= $row['id'] ?>" class="btn btn-info fs-3">Read More</a> -->
                  <?php endif;
                  endforeach; ?>
                <?php else : ?>
                  <div class="alert alert-info" role="alert">
                    No schedules available for this materi.
                  </div>
              <?php endif;
              } ?>
            <?php else : ?>
              <a href="bayar.php?id=<?= $row['id'] ?>" class="btn btn-primary fs-3">Paying <span class="badge bg-danger">Rp. <?= $row['price'] ?></span></a>
            <?php endif; ?>
          <?php else : ?>
            <a href="materi.php?id=<?= $row['id'] ?>" class="btn btn-dark fs-3">
              Learn More <span class="badge bg-success">Free</span>
            </a>
          <?php endif; ?>


        </div>
      </div>
    <?php endwhile; ?>
  </div>

  <div class="load-more"> <a href="produk.php" class="btn"> Load More </a> </div>

</section>

<!-- home product section end -->

<!-- home offer section start -->
<!--
<section class="home-offer">

    <div class="content">

    <h3> Up to 50% </h3>
    <p> Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        Doloremque nostrum nisi sed placeat rerum nesciunt incidunt, 
        et perspiciatis ipsam consectetur debitis fuga in eius? 
        Recusandae rem dolor inventore necessitatibus officiis. </p>
        <a href="book.php" class="btn"> Book Now! </a>
    </div>

</section>
-->
<!-- home offer section end -->

<?php
include "footer.php";
?>