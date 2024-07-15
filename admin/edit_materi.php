<?php
include "header.php";
include "../konek.php";

    $id=$_GET["id"];

    $materi_course="";
    $judul="";
    $category="";


    $res =mysqli_query($link, "SELECT * FROM materi WHERE id=$id");                                                                
    while($row=mysqli_fetch_array($res))
    {
    $materi_course=$row["materi_course"];
    $judul=$row["judul"];
    $category=$row["category"];

    }
?>

<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="container my-2">
                <h1>Edit Category</h1>
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

<div class="content mt-3">
    <div class="animated fadeIn">


        <div class="row">
            <div class="col-lg-12" style="padding: 10px 200px 10px 200px;">
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
                                    <div class="card-header"><strong>Edit</strong><small> Category</small></div>
                                        <div class="card-body card-block">
                                           
                                            <form action="" method="post">
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit the Category</label>
                                                    <textarea type="text" name="category" placeholder="" class="form-control" value="<?php echo $category; ?>"></textarea></div>
    
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit the Title</label>
                                                    <textarea type="text" name="judul" placeholder="" class="form-control" value="<?php echo $judul; ?>"></textarea></div>
    
                                                <div class="form-group"><label for="company" class=" form-control-label">Edit the Course</label>
                                                    <textarea type="text" name="materi_course" placeholder="" class="form-control" value="<?php echo $materi_course; ?>"></textarea></div>
    
                                                <br>
                                                <div class="form-group">
                                                    <input type="submit" name="submit1" value="Edit" class="btn btn-success"></input>
                                                </div>
                                            </form>

                                        </div>
                                    </div>
                                </div>

                            </div> <!--/.card-body-->
                            </form>
                        </div><!-- .card -->                                              
                    </div><!--/.col-->
                </div><!-- .animated -->

            </div><!-- .content -->
 
            
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "UPDATE exam_category SET category='$_POST[examname]',exam_time='$_POST[examtime]' WHERE id=$id") or die(mysqli_error($link));

?>
        <script type="text/javascript">
            window.location="exam_category.php";
        </script>
<?php
}
?> 

<?php
include "footer.php";
?>                    