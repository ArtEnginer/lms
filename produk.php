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
        while ($row = mysqli_fetch_array($pagination_courses)) :
        ?>
            <div class="box">
                <div class="image">
                    <img src="pict/toefl.png" alt="">
                </div>
                <div class="content">
                    <h3><?= $row['judul'] ?></h3>
                    <p class="text-truncate"><?= $row['materi_course'] ?></p>
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

    <nav aria-label="Page navigation example">
        <ul class="pagination">
            <?php
            $all_courses = mysqli_query($link, "SELECT * FROM materi");
            $row = mysqli_fetch_assoc($all_courses);
            $total_pagination = ceil(count($row) / 3);
            if ($total_pagination > 0) :
                for ($i = 0; $i < $total_pagination; $i++) :
            ?>
                    <li class="page-item">
                        <a class="page-link fs-3 <?=
                                                    isset($_GET['course_page'])
                                                        ? ((int) $_GET['course_page'] == $i + 1
                                                            ? 'active text-white'
                                                            : 'text-dark')
                                                        : ($i + 1 == 1
                                                            ? 'active text-white'
                                                            : 'text-dark') ?>" href="?course_page=<?= $i + 1 ?>">
                            <?= $i + 1 ?>
                        </a>
                    </li>
            <?php endfor;
            endif; ?>
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
                Senin 08.00–21.00
                <br>
                Selasa 08.00–21.00
                <br>
                Rabu 08.00–21.00
                <br>
                Kamis 08.00–21.00
                <br>
                Jumat 08.00–21.00
                <br>
                Sabtu 08.00–16.00
                <br>
                Minggu Libur </a>
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