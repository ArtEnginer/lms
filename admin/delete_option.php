<?php
include "../konek.php";

$id=$_GET["id"];

mysqli_query($link, "DELETE FROM toefl WHERE id=$id");
?> 

<script type="text/javascript">
            window.location.href="add_edit_exam_question.php";
        </script>