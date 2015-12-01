<!DOCTYPE html>
<html>
<head>
    <title>Accueil</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Free Bootstrap Admin Template : Binary Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />
    <script type="text/javascript" src="js/script.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>

    <style type="text/css">
      html, body { height: 100%; }
      #map { height: 100%; }
    </style>

   <style type="text/css">
        #fm{
          margin:0;
          padding:10px 30px;
        }
        .ftitle{
          font-size:14px;
          font-weight:bold;
          padding:5px 0;
          margin-bottom:10px;
          border-bottom:1px solid #ccc;
        }
        .fitem{
          margin-bottom:5px;
        }
        .fitem label{
          display:inline-block;
          width:80px;
        }
        .fitem input{
          width:160px;
        }
  </style>
</head>
<body>

    <div id="wrapper">
    	<nav class="navbar navbar-default navbar-cls-top " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Carto Game</a> 
            </div>
  			<div style="color: white;padding: 15px 50px 5px 50px;float: right;font-size: 16px;"> La dernière connexion : <?php setlocale (LC_TIME, 'fr_FR.utf8','fra'); echo (strftime("%A %d %B %Y"));  ?></div>
        </nav>   
        <!-- /. NAV TOP  -->
        <div id="score" style="display: absolute; top: 50%;
            left: 50%;
            margin-top: 50px;
            margin-left: 100px;
            width: 900px;
            height: 500px;">
            <div style="border:0px solid green;
            width:-100px;
            float:left;
            margin:2px 0 2px 2px;
            height:200px;">
              <table>
                  <tr>
                    <td>Utilisateur</td>
                  </tr>
                  <tr>
                    <td><input type="text" id="util" /></td>
                  </tr>
                  <tr>
                    <td>Document</td>
                  </tr>
                  <tr>
                    <td><img src="http://www.travlang.com/blog/wp-content/uploads/2010/04/arc-de-triomphe_11.jpg" style="width:160px;"></td>
                  </tr>
              </table>
            </div>
            <div id="map"></div>
            
           
        </div>

    </div>
   
</body>

    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBj0C_2XOJQWLmHSp-gb5CxC2OhxW5d_oA&callback=initMap">
    </script>
</html>
