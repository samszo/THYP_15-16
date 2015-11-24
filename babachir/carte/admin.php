<?php session_start();

if (!isset($_SESSION['admin'])) {
// header('Location: index.php'); 

}


?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8"/>
    <title> Admin </title>
    <script src="../../js/jquery.min.js"></script>

    <link rel="stylesheet" href="style.css"/>
</head>
<body>
<header>
    <div>

        <h3> Admin </h3>
    </div>
</header>

<section style="width:100%;">


    <a class="bt-blue" href="createuser.php"> Create user </a>
    <a class="bt-blue" href="updateuser.php"> update/delete user </a>

</section>

<script type="text/javascript">


</script>
</body>


</html>
