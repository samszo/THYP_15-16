<!DOCTYPE html>
<html>
<head>
    <title>W2UI Demo: grid-11</title>
    <link rel="stylesheet" type="text/css" href="http://w2ui.com/src/w2ui-1.4.2.min.css" />
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://w2ui.com/src/w2ui-1.4.2.min.js"></script>
</head>
<body>

<div id="grid" style="width: 100%; height: 200px"></div>
<br>
<button class="btn" onclick="addRecord()">Add One Record</button>
<button class="btn" onclick="removeRecords()">Remove Appended Records</button>
    
<label>
    <input type="checkbox" id="fixedsize" onclick="var grid = w2ui.grid; grid.fixedBody = this.checked; 
        if (this.checked) { grid.resize(null, '200px'); } else { grid.refresh(); }">
    Fixed Height
</label>

<script type="text/javascript">
$(function () {
    $('#grid').w2grid({ 
        name: 'grid', 
        show: { lineNumbers: true },
        fixedBody: false,
        columns: [                
            { field: 'lname', caption: 'Last Name', size: '30%' },
            { field: 'fname', caption: 'First Name', size: '30%' },
            { field: 'email', caption: 'Email', size: '40%' },
            { field: 'sdate', caption: 'Start Date', size: '90px' }
        ],
        records: [
           
        ]
    });    
});

function addRecord() {
    var g = w2ui['grid'].records.length;
    w2ui['grid'].add( { recid: g + 1, fname: 'Jin', lname: 'Franson', email: 'jdoe@gmail.com', sdate: '4/3/2012' } );
}

function removeRecords() {
    w2ui.grid.clear();
    w2ui.grid.records = [
        { recid: 1, fname: 'Jane', lname: 'Doe', email: 'jdoe@gmail.com', sdate: '4/3/2012' },
        { recid: 2, fname: 'Stuart', lname: 'Motzart', email: 'jdoe@gmail.com', sdate: '4/3/2012' }
    ];
    w2ui.grid.total = 2;
    w2ui.grid.refresh();
}
</script>

</body>
</html>