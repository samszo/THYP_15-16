<html>
<head>
	<title>Admin</title>
	<meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<!-- BOOTSTRAP STYLES-->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="assets/css/font-awesome.css" rel="stylesheet" />
     <!-- MORRIS CHART STYLES-->
    <link href="assets/js/morris/morris-0.4.3.min.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="assets/css/custom.css" rel="stylesheet" />

        
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>

	<script type="text/javascript" src="js/admin.js"></script>
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
        <!-- /. NAV TOP  -->
        <nav class="navbar-default navbar-side" role="navigation">
        	<div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
					<li class="text-center">
                    	<img src="assets/img/find_user.png" class="user-image img-responsive"/>
					</li>
				
					
                    <li>
                        <a onclick="addU()"><i class="fa fa-edit fa-3x"></i> Créer un utilisateur</a>
                    </li>
                    <li>
                        <a  onclick="gridU()"><i class="fa fa-list-alt fa-3x"></i> Liste des utilisateurs</a>
                    </li>
                    <li>
                        <a  onclick="addDoc()"><i class="fa fa-table fa-3x"></i> Créer un document</a>
                    </li>
					<li  >
                        <a  onclick="gridDoc()"><i class="fa fa-list-alt fa-3x"></i> Liste des documents</a>
                    </li>	
                    <li  >
                        <a onclick="gridScore()"><i class="fa fa-list-alt fa-3x"></i> Liste des scores</a>
                    </li>			
                </ul>
            </div>
        </nav>  

        <div id="addU" style="position: absolute; top: 50%;left: 50%;margin-top: -50px;margin-left: -50px;width: 500px;height: 100px;visibility:hidden;">
	        <div class="col-md-6">
	        	<div class="form-group has-success">
	                <label class="control-label" for="inputSuccess">Nom d'utilisateur</label>
	                <input type="text" id="login" class="form-control">
	            </div>
	            <button type="button" class="btn btn-primary" onclick="addPersonne()">Connexion</button>
	        </div>
        </div>

        <div id="gridU" style="position: absolute; top: 30%;left: 45%;margin-top: -50px;margin-left: -50px;width: 500px;height: 100px;visibility:hidden;">
			<div id="grid" style="width: 100%; height: 400px;"></div>
			<script type="text/javascript">

				$('#grid').w2grid({ 
					name: 'grid',
					url : {
							get    : './php/r.php?table=personnesw2ui',
							remove : './php/d.php?table=personnesw2ui',
							save : './php/u.php?table=personnesw2ui'
						},
					show: { 
						toolbar: true,
						footer: true,
						toolbarDelete: true,
						toolbarSave: true
					},
					columns: [                
						{ field: 'recid', caption: 'id', size: '80px', sortable: true, resizable: true },
						{ field: 'text', caption: 'nom', size: '300px', sortable: true, resizable: true, 
							editable: { type: 'text' }
						},
						{ field: 'check', caption: 'cocher', size: '100px', sortable: true, resizable: true, 
							editable: { type: 'checkbox' } 
						}],
					postData: {
						table : 'personnesw2ui'
					}
				});

			</script>
    	</div>

    	<div id="addDoc" style="position: absolute; top: 30%;left: 45%;margin-top: -50px;margin-left: -50px;width: 500px;height: 100px;visibility:hidden;">
			<h3 class="title-admin">Ajouter un document</h3>
				<div id="info-input">
					<div class="form-group has-success">
		                <label class="control-label" for="inputSuccess">Nom </label>
		                <input type="text" id="nom_document" class="form-control">
		            </div>

		            <div class="form-group has-success">
		                <label class="control-label" for="inputSuccess">Position </label>
		                <input type="text" id="latlng_document" class="form-control">
		            </div>

		            <div class="form-group has-success">
		                <label class="control-label" for="inputSuccess">Url document </label>
		                <input type="text" id="url_document" class="form-control">
		            </div>
					
					
					<div class="insert-row">
						<button onclick="insertDocument()" type="button" class="btn btn-primary">Ajouter</button>
					</div>
					
				</div>
				<div id="map"></div>
		</div>
		<div id="gridDoc" style="position: absolute; top: 30%;left: 45%;margin-top: -50px;margin-left: -50px;width: 500px;height: 100px;visibility:hidden;">
			<div id="griddocument" style="width: 100%; height: 400px;"></div>
			<script type="text/javascript">
				$('#griddocument').w2grid({ 
					name: 'griddocument', 
					url : {
						get : './php/r.php?table=documentsw2ui',
						remove : './php/d.php?table=documentsw2ui'
					},
					show: { 
						toolbar: true,
						footer: true,
						toolbarDelete : true,
						toolbarSave: true
					},
					columns: [                
						{ field: 'recid', caption: 'ID Document', size: '40px', sortable: true, resizable: true },
						{ field: 'text', caption: 'nom', size: '220px', sortable: true, resizable: true},
						{ field: 'position', caption: 'position', size: '240px', sortable: true, resizable: true},
						{ field: 'url', caption: 'link', size: '280px', sortable: true, resizable: true},
						{ field: 'check', caption: 'Cocher', size: '100px', sortable: false, resizable: true, editable: { type: 'checkbox' }} 
						]
				}); 
			</script>
		</div>

		<div id="gridScore" style="position: absolute; top: 30%;left: 45%;margin-top: -50px;margin-left: -50px;width: 500px;height: 100px;visibility:hidden;">
			<div id="gridscores" style="width: 100%; height: 400px;"></div>
			<script type="text/javascript">
				$('#gridscores').w2grid({ 
					name: 'gridscores', 
					url : {
						get    : './php/r.php?table=scoresw2ui',
						remove : './php/d.php?table=scoresw2ui'
					},
					show: { 
						toolbar: true,
						footer: true,
						toolbarDelete: true
					},
					columns: [                
						{ field: 'recid', caption: 'ID Score', size: '80px', sortable: true, resizable: true },
						{ field: 'text', caption: 'Login Github', size: '120px', sortable: true, resizable: true, editable: false},
						{ field: 'document', caption: 'Document', size: '240px', sortable: true, resizable: true, editable: false},
						{ field: 'distance', caption: 'Distance', size: '160px', sortable: true, resizable: true, editable: false},
						{ field: 'time', caption: 'Date', size: '140px', sortable: true, resizable: true, editable: false},
						{ field: 'check', caption: 'Cocher', size: '140px', sortable: false, resizable: true, editable: { type: 'checkbox' }} 
						]
				});    
			</script>
		</div>
</body>
</html>