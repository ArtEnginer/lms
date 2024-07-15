<?php
include "konek.php";
session_start();


// Menghubungkan ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "skripsi";

$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mini Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
    <body>

    <?php
    // Mengambil pertanyaan dari database
    $category = $_GET['category'];
    $sql = "SELECT * FROM exam_category WHERE category = '".$category."'";
    $result = $conn->query($sql);
    $time = $result->fetch_assoc()['exam_time'];
    $countdown = time() + ($time * 60);
    ?>
    <!-- As a heading -->
        <nav class="navbar bg-body-tertiary">
            <div class="container" style="padding-left: 700px">
                <span class="navbar-brand mb-0 h1">Mini Quiz BBC</span>
                <div class="col d-flex justify-content-end">

                    <span class="me-3" id="timer"> <?= $time .":00"?></span>

                <button type="button" class="btn btn-primary me-2" id="btn-start">Mulai </button>
                <a href="dashboard.php" type="button" class="btn btn-warning">kembali </a>
            </div>
                
            </div>
        </nav>

        <div class="card" style="padding: 70px; width: 100rem;">
            <div class="card-body">
                <h5 class="card-title"> Guide Line </h5>
                <h6 class="card-subtitle mb-2 text-body-secondary">Card subtitle</h6>
    
                <table>
                    <tbody>
        
<?php

// Memeriksa apakah formulir telah dikirim
if (isset($_POST['finish'])) {
    $totalQuestions = 0;
    $correctAnswers = 0;
    $userAnswer = $_POST["question_$questionId"];

    
    // Mengambil pertanyaan dari database
    $category = $_GET['category'];
    $sql = "SELECT id, nomor, question, opt1, opt2, opt3, opt4, answer FROM toefl WHERE category = '".$category."'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // output data dari setiap baris
        while($row = $result->fetch_assoc()) {
            $totalQuestions++;
            $questionId = $row["id"];
            $correctAnswer = $row["answer"];
            $userAnswer = $_POST["question_$questionId"];
            var_dump($userAnswer == $correctAnswer);

            // Memeriksa apakah jawaban yang dikirimkan benar
            if ($userAnswer == $correctAnswer) {
                $correctAnswers++;
            }
        }
    }

    $sqlInsert = "INSERT INTO hasil SET 
        username = '". $_SESSION['user_name'] ."',
        tipe_exam = '".$_GET['type']."',
        total_que = '".$totalQuestions."',
        correct_answer = '".$correctAnswers."', 
        wrong_answer = '".$totalQuestions - $correctAnswers."',
        exam_time = '".$_POST['time']."' ";
        
        $result_insert = $conn->query($sqlInsert);
if($result_insert){
    header("location: results.php");
}
    // Menutup koneksi ke database
    $conn->close();

    // Menampilkan hasil
    echo "Jumlah jawaban benar: " . $correctAnswers . "<br>";
    echo "Jumlah jawaban salah: " . ($totalQuestions - $correctAnswers) . "<br>";
    echo "Total soal: " . $totalQuestions;
    echo "Total Waktu: " . $_POST['time'];

}
?>
    <form method="post" action="">
        <input type="text" name="time" id="time" hidden />
        <?php
        // Mengambil pertanyaan dari database
        $category = $_GET['category'];
        $sql = "SELECT id, nomor, question, opt1, opt2, opt3, opt4 FROM toefl WHERE category = '".$category."'";

        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // output data dari setiap baris
            while($row = $result->fetch_assoc()) {
                $questionId = $row["id"];

                $nomor = $row["nomor"];

            
                $question = $row["question"];

                $opt1 = $row["opt1"];
                $opt2 = $row["opt2"];
                $opt3 = $row["opt3"];
                $opt4 = $row["opt4"];
                
                echo "<p>$nomor. $question</p>";
                echo "<input type='radio' name='question_$questionId' value='$opt1'>$opt1<br>";
                echo "<input type='radio' name='question_$questionId' value='$opt2'>$opt2<br>";
                echo "<input type='radio' name='question_$questionId' value='$opt3'>$opt3<br>";
                echo "<input type='radio' name='question_$questionId' value='$opt4'>$opt4<br>";

            }
        }
        ?>



                    </tbody>
                </table>
                        <br>
                <button type="submit" name="finish" class="btn btn-secondary d-none" id="btn-finish"> Finish </button>
            </div>
        </div>
        </form>

    <script>
        let targetTime = <?= $countdown * 1000 ?>

        document.getElementById("btn-start").addEventListener("click", function() {
            setInterval(() => {
            countdown()
        }, 1000);

        this.classList.add("d-none")

        document.getElementById("btn-finish").classList.remove("d-none")
        })

        let minutesSpent = 0
            let secondsSpent = 0

        function countdown() {
            const currentTime = new Date().getTime();
            const timeRemaining = targetTime - currentTime;
            

            if (timeRemaining > 0) {
                secondsSpent++
                if (secondsSpent === 60) {
                    secondsSpent = 0
                    minutesSpent++
                }

                let minutes = Math.floor((timeRemaining % (1000 * 60 * 60)) / (1000 * 60));
                let seconds = Math.floor((timeRemaining % (1000 * 60)) / 1000);

                document.getElementById("timer").innerHTML = minutes + ":" + seconds;
                document.getElementById("time").value = (minutesSpent >= 10 ? minutesSpent : "0" + minutesSpent) + 
                    ":" + (secondsSpent >= 10 ? secondsSpent : "0" + secondsSpent)
            } else {
                document.getElementById("btn-finish").click()
            }
        }
        
    </script>

</body>