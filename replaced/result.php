<?php
include "header.php";
$date=date("d-m-Y H:i:s")
$_SESSION["end_time"]=date("d-m-Y H:i:s", strtotime($date."+ $_SESSION[exam_time] minutes"));
include "konek.php";
?>

<?php
include "header.php";
?>


        <div class="row" style="margin: 0px; padding:0px; margin-bottom: 50px;">

            <div class="col-lg-6 col-lg-push-3" style="min-height: 500px; background-color: white;"> heloww 
<?php
$correct=0;
$wrong=0;

if(isset($_SESSION["answer"]))
{
    for($i=1;$i<=sizeof($_SESSION["answer"]); $i++)
    {
        $answer=0;
        $res=mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]' && question_no=$i");
        while($row=mysqli_fetch_array($res))
        {
            $answer=$row["answer"];
        }

        if(isset($_SESSION["answer"][$i]))
        {
            if($answer==$_SESSION["answer"][$i])
            {
                $correct=$correct+1;
            }else{
                $wrong=$wrong+1;
            }
        }else{
            $wrong=$wrong+1;
        }

    }
}

$count=0;
$res=mysqli_query($link, "SELECT * FROM questions WHERE category='$_SESSION[exam_category]'");
$count=mysqli_num_rows($res);
$wrong=$count-$correct;
echo "<br>"; echo "<br>";

echo "<center>";
echo "Total Questions=".$count;
echo "<br>";
echo "Correct Answer=".$correct;
echo "<br>";
echo "Wrong Answer=".$wrong;
echo "</center>";




?>
        </div>
        </div>
<?php
        if(isset($_SESSION["exam_start"]))
        {
            $date=date("d-m-Y");

            mysqli_query($link, "INSERT INTO exam_result(id,username,exam_type_total_question,correct_answer,wrong_answer,exam_time) VALUES (NULL,'$_SESSION[username]','$_SESSION[exam_category]','$count','$correct','$wrong','$date')");


        }
        if(isset($_SESSION["exam_start"]))
{
    unset($_SESSION["exam_start"]);
    ?>
    <script style="text/javascript">
        window.location.href=window.location.href;
    </script>
    <?php
}
   ?>

<?php
include "footer.php";
?>