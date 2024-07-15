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
                                
                            <div class="col-lg-12">
                                <div class="card">
                                    <div class="card-header"><strong>Course</strong></div>
                                    <div class="card-body card-block">   
                                        <form action="" method="post">
                                            <div class="form-group"><label for="company" class=" form-control-label">Select Category</label>
                                            <textarea type="text" name="category" placeholder="" class="form-control"></textarea></div>
    
                                            <div class="form-group"><label for="company" class=" form-control-label">New Title</label>
                                            <textarea type="text" name="judul" placeholder="" class="form-control"></textarea></div>
    
                                            <div class="form-group"><label for="company" class=" form-control-label">New Course</label>
                                            <textarea type="text" name="materi_course" placeholder="" class="form-control"></textarea></div>
    
                                                <br>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Add" class="btn btn-success"></input>
                                            </div>
                                        </form>
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
                                                        <th scope="col">Edit</th>
                                                        <th scope="col">Hapus</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                        $count=0;
                                                        $res =mysqli_query($link, "SELECT * FROM materi");                                                                
                                                        WHILE($row=mysqli_fetch_array($res))
                                                        {
                                                        $count=$count+1;
                                                    ?>                                                    
                                                        <tr>
                                                            <th scope="row"><?php echo $count; ?></th>
                                                            <td><?php echo $row["category"]; ?></td>
                                                            <td><?php echo $row["judul"]; ?></td>
                                                            <td><?php echo $row["materi_course"]; ?></td>
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
    mysqli_query($link, "INSERT INTO materi VALUES (NULL, '$_POST[materi_course]', '$_POST[judul]', '$_POST[category]')") or die(mysqli_error($link));

?>
        <script type="text/javascript">
            alert("Berhasil");
            window.location.href=window.location.href;
        </script>
<?php
}
?> 

<?php
include "footer.php";
?>                    