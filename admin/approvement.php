<?php
include "header.php";
include "../konek.php";

$query = "SELECT * FROM billing WHERE status='pending'";
$result = mysqli_query($link, $query);

if (isset($_GET['approve'])) {
    $id = $_GET['approve'];
    $query = "SELECT * FROM billing WHERE id=" . $id;
    $result = mysqli_query($link, $query);
    $row = mysqli_fetch_array($result);

    $query = "UPDATE billing SET status='approved' WHERE id=" . $id;
    mysqli_query($link, $query);
}



?>

<div class="container content mt-3">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <strong class="card-title">Approvement</strong>
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">No</th>
                                    <th scope="col">Nama Pengguna</th>
                                    <th scope="col">Materi</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">File</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $count = 0;
                                while ($row = mysqli_fetch_array($result)) {
                                    $count = $count + 1;
                                ?>
                                    <tr>
                                        <th scope="row"><?php echo $count; ?></th>
                                        <td><?php
                                            $query = "SELECT * FROM user_form WHERE id=" . $row["user_id"];
                                            $result_user = mysqli_query($link, $query);
                                            $row_user = mysqli_fetch_array($result_user);
                                            echo $row_user["nama"];
                                            ?></td>
                                        <td><?php
                                            $query = "SELECT * FROM materi WHERE id=" . $row["materi_id"];
                                            $result_materi = mysqli_query($link, $query);
                                            $row_materi = mysqli_fetch_array($result_materi);
                                            echo $row_materi["judul"];
                                            ?></td>
                                        <td><?php echo $row["price"]; ?></td>
                                        <td><a href="../uploads/<?php echo $row["file"]; ?>" target="_blank"> Lihat Bukti Bayar</a></td>
                                        <td>
                                            <a class="btn btn-success" href="?approve=<?php echo $row["id"]; ?>"> Approve </a>
                                            <!-- <a class="btn btn-danger" href="reject.php?id=<?php echo $row["id"]; ?>"> Reject </a> -->
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>

                            </tbody>
                        </table>
                    </div>

                </div><!--/.card-body-->
            </div>
        </div>
    </div> <!--/.card-body-->
</div>