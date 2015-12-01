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
    
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
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
        <div  style="position: absolute; top: 40%;left: 40%;margin-top: -50px;margin-left: -50px;width: 500px;height: 100px;">
	        <div class="col-md-6">
	            <h1>Authentification</h1><br />
	        	<div class="form-group has-success">
	                <label class="control-label" for="inputSuccess">Nom d'utilisateur</label>
	                <input type="text" id="login" class="form-control">
	            </div>
                <label class="control-label-label" id="error" style="visibility:hidden;color:red;">Erreur d'authentification</label>
	            <br /><button type="reset" class="btn btn-primary" onclick="addPersonne()">Connexion</button>
	        </div>
        </div>
    </div>
   
</body>
</html>
