<?php
include "header.php";
include "../konek.php";

$id=$_GET["id"];
$exam_category="";

$res =mysqli_query($link, "SELECT * FROM exam_category WHERE id=$id"); 
while($row=mysqli_fetch_array($res))
{
    $exam_category=$row["category"];
}

?> 

<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="container my-2">
                <h1>Tambahkan pertanyaan ke dalam <?php echo "<font color='blue'>" .$exam_category. "</font>"; ?></h1>
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
                        <div class="col-lg-12">
                            <form name="form1" action="" method="post">
                                <div class="card">
                                    <div class="card-header"><strong>Add New </strong><small> Questions </small></div>
                                        <div class="card-body card-block">
                                                
                                            <div class="form-group"><label for="company" class=" form-control-label">New Question</label>
                                                <textarea type="text" name="question" placeholder="" class="form-control"> </textarea></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 1</label>
                                                <input type="text" name="opt1" placeholder="" class="form-control"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 2</label>
                                                <input type="text" name="opt2" placeholder="" class="form-control"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 3</label>
                                                <input type="text" name="opt3" placeholder="" class="form-control"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Option 4</label>
                                                <input type="text" name="opt4" placeholder="" class="form-control"></div>
                                            
                                            <div class="form-group"><label for="company" class=" form-control-label">Add Answer</label>
                                                <input type="text" name="answer" placeholder="" class="form-control"></div>
                                            
                                                <br>
                                            <div class="form-group">
                                                <input type="submit" name="submit1" value="Tambahkan" class="btn btn-success"></input>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div> 

                    </div><!--/.card-body-->

                </div> <!-- .card -->
            </div><!--/.col-->                                                                    
        </div>

        <div class="row">
        <div class="p-3">
            <div class="col-lg-12" style="padding: 10px 100px 10px 100px;">
                                             <!-- atas  kanan bawah  kiri  -->

                <div class="card">
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th scope="col">No</th>
                                <th scope="col" style="width:40%">Pertanyaan</th>
                                <th scope="col">Pilihan 1</th>
                                <th scope="col">Pilihan 2</th>
                                <th scope="col">Pilihan 3</th>
                                <th scope="col">Pilihan 4</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                    
                            <?php
                    
                                $res =mysqli_query($link, "SELECT * FROM toefl WHERE category='$exam_category' ORDER BY nomor ASC"); 
                                while($row=mysqli_fetch_array($res))
                                    {
                                        echo "<tr>";
                                            echo "<td>"; echo $row["nomor"]; echo "</td>";
                                            echo "<td>"; echo $row["question"]; echo "</td>";
                                            echo "<td>"; echo $row["opt1"]; echo "</td>";
                                            echo "<td>"; echo $row["opt2"]; echo "</td>";
                                            echo "<td>"; echo $row["opt3"]; echo "</td>";
                                            echo "<td>"; echo $row["opt4"]; echo "</td>";
                                            ?>
                                            <td><a class="btn btn-warning" href="edit_option.php?id=<?php echo $row["id"]; ?>"> Edit </a></td>
                                            <td><a class="btn btn-danger" href="delete_option.php?id=<?php echo $row["id"]; ?>"> Hapus </a></td>
                                            <?php
                                        echo "</tr>";
                                    }
                            ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
                                </div>

    </div><!-- .animated -->
</div><!-- .content -->
 
                                    
<?php
if(isset($_POST["submit1"]))
{
    $loop=0;
    $count=0;

    $res=mysqli_query($link, "SELECT * FROM toefl WHERE category='$exam_category' ORDER BY id ASC") or die(mysqli_error($link));
    
    $count=mysqli_num_rows($res);

    if($count==0)
    {

    }else{
        while($row=mysqli_fetch_array($res))
        {
            $loop=$loop+1;
            mysqli_query($link, "UPDATE toefl SET nomor='$loop' WHERE id=$row[id]");
        }
    }
            $loop=$loop+1;
            mysqli_query($link, "INSERT INTO toefl VALUES (NULL, '$loop','$_POST[question]','$_POST[opt1]','$_POST[opt2]','$_POST[opt3]','$_POST[opt4]','$_POST[answer]','$exam_category')") or die(mysqli_error($link));

?>
        <script type="text/javascript">
            alert("Pertanyaan berhasil ditambahkan");
            window.location.href=window.location.href;
        </script>
<?php
}
?> 


<?php
include "footer.php";
?>                    