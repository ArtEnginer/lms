<?php
session_start();
include "konek.php";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $user_id = $_POST['user_id'];
    $materi_id = $_POST['materi_id'];
    $schedule_id = $_POST['schedule_id'];

    // Retrieve selected schedule time
    $res = mysqli_query($link, "SELECT * FROM materi WHERE id = $materi_id");
    $row = mysqli_fetch_assoc($res);
    $schedule_array = json_decode($row['schedule'], true);
    $schedule = $schedule_array[$schedule_id];


    $res = mysqli_query($link, "INSERT INTO schedule (user_id, materi_id, start, end) VALUES ($user_id, $materi_id, '{$schedule['start']}', '{$schedule['end']}')");

    // jika berhasil redirect ke dashboard
    if ($res) {
        header('location:dashboard.php');
    } else {
        echo "Failed to save schedule";
    }
}
