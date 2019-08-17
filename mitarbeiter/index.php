<?php
session_start();
?>
<html>
<head>
<meta http-equiv="Content-Language" content="de">
<meta http-equiv="Content-Type" content="text/html; charset=windows-1252">
<meta name="GENERATOR" content="Microsoft FrontPage 4.0">
<meta name="ProgId" content="FrontPage.Editor.Document">
<title>Zugang Mitarbeiter</title>
<style><!--	a:hover	{color:red;}
				a			{text-decoration:none;}
//--></style>
<title>Anmeldung</title>
<base target="_self">
</head>




<?php 
   
    

echo $form="<form  name=''  action='index.php' method='POST'>"; ?>



<body <?php echo $bgcolor; ?> link="#000000" vlink="#000000" alink="#000000" topmargin="30">

 <?php 
 

 
 
 include("../intern/mysql_connect_gscheiderle.php");
include("../intern/parameter.php");
include("../intern/css/schriften.css");


  
//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
}
$_SESSION['zufall_id'] = $zufall_id;


      

$skonto_datum=strtotime("$datum");
 ?>       
 
 <p align="center">&nbsp;</p>
<div align="center">
  <center>
  <table border="0" width="700" height="400" cellspacing="1" bgcolor="">
    <tr>
      <td width="100%" align="left" valign="top" bgcolor=""><b><br><br>
       <?php  echo "<h1>Login und</h1><h2></h2>
       <h1>Passwort eingeben:</h1>"; ?>
        </b><br><br>
<?php  echo "<h2>Login-Name:</h2>"; ?>
          <p><input type="text" name="email" size="20" tabindex="1" value=""><br><br>
          <?php  echo "<h2>Passwort:</h2>"; ?>
          <input type="password" name="password" size="20" tabindex="2" value="">&nbsp;</p><br><br>
          <p><input type="submit" value="einloggen" name="password_selec" style=" text-align: center; border: 0px; border-color:; width:250px; height:30px; background-color:#D20124;border-width:0;font-family: Open Sans; font-size: 18px; font-weight: 700; color:#FFFFFF;border-radius: 6px 6px 6px 6px;"></p>
          <br><br>

<?php


//password-eingabe erwarten 
if (($_POST['password'] != "") && ($_POST['email'] != "")){
$_POST['password']=md5($_POST['password']);


//password und email abfrage
$connect=mysqli_query($link,"select eigentuemer, password, email  from passwords
where password = '$_POST[password]' and email = '$_POST[email]' and zugang = 'mitarbeiter' or 
password = '$_POST[password]' and email = '$_POST[email]' and zugang = 'admin' ");
while ($selec = mysqli_fetch_array($connect, MYSQLI_BOTH )) {
$eigentuemer_db = "$selec[eigentuemer]";
$password_db = "$selec[password]";
$email_db = "$selec[email]";
}

/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
$email_select=mysqli_query($link,"select kd_nr, email, email_code from adressen where email = '$email_db'");
while($result_email=mysqli_fetch_array($email_select, MYSQLI_BOTH )){
$kd_nr_db=$result_email['kd_nr'];
$email_code_db=$result_email['email_code'];
$session_email=$result_email['email'];
}



//zufallszahl erzeugen
if (!(preg_match("/^[a-z0-9]{32}/", $zufall_id))){
srand ((double)microtime()*1000000);
$zufall_id = md5(uniqid(rand()));
} 
$vorne=substr("$zufall_id",0,13);
$hinten=substr("$zufall_id",13,19);
$breackiex.=$hinten;
$breackiex.=$kd_nr_db;
$breackiex.=$vorne;

///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////





    


if ( ( $email_db == $_POST['email'] ) && ($password_db == $_POST['password'] ) ) {
$_SESSION['password_db']=$password_db;
$_SESSION['email_db']=$email_db;
$session_id=session_id();
mysqli_query($link,"update passwords set sessionid = '$session_id' where password = '$_POST[password]' ");

echo "
&nbsp;<br>
</td></tr>

      <tr><button type='submit' name='zur_auswahl'>
        <td width=\"100%\" height=\"50\" align=\"right\" valign=\"middle\" colspan=\"2\" bgcolor=\"red\">
        <p align=\"center\"><font size=\"5\"><b>
        
        <a href=\"auswahl.php?homer=$eigentuemer_db&breackiex=$breackiex&rev=$email_code_db&session_email=$session_email\" target=\"_blanc\"><font color=\"#FFFFFF\">Hier geht's weiter !</a>
   
        
        </td></button>
     </tr>

  <tr><td>
  <table border=\"0\" width=\"100%\" height=\"\" bgcolor=\"#C0C0C0\">
  </table>";
  }
  
  
  
  } 

  ?>


            </center>
          </div>
  
  
  
</form>
            </td>
          </tr>
        </table>
      </center>
    </div>
  </body>
</html>
