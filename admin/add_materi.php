<?php
include "header.php";
include "../konek.php";
?>

<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="container my-2">
                <h1>Add Course</h1>
            </div>
        </div>
    </div>
</div>

<div class="container my-5">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-lg-12" style="padding: 10px 100px 10px 100px;">
                <div class="card">
                    <form name="form1" action="" method="post">
                        <div class="card-body">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"><strong>Course</strong></div>
                                    <div class="card-body card-block">
                                        <div class="form-group">
                                            <label for="company" class="form-control-label">Select Category</label>
                                            <textarea type="text" name="category" placeholder="" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="company" class="form-control-label">New Title</label>
                                            <textarea type="text" name="judul" placeholder="" class="form-control"></textarea>
                                        </div>

                                        <div class="form-group">
                                            <label for="company" class="form-control-label">New Course</label>
                                            <textarea type="text" name="materi_course" placeholder="" class="form-control"></textarea>
                                        </div>

                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label for="billing_type" class="form-control-label">Billing Type</label>
                                                    <select name="billing_type" id="billing_type" class="form-control">
                                                        <option value="free">Free</option>
                                                        <option value="pay">Pay</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group" id="price" style="display: none;">
                                                    <label for="company" class="form-control-label">Price</label>
                                                    <input type="text" name="price" placeholder="" class="form-control">
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Schedule -->
                                        <div class="form-group">
                                            <label for="schedules" class="form-control-label">Schedules</label>
                                            <div id="schedule-fields">
                                                <div class="row schedule-row">
                                                    <div class="col-md-5">
                                                        <input type="datetime-local" name="start[]" class="form-control" placeholder="Start Schedule">
                                                    </div>
                                                    <div class="col-md-5">
                                                        <input type="datetime-local" name="end[]" class="form-control" placeholder="End Schedule">
                                                    </div>
                                                    <div class="col-md-2">
                                                        <button type="button" class="btn btn-success add-schedule">+</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mt-3">
                                            <input type="submit" name="submit1" value="Add" class="btn btn-success"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="p-3">
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header">
                                        <strong class="card-title">Course</strong>
                                    </div>
                                    <div class="card-body">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th scope="col">No</th>
                                                    <th scope="col">Category</th>
                                                    <th scope="col">Title</th>
                                                    <th scope="col">Course</th>
                                                    <th scope="col">Harga</th>
                                                    <th scope="col">Schedule</th>
                                                    <th scope="col">Edit</th>
                                                    <th scope="col">Hapus</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                $count = 0;
                                                $res = mysqli_query($link, "SELECT * FROM materi");
                                                while ($row = mysqli_fetch_array($res)) {
                                                    $count = $count + 1;
                                                    $schedules = json_decode($row['schedule'], true);
                                                    $schedule_str = '';
                                                    foreach ($schedules as $schedule) {
                                                        $schedule_str .= 'Start: ' . $schedule['start'] . ' End: ' . $schedule['end'] . '<br>';
                                                    }
                                                ?>
                                                    <tr>
                                                        <th scope="row"><?php echo $count; ?></th>
                                                        <td><?php echo $row["category"]; ?></td>
                                                        <td><?php echo $row["judul"]; ?></td>
                                                        <td><?php echo $row["materi_course"]; ?></td>
                                                        <td>
                                                            <?php if ($row['billing_type'] == 'pay') {
                                                                echo $row['price'];
                                                            } else {
                                                                echo 'Free';
                                                            } ?>
                                                        </td>
                                                        <td><?php echo $schedule_str; ?></td>
                                                        <td><a class="btn btn-warning" href="edit_materi.php?id=<?php echo $row["id"]; ?>"> Edit </a></td>
                                                        <td><a class="btn btn-danger" href="delete_materi.php?id=<?php echo $row["id"]; ?>"> Hapus </a></td>
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
                    </form>
                </div>
            </div><!-- .card -->
        </div><!--/.col-->
    </div><!-- .animated -->
</div><!-- .content -->

<?php
if (isset($_POST["submit1"])) {
    $schedules = [];
    for ($i = 0; $i < count($_POST['start']); $i++) {
        $schedules[] = [
            'start' => $_POST['start'][$i],
            'end' => $_POST['end'][$i]
        ];
    }
    $schedules_json = json_encode($schedules);

    mysqli_query($link, "INSERT INTO materi VALUES (NULL, '$_POST[materi_course]', '$_POST[judul]', '$_POST[category]', '$_POST[billing_type]', '$_POST[price]', '$schedules_json')") or die(mysqli_error($link));
?>
    <script type="text/javascript">
        alert("Berhasil");
        window.location.href = window.location.href;
    </script>
<?php
}
?>
<script>
    document.getElementById('billing_type').addEventListener('change', function() {
        var priceField = document.getElementById('price');
        if (this.value === 'pay') {
            priceField.style.display = 'block';
        } else {
            priceField.style.display = 'none';
        }
    });

    document.addEventListener('click', function(event) {
        if (event.target.classList.contains('add-schedule')) {
            var scheduleRow = document.querySelector('.schedule-row').cloneNode(true);
            scheduleRow.querySelector('.add-schedule').classList.replace('btn-success', 'btn-danger');
            scheduleRow.querySelector('.add-schedule').classList.replace('add-schedule', 'remove-schedule');
            scheduleRow.querySelector('.remove-schedule').innerHTML = '-';
            scheduleRow.querySelectorAll('input').forEach(input => input.value = '');
            document.getElementById('schedule-fields').appendChild(scheduleRow);
        } else if (event.target.classList.contains('remove-schedule')) {
            event.target.closest('.schedule-row').remove();
        }
    });
</script>
<?php
include "footer.php";
?>