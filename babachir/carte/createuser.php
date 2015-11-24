<?php session_start();

if (!isset($_SESSION['admin'])) {
// header('Location: index.php'); 

}


?>


<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.3.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.3.min.js"></script>
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

    <form class="auth">
        <b id="msg" style="color:red;"> Create a user </b>

        <p>
            <label>Nom</label> : <input id="username" type="text" name="nom"/>
        </p>

        <a class="bt-blue" href="#" onclick="createPersonne();return false;"> Create </a>
        <a class="btn" href="admin.php">Back</a>
    </form>


</section>


<script type="text/javascript">


    function popup() {
        w2popup.open({
            title: 'Popup Title',
            body: '<div class="w2ui-centered">Contacte created </div>'
        });
    }

    function createPersonne() {


        setPersonne({"nom": document.getElementById('username').value});


    }


    function setPersonne(data) {
        data.table = "personne";
        $.get('../php/c.php',
            data,
            function (html) {
                if (html) {
                    popup();
                }
            });
    }

</script>
</body>


</html>
