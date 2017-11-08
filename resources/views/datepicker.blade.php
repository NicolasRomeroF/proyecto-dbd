


<html>
<head>
    <title>Datepicker</title>
 

 
</head>
<body>
<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

<div class="container">
	<div class="row">
		<h2> Jquery datepicker for date of birth</h2>
		<form>
    		<div class="form-group">
    			<label>Name</label>
    		    <input type="text" class="form-control"  placeholder="Enter Here">
    		</div>
    		<div class="form-group">
    			<label>Date Of Birth</label>
    		    <input type="text" id="datepicker" class="form-control" placeholder="Choose">
    		</div>
    	</form>
	</div>
</div>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
 $(function() {
        $( "#datepicker" ).datepicker({
            dateFormat : 'mm/dd/yy',
            changeMonth : true,
            changeYear : true,
            yearRange: '-100y:c+nn',
            maxDate: '-1d'
        });
    });
 </script>
</body>
</html>