<?php session_start();

if (!isset($_SESSION['admin'])) {
// header('Location: index.php'); 

}


?>

<!DOCTYPE html>
<html>
<head>
    <title>W2UI Demo: grid-6</title>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css"/>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
</head>
<body>

<h1 style="width: 30%; height: 40px;margin: auto; text-align:center">update and delete users</h1>


<div id="grid" style="width: 40%; height: 260px;margin: auto;"></div>
<br>

<div style="width: 40%; height: 260px;margin: auto;">
    <button class="btn" onclick="deletePersonne(w2ui.grid.getSelection());">delete</button>
    <br/>
    <br/>
    <button class="btn" onclick="updatePersonne(w2ui.grid.getSelection());">update</button>
    <label>Nom</label> : <input id="username" type="text" name="email"/>

    <div>
        <br/>
        <a class="btn" href="admin.php">Back</a>

        <script type="text/javascript">


            function deletePersonne(id) {

                var data = {'table': "deletepersonne", 'id_perso': id};

                $.get('../php/c.php',
                    data,
                    function (html) {
                        window.location.reload();

                    });
            }


            function updatePersonne(id) {
                var nom = document.getElementById("username").value;
                var data = {'table': "updatepersonne", 'id_perso': id, 'nom': nom};

                $.get('../php/c.php',
                    data,
                    function (html) {
                        window.location.reload();

                    });
            }


            getPersonne();


            var array = [];


            function getPersonne(data) {

                var data = {'table': "getpersonne"};
                $.get('../php/c.php',
                    data,
                    function (html) {
                        Sites = JSON.parse(html);
                        Sites.forEach(function (s) {
                            array.push({recid: s['id_perso'], name: s['nom']});


                        })


                        $(function () {
                            $('#grid').w2grid({
                                name: 'grid',
                                show: {selectColumn: true},
                                multiSelect: false,
                                columns: [
                                    {field: 'recid', caption: 'ID', size: '30px'},
                                    {field: 'name', caption: 'Name', size: '40%'},
                                    ,
                                    ,
                                ],
                                records: array
                            });
                        });


                    });


            }


        </script>

</body>
</html>