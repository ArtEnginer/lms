<?php
include "header2.php";
?>

<div class="heading" style="background:url(pict/try.png) no-repeat">
    <h1> Try This Out </h1>
</div>

<?php
include 'konek.php';
?>

<div class="row" style="margin: 0px; padding: 100px 500px 100px 500px; margin-bottom: 50px;">
        <?php
            $res=mysqli_query($link, "SELECT * FROM exam_category");
            while($row=mysqli_fetch_array($res))
            {
        ?>
            <a href="card.php?category=<?= $row["category"] ?>&type=Tes" class="btn btn-success form-control" style="margin-top: 10px;"><?php echo $row["category"]; ?></a>
        <?php

            }
        ?>
</div>

<?php
include "footer.php";
?>
</body>
</html>