<?php
include "konek.php";
include "header2.php";
?>

        <!-- header section end -->

<a class="btn btn-outline-dark" href="dashboard.php" style="margin-left: 10px; margin-bottom: 10px"> Back </a>


<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="container my-2">
                <h1> Your Old Result Is Here </h1>
            </div>
        </div>
    </div>
</div>

<div class="content mt-3">
    <div class="animated fadeIn">

        <div class="row" style="padding: 10px 100px 20px 200px;">
            <div class="col-lg-12">
                <div class="card" >
                           <!-- <div class="card-header">
                                <strong class="card-title">Credit Card</strong>
                            </div> -->
                    <div class="card-body" >
                                <!-- Credit Card -->


<table class="table table-bordered text-center">
    <thead>                                                    
        <tr>
            <th scope="col">username</th>
            <th scope="col">exam type</th>
            <th scope="col">total que</th>
            <th scope="col">correct</th>
            <th scope="col">wrong</th>
            <th scope="col">exam time</th>
        </tr>
    </thead>
    <tbody>
        <?php
        $count=0;
        $res=mysqli_query($link,"SELECT * FROM hasil WHERE username = '".$_SESSION["user_name"]."' ORDER BY id DESC");
        while($row=mysqli_fetch_array($res))
        
        {
        ?>                                                    
        <tr>
                <td><?php echo $row["username"]; ?></td>
                <td><?php echo $row["tipe_exam"]; ?></td>
                <td><?php echo $row["total_que"]; ?></td> 
                <td><?php echo $row["correct_answer"]; ?></td> 
                <td><?php echo $row["wrong_answer"]; ?></td> 
                <td><?php echo $row["exam_time"]; ?></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

                    </div>

                </div> <!-- .card -->
            </div><!--/.col-->                                            
        </div>

    </div><!-- .animated -->
</div><!-- .content -->
        
<?php
include "footer.php";
?>                    

</body>
</html>