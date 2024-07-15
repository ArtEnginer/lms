<?php
include "header2.php";
include "konek.php";
?>

<div class="heading" style="background:url(pict/ourcourse.png) no-repeat">
    <h1>Payment Page</h1>
</div>

<section class="payment-section">
    <div class="container">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Get form data
            $materi_id = $_POST['materi_id'];
            $user_id = $_POST['user_id'];
            $price = $_POST['price'];

            // File upload
            $target_dir = "uploads/";
            $name = $_FILES["bukti"]["name"];
            $name = date('YmdHis') . $name;
            $target_file = $target_dir . basename($name);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

            // Check if file is an actual image or fake image
            $check = getimagesize($_FILES["bukti"]["tmp_name"]);
            if ($check !== false) {
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }

            // Check file size
            if ($_FILES["bukti"]["size"] > 5000000) {
                echo "Sorry, your file is too large.";
                $uploadOk = 0;
            }

            // Allow certain file formats
            if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }

            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
            } else {
                if (move_uploaded_file($_FILES["bukti"]["tmp_name"], $target_file)) {
                    $stmt = $link->prepare("INSERT INTO billing (materi_id, user_id, price, file, status) VALUES (?, ?, ?, ?, 'pending')");
                    $stmt->bind_param("iiss", $materi_id, $user_id, $price, $name);
                    if ($stmt->execute()) {

                        header("Location: bayar.php?id=$materi_id&success=true");
                    } else {
                        echo "Error: " . $stmt->error;
                    }

                    $stmt->close();
                } else {
                    echo "Sorry, there was an error uploading your file.";
                }
            }
        }

        if (isset($_GET['id'])) {
            $course_id = $_GET['id'];
            $result = mysqli_query($link, "SELECT * FROM materi WHERE id = $course_id");
            $course = mysqli_fetch_assoc($result);
        }
        ?>
        <div class="payment-form">
            <h2>Course: <?= $course['judul'] ?></h2>
            <form method="POST" action="bayar.php" enctype="multipart/form-data">
                <input type="hidden" name="materi_id" value="<?= $course['id'] ?>">
                <input type="hidden" name="user_id" value="<?= $_SESSION['id'] ?>">
                <div class="form-group">
                    <label for="price">Amount:</label>
                    <input type="text" id="price" name="price" class="form-control" value="<?= $course['price'] ?>" readonly>
                </div>
                <div class="form-group mt-3">
                    <label for="bukti">Upload Payment Proof:</label>
                    <input type="file" id="bukti" name="bukti" class="form-control" required>
                </div>
                <?php
                // jika ada parameter success di URL maka tampilkan pesan sukses
                if (isset($_GET['success'])) {
                    echo '<div class="alert alert-success mt-3" role="alert">Payment proof has been uploaded successfully!</div>';
                } else {
                    echo '<div class="alert alert-info mt-3" role="alert">Please upload your payment proof to continue.</div> <button type="submit" class="btn btn-primary w-100">Pay Now</button>';
                }

                ?>
            </form>
        </div>
    </div>
</section>

<?php
include "footer.php";
?>