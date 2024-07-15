<?php
include "../konek.php";
$id=$_GET["id"];
mysqli_query($link, "DELETE FROM materi WHERE id=$id");
?> 

<script type="text/javascript">
            window.location.href="add_materi.php";
        </script>