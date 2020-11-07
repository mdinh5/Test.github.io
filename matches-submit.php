<?php include("top.html"); ?>


<?php
$textFile = file_get_contents("singles.txt");
$singles = explode("\n", $textFile);
$notInFile = false;

$userName = $_GET["name"];
$userInfo = array();
foreach ($singles as $people) {
	$userInfo = explode(",", $people);
	if($userInfo[0] == $userName){   
		break;
	}
}


function checkPersona($matchPersona, $userPersona){
	for($i=0; $i<4; $i++){
		if ($matchPersona[$i] == $userPersona[$i]){
			return true;
		}
	}
}


function createMatches(){
	global $singles;
	global $userInfo;
	$matches = $singles;
	$arraySize = sizeof($matches);
	
	for ($i=0; $i<$arraySize; $i++){
		$matchInfo = explode(",", $matches[$i]);
		$location = $i+1;
		if ($matchInfo[1] == $userInfo[1]){
			unset($matches[$i]); 
		}
		else if ($matchInfo[4] != $userInfo[4]){
			unset($matches[$i]); 
		}
		else if (($matchInfo[2] < $userInfo[5] || $matchInfo[2] > $userInfo[6]) || ($userInfo[2] < $matchInfo[5] || $userInfo[2] > $matchInfo[6])){
			unset($matches[$i]); 
		}
		else if (!checkPersona(str_split($matchInfo[3]), str_split($userInfo[3])))
		{
			unset($matches[$i]); 

		}
	}
	$matches = array_values($matches); 
	return $matches;
}


function displayMatches(){
	$matches = createMatches();
	for ($i=0; $i<sizeof($matches); $i++) {
		$rawMatch = explode(",", $matches[$i]);
		printMatches($rawMatch);
	}
}


function printMatches($rawMatch){
	echo "<div class='match'>
		<p><img src='img/user.jpg' alt='user icon' />
		" . $rawMatch[0] . "</p>
		<ul>
			<li><strong>gender:</strong>" . $rawMatch[1] . "</li>
			<li><strong>age:</strong>" . $rawMatch[2] . "</li>
			<li><strong>type:</strong>" . $rawMatch[3] . "</li>
			<li><strong>OS:</strong>" . $rawMatch[4] . "</li>                        
		</ul>
		</div>";
}
?>
<?php
if(!isset($userName) || trim($userName) == '')
{
   include("Test.php");
   exit();
}
?>
<h1>Matches for <?=$userName?></h1>

<?php displayMatches();?>
	

<?php include("bottom.html"); ?>