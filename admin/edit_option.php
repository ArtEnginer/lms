<?php
include "header.php";
include "../konek.php";

    $id=$_GET["id"];

    $question="";
    $opt1="";
    $opt2="";
    $opt3="";
    $opt4="";
    $answer="";


    $res =mysqli_query($link, "SELECT * FROM toefl WHERE id=$id");                                                                
    while($row=mysqli_fetch_array($res))
    {
    $question=$row["question"];
    $opt1=$row["opt1"];
    $opt2=$row["opt2"];
    $opt3=$row["opt3"];
    $opt4=$row["opt4"];
    $answer=$row["answer"];
    }
?>

<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="container my-2">
                <h1>Edit Question</h1>
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
            <div class="col-lg-12" style="padding: 10px 100px 10px 100px;">
                                             <!-- atas  kanan bawah  kiri  -->
                <div class="card">
                                <!-- <div class="card-header">
                                    <strong class="card-title">Credit Card</strong>
                                </div> -->
                        <div class="card-body">
                                <!-- Credit Card -->
                            <div class="col-lg-12" style="padding: 10px 100px 10px 100px;">
                                                              <!-- atas  kanan bawah  kiri  -->
                                <form name="form1" action="" method="post">
                                    <div class="card">
                                        <div class="card-header"><strong>Edit </strong><small> Questions </small></div>
                                        <div class="card-body card-block">
                                                
                                            <div class="form-group"><label for="company" class=" form-control-label">Edit Question</label>
                                                <textarea type="text" name="question" placeholder="" class="form-control" value="<?php echo $question; ?>"> </textarea></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 1</label>
                                                <input type="text" name="opt1" placeholder="" class="form-control" value="<?php echo $opt1; ?>"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 2</label>
                                                <input type="text" name="opt2" placeholder="" class="form-control" value="<?php echo $opt2; ?>"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 3</label>
                                                <input type="text" name="opt3" placeholder="" class="form-control" value="<?php echo $opt3; ?>"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 4</label>
                                                <input type="text" name="opt4" placeholder="" class="form-control" value="<?php echo $opt4; ?>"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label>
                                                <input type="text" name="answer" placeholder="" class="form-control" value="<?php echo $answer; ?>"></div>
                                            
                                                <br>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Edit" class="btn btn-success"></input>
                                            </div>

                                        </div>
                                    </div>
                                </form>
                            </div> 

                        </div>
                </div>
            </div><!-- .card -->                                              
        </div><!--/.col-->

    </div><!-- .animated -->
</div><!-- .content -->
 
            
<?php
if(isset($_POST["submit1"]))
{
    mysqli_query($link, "UPDATE toefl SET question='$_POST[question]',opt1='$_POST[opt1]',opt2='$_POST[opt2]',opt3='$_POST[opt3]',opt4='$_POST[opt4]',answer='$_POST[answer]' WHERE id=$id") or die(mysqli_error($link));

?>
        <script type="text/javascript">
            window.location="add_edit_exam_question.php";
        </script>
<?php
}
?> 

<?php
include "footer.php";
?>                    