<?php
include "header.php";
include "../konek.php";

    $id=$_GET["id"];

    $exam_category="";
    $exam_time="";

    $res =mysqli_query($link, "SELECT * FROM exam_category WHERE id=$id");                                                                
    while($row=mysqli_fetch_array($res))
    {
    $exam_category=$row["category"];
    $exam_time=$row["exam_time"];
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
                                                
                                            <div class="form-group"><label for="company" class=" form-control-label">Edit Category</label>
                                                <input type="text" name="examname" placeholder="" class="form-control" value="<?php echo $exam_category; ?>"></div>
                                            <div class="form-group"><label for="vat" class=" form-control-label"> Time In Minute</label>
                                                <input type="text" name="examtime" placeholder="" class="form-control" value="<?php echo $exam_time; ?>"></div>

                                                <br>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Edit" class="btn btn-success"></input>
                                            </div>

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