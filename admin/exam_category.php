<?php
include "header.php";
include "../konek.php";
?> 


<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
        <div class="container my-2">
                <h1>Tambahkan Kategori</h1>
            </div>
        </div>
    </div>
            <!-- <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="#">Dashboard</a></li>
                            <li><a href="#">Forms</a></li>
                            <li class="active">Basic</li>
                        </ol>
                    </div>
                </div>
            </div> -->
</div>


<div class="container my-5">
    <div class="animated fadeIn">

        <div class="row">
            <div class="col-lg-12" style="padding: 10px 100px 10px 100px;">
                                             <!-- atas  kanan bawah  kiri  -->
                <div class="card">
                    <form name="form1" action="" method="post">
                                <!-- <div class="card-header">
                                    <strong class="card-title">Credit Card</strong>
                                </div> -->
                        <div class="card-body">
                                <!-- Credit Card -->
                                
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-header"><strong>Category</strong></div>
                                    <div class="card-body card-block">   
                                        <div class="form-group"><label for="company" class=" form-control-label">New Category</label>
                                        <input type="text" name="examname" placeholder="" class="form-control"></div>

                                            <br>

                                        <div class="form-group"><label for="vat" class=" form-control-label">Time In Minute</label>
                                        <input type="text" name="examtime" placeholder="" class="form-control"></div>
                                            <br>
                                        <div class="form-group">
                                            <input type="submit" name="submit1" value="Add" class="btn btn-success"></input>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="p-3">
                                <div class="col-lg-6">
                                    <div class="card">
                                        <div class="card-header">
                                            <strong class="card-title">Table of Categories</strong>
                                        </div>
                                        <div class="card-body">
                                            <table class="table table-bordered">
                                                <thead>                                                    
                                                    <tr>
                                                        <th scope="col">No</th>
                                                        <th scope="col">Nama Kategori</th>
                                                        <th scope="col">Waktu</th>
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $count=0;
                                                        $res =mysqli_query($link, "SELECT * FROM exam_category");                                                                
                                                        WHILE($row=mysqli_fetch_array($res))
                                                        {
                                                        $count=$count+1;
                                                    ?>                                                    
                                                        <tr>
                                                            <th scope="row"><?php echo $count; ?></th>
                                                            <td><?php echo $row["category"]; ?></td>
                                                            <td><?php echo $row["exam_time"]; ?></td>
                                                            <td><a class="btn btn-warning" href="edit_exam.php?id=<?php echo $row["id"]; ?>"> Edit </a></td>
                                                            <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row["id"]; ?>"> Hapus </a></td>
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

                    </form>
                </div>
            </div><!-- .card -->                                              
        </div><!--/.col-->

    </div><!-- .animated -->
</div><!-- .content -->
 
            
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "INSERT INTO exam_category VALUES (NULL, '$_POST[examname]','$_POST[examtime]')") or die(mysqli_error($link));

?>
        <script type="text/javascript">
            window.location.href=window.location.href;
        </script>
<?php
}
?> 

<?php
include "footer.php";
?>                    