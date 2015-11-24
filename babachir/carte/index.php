<?php session_start();?>



<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8" />
        <title> Autentification  </title>
        <script src="../../js/jquery.min.js" ></script>
       
        <link rel="stylesheet" href="style.css" />
    </head>
    <body>
        <header>
        <div>
        
            <h3> Autentification </h3>
        </div>
        </header>

        <section style="width:100%;">
        
            <form class="auth">
                     <b id="msg" style="color:red;display:none;"> Nom inexistant, réessayez </b>
                    <p>
                    <label>Nom</label> : <input  id="username" type="text" name="email" />
                    </p>
                    
                    <a class="bt-blue" href="#" onclick="auth();return false;"> Connexion </a>
        
            </form>
        
        </section>
    
    <script type="text/javascript">

    function auth()
    {

    
    var username = document.getElementById('username').value;
    
    //alert(username);
    getIfAuth({"nom":username});
    

    }



    function getIfAuth(data){
    data.table = "auth";
    $.get('../php/c.php',
            data,
                function(html){
                
                resulta = html;
                console.log(resulta);
                  if(resulta)
                  {
                    document.location.href="carte.php"; 
                  }   
            
            }); 
}

    </script>
    </body>
    

</html>
