<?php include("top.html"); ?>


<?php
$userName = $_POST["name"];
$userData = $userName;
foreach ($_POST as $key => $value) {
	if ($key != "name"){
		$userData = $userData.",".$value;
	}
}

file_put_contents("singles.txt", "\n".$userData, FILE_APPEND);
?>
<?php
$userAge = $_POST["age"];
$userPersona = $_POST["persona"];
$userMinAge = $_POST["minage"];
$userMaxAge = $_POST["maxage"];
if(!isset($userName) || trim($userName) == '')
{
   include("Test.php");
   exit();
}
if(!isset($userAge) || trim($userAge) == '')
{
   include("Test.php");
   exit();
}
if(!isset($userPersona) || trim($userPersona) == '')
{
   include("Test.php");
   exit();
}
if(!isset($userMinAge) || trim($userMinAge) == '')
{
   include("Test.php");
   exit();
}
if(!isset($userMaxAge) || trim($userMaxAge) == '')
{
   include("Test.php");
   exit();
}
if($userMinAge>$userMaxAge)
{
include("Test.php");
   exit();
}
if($userMinAge < 0 || $userMinAge > 99 )
{
include("Test.php");
   exit();
}
if($userMaxAge < 0 || $userMaxAge > 99 )
{
include("Test.php");
   exit();
}
if($userPersona != 'ESTJ' && $userPersona != 'ESTP' && $userPersona != 'ESFJ' && $userPersona != 'ESFP' && $userPersona != 'ISTJ' && $userPersona != 'ISTP' && $userPersona != 'ISFJ' && $userPersona != 'ISFP' && $userPersona != 'ENTJ' && $userPersona != 'ENTP' && $userPersona != 'ENFJ' && $userPersona != 'ENFP' && $userPersona != 'INTJ' && $userPersona != 'INTP' && $userPersona != 'INFJ' && $userPersona != 'INFP')
{
   include("Test.php");
   exit();
}
?>
<div>
<h1>Thank you!</h1>
<p>
Welcome to NerdLuv, <?= $userName ?>!<br /><br />
Now <a href="matches.php">log in to see your matches!</a>
</p>
</div>

<?php include("bottom.html"); ?>