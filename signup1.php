
<html> <head><script type="text/javascript">
        function check_field(id) {
            var field = document.getElementById(id);
             
            if (isNaN(field.value)

              ||   ( document.my_form.phone.value.length!=7))
			{
                alert('Enter a valid mobile no');
				return false;
            }
			return true;
        }
</script>

<script type="text/javascript">
        function check_field(id2) {
            var field = document.getElementById(id);
             
            if (isNaN(field.value)

              ||   ( document.my_form.phone.value.length!=7))
			{
                alert('Enter a valid mobile no');
				return false;
            }
			return true;
        }
</script> 

 
<script type="text/javascript">
        function check_field(id1) {
            var field = document.getElementById(id);
             
            if (isNaN(field.value)

              ||   ( document.my_form.phone.value.length!=5))
			{
                alert('Enter a valid mobile no');
				return false;
            }
			return true;
        }
</script> 




</head>
<title>Sign-Up</title>
  <link href="css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Loading Flat UI -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/flat-ui.css" rel="stylesheet">

    <link rel="shortcut icon" href="img/favicon.ico">

 </head> 
 <body id="body-color" background="standard.jpg"> <div id="Sign-Up"> 
 <fieldset style="width:30%"><legend>Registration Form</legend> 
 <table border="0"> <tr> <form method="POST" action="insert.php"> 
 <td>First Name</td><td> <input type="text" name="Fname" required maxlength="7" id="t_field" ></td> </tr> <tr>
 <td>Last Name</td><td> <input type="text" name="Lname" required  maxlength="7" id2="t_field"></td> </tr> <tr>
 <td>Birthdate</td><td> <input type="date" name="birthdate" required ></td> </tr> <tr> 
 <td>Email</td><td> <input type="text" name="email" required></td> </tr> <tr>
 <td>Password</td><td> <input type="password" name="pass" required></td> </tr> <tr>
 <td>City</td><td> <input type="text" name="city" required></td> </tr> <tr>
 <td>zip</td><td> <input type="number" name="zip" min="4" required maxlength="10"  id1="t_field"></td> </tr> <tr>
 <td>special code</td><td> <input type="number" placeholder="Enter only by artist"  name="scode"></td> </tr> <tr>
 <tr> <td><input id="button" type="submit" name="submit" value="Sign-Up"></td> </tr>
 </form> </table>
 </fieldset> 
 </div>

 </body> 
 </html>
 
 