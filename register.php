<?php include_once('connection.php'); ?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="css/style.css">
		<link href="https://fonts.googleapis.com/css?family=Poppins" rel="stylesheet">
			<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta charset="utf-8">
	</head>
	<body>
		<img src="images/mega_logo.png" alt= "no-image" class="logo">
		<h4>New User? Register Now!</h4>
				
		<div class="form-box">
			<form id="myForm">
				<input type="text" name="uname" id="uname" onKeyPress="return isAlphaKey(event)" placeholder="Username" autocomplete="off"> <br> <br>
				<input type="password" name="pwd" id="pwd" placeholder="Password"> <br> <br>
				<input type="button" name="save-btn" value="Register" onclick="save_data()">
			</form>
			<div id="my_data"></div>
		</div>
		<div class="login-part">
			<p>Already have an account? Then <a href="login.php">Login</a></p>
		</div>
	</body>
</html>
<script>
	function save_data(){
		var uname = document.forms["myForm"]["uname"].value;
		var pwd = document.forms["myForm"]["pwd"].value;
		var str="User Exists";
		if (uname == "") {
        	alert("Name must be filled out");
        	return false;
    	}
    	uname=uname.trim();
    	if(uname.length<5){
    		alert("Insufficient Characters");
        	return false;
    	}
    	if (pwd == "") {
        	alert("Password must be filled out");
        	return false;
    	}
    	pwd=pwd.trim();
    	if(pwd.length<5){
    		alert("Insufficient Characters");
        	return false;
    	}

		$.ajax({
			url:'register_db.php',
			type:'POST',
			dataType:'html',
			data:{
				'action':'save',
				'uname':uname,
				'pwd':pwd
			},
			success :function(data){
				if(str==data){
					$('#my_data').html(data);
					$('#myForm')[0].reset();
				}
				else{
					$('#my_data').html(data);
					$('#myForm')[0].reset();
				}
			}
		});
	}
	function isAlphaKey(evt){		
    	var charCode = evt.which || event.charCode || event.char;
        if ((charCode < 65 || charCode > 90) && (charCode < 97 || charCode > 122))
        return false;
    
    	return true;
      }


</script>
<script src="jquery.min.js"></script>