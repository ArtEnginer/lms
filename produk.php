<?php
include "header2.php";
?>

<div class="heading" style="background:url(pict/ourcourse.png) no-repeat">
    <h1> Online Course </h1>
</div>

<!-- produk section start -->

<section class="home-packages">
    <div class="box-container mb-5">
    <?php
        $course_page = isset($_GET["course_page"]) ? (int) $_GET["course_page"] : 1;
        $page = ($course_page - 1) * 3;
        $pagination_courses = mysqli_query($link, "SELECT * FROM materi LIMIT $page, 3");
        while($row=mysqli_fetch_array($pagination_courses)):
    ?>
    <div class="box">
      <div class="image">
          <img src="pict/toefl.png" alt="">
      </div>  
      <div class="content">
        <h3><?= $row['judul'] ?></h3>
        <p class="text-truncate"><?= $row['materi_course'] ?></p>
        <a href="materi.php?id=<?= $row['id'] ?>" class="btn btn-dark fs-3">Read the Course</a>
      </div>
    </div>
    <?php endwhile; ?>
  </div>

  <nav aria-label="Page navigation example">
    <ul class="pagination">
        <?php
            $all_courses=mysqli_query($link, "SELECT * FROM materi");
            $row = mysqli_fetch_assoc($all_courses);
            $total_pagination = ceil(count($row) / 3);
            if ($total_pagination > 0):
            for($i = 0; $i < $total_pagination; $i++):
        ?>
        <li class="page-item">
            <a class="page-link fs-3 <?= 
                isset($_GET['course_page']) 
                ? ((int) $_GET['course_page'] == $i + 1
                    ? 'active text-white'
                    : 'text-dark')
                : ($i + 1 == 1 
                    ? 'active text-white'
                    : 'text-dark') ?>" 
            href="?course_page=<?= $i + 1 ?>">
                <?= $i + 1 ?>
            </a>
        </li>
        <?php endfor; endif; ?>
    </ul>
</nav>
</section>

<!-- produk section end -->


        <!-- footer section start -->
<section class="footer">

    <div class="box-container">
        <div class="box">
            <h3> Open Hour </h3>
            <a> 
Senin	08.00–21.00
<br>
Selasa	08.00–21.00
<br>
Rabu	08.00–21.00
<br>
Kamis	08.00–21.00
<br>
Jumat	08.00–21.00
<br>
Sabtu	08.00–16.00 
<br>
Minggu  Libur </a>
        </div>
 
        <div class="box">
            <h3> Location </h3>
            <a href="#"> <i class="fa-solid fa-location-dot"></i> Jln. Raya Ciwaru No. 2 Warung Pojok, Serang 42117 </a>
        </div>

        <div class="box">
            <h3> Contact Info </h3>
            <a href="#"> <i class="fa-brands fa-whatsapp"></i> 0877-7447-0590 </a>
            <a href="#"> <i class="fa-solid fa-phone"></i> (0254) 378423, 9260742 </a>
        </div>

        <div class="box">
            <h3> Social Media </h3>
            <a href="https://buildbettercommunication.com"> <i class="fa-solid fa-globe"></i> Website </a>
            <a href="https://www.instagram.com/bbcserang/"> <i class="fa-brands fa-instagram"></i> Instagram </a>
            <a href="#"> <i class="fa-brands fa-tiktok"></i> TikTok </a>
            <a href="#"> <i class="fa-brands fa-youtube"></i> YouTube </a>
            <a href="https://www.facebook.com/bbcserang/?locale=id_ID"> <i class="fa-brands fa-facebook"></i> Facebook </a>
        </div>

    </div>

    <div class="credit"> Created by <span> Meh </span> | all right reserved</div>
</section>
        <!-- footer section end -->

        <!-- swiper js link -->
        <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
       <!-- custom js file link -->
<script src="script.js"></script>

</body>
</html>