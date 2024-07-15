<?php
include "header.php";
include "../konek.php";
?> 

<div class="breadcrumbs" style="text-align:center">
    <div class="col-sm-12">
        <div class="page-header float-left">
            <div class="container my-2">
                <h1>Pertanyaan</h1>
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
        <div class="p-3">

            <div class="col-lg-12" style="padding: 10px 100px 100px 100px;">
                                              <!-- atas  bawah kanan  kiri  -->
                <div class="card">
                           <!-- <div class="card-header">
                                <strong class="card-title">Credit Card</strong>
                            </div> -->
                    <div class="card-body">
                                <!-- Credit Card -->
                        <table class="table table-bordered text-center">
                            <thead>                                                    
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Tes</th>
                                    <th scope="col">Waktu Tes</th>
                                    <th scope="col">Pilih</th>
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
                                        <td><a class="btn btn-dark" href="add_edit_question.php?id=<?php echo $row["id"]; ?>"> Pilih </a></td>
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
        </div>

    </div><!-- .animated -->
</div><!-- .content -->
        
<?php
include "footer.php";
?>                    