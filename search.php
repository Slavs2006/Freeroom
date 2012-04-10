<?php
ini_set("max_execution_time", "1000");

function get_answer_index($selectDay, $numbPara)
{
	$selectDay=explode('_',$selectDay);
	if ($selectDay[0]=="odd") {$result=100;}
	else {$result=200;}
	switch ($selectDay[1])
		{		
			case "mon": {$result+=10;break;}
			case "tue": {$result+=20;break;}
			case "wed": {$result+=30;break;}
			case "thu": {$result+=40;break;}
			case "fri": {$result+=50;break;}
			case "sat": {$result+=60;break;}
			case "sun": {$result+=70;break;}
			default:{break;}
		};
	$result+=$numbPara;
	return $result;
}

function init_answer_string()
{
	$nummer_aud = " ";
	$Link = mysql_connect('localhost','root','root');
//	echo "<b>Connect to server MySQL is ready ^_^ </b><br>";
	@mysql_query("SET NAMES 'cp1251'", $Link);
	if ($Link)
	{
	//	echo "<b>Connect to server MySQL is ready ^_^ </b><br>";
		if (mysql_select_db('univercity'))
		{
	//		echo "<b>DB 'univercity' has been select ^_^ </b><br> <hr>";
			$sql = "SELECT `nummer_aud` FROM `auditory` WHERE `id_adress` = 1";
			$resourceOfQuery = mysql_query($sql);
			while ($stringOfAnswer = mysql_fetch_array($resourceOfQuery, MYSQL_ASSOC))
					{
						foreach($stringOfAnswer as $elemOfStr)
						{
							$nummer_aud = $nummer_aud." ".$elemOfStr;
						}
					}
		}
	}
	return $nummer_aud;
}

$odd_w=$_POST["odd_week"];
$eve_w=$_POST["even_week"];
$tim_s=$_POST["time_set"];
//$odd_w = array("true","true","true","true","true","true","false","false");
//$eve_w=array("true","true","true","true","true","true","false","false");
//$tim_s=array("true","true","true","true","true","true","false","false");
$allSelectDay = ""; //строка со списком выборки дней

for($i=1;$i<8;$i++)
{
	if ($eve_w[$i]=="true")
	{
		$week="even_";
		switch ($i)
		{		
			case 1: {$day="mon";break;}
			case 2: {$day="tue";break;}
			case 3: {$day="wed";break;}
			case 4: {$day="thu";break;}
			case 5: {$day="fri";break;}
			case 6: {$day="sat";break;}
			case 7: {$day="sun";break;}
			default:{break;}
		};
		$allSelectDay = $allSelectDay.$week.$day."|";
	}
	if ($odd_w[$i]=="true")
	{
		$week="odd_";
		switch ($i)
		{		
			case 1: {$day="mon";break;}
			case 2: {$day="tue";break;}
			case 3: {$day="wed";break;}
			case 4: {$day="thu";break;}
			case 5: {$day="fri";break;}
			case 6: {$day="sat";break;}
			case 7: {$day="sun";break;}
			default:{break;}
		};
		$allSelectDay = $allSelectDay.$week.$day."|";
	}
	if ($tim_s[$i]=="true")
	{
		switch ($i)
		{		
			case 1: {$para=1;break;}
			case 2: {$para=2;break;}
			case 3: {$para=3;break;}
			case 4: {$para=4;break;}
			case 5: {$para=5;break;}
			case 6: {$para=6;break;}
			case 7: {$para=7;break;}
			default:{break;}
		};
	}
}
//echo $allSelectDay;





$Link = mysql_connect('localhost','root','root');
mysql_query("SET NAMES 'cp1251'", $Link);
//mysql_select_db('wwwunderversru_dev',$Link) or die(mysql_error());

if ($Link)
{
	//echo "<b>Connect to server MySQL is ready ^_^ </b><br>";
	if (mysql_select_db('univercity',$Link))
	{
	//	echo "<b>DB 'univercity' has been select ^_^ </b><br> <hr>";
		$allSelectDay=explode('|',$allSelectDay);
	//	echo "!!!!!!!!!!!!!!".count($allSelectDay)."!!!!!!!!!!!";

		for ($k=0; $k<count($allSelectDay)-1; $k++)
		{
			for ($i=1; $i<8; $i++)
			{

				if ($tim_s[$i]=="true")
				{

					$listOfAud=init_answer_string();
					$sql = "SELECT `id_aud` FROM `".$allSelectDay[$k]."` WHERE (`nummer_paar` = ".$i." AND `id_adress` = 1)";
				//	echo "||||||||||||".$sql."|||||||||||";
					$resourceOfQuery = mysql_query($sql);
					while ($stringOfAnswer = mysql_fetch_array($resourceOfQuery, MYSQL_ASSOC))
					{
						foreach($stringOfAnswer as $elemOfStr)
						{
							$id_aud = $elemOfStr;
							$sql = "SELECT `nummer_aud` FROM `auditory` WHERE `id_aud` = ".$id_aud;
							$resourceOfQuery_2 = mysql_query($sql);
							while ($stringOfAnswer_2 = mysql_fetch_array($resourceOfQuery_2, MYSQL_ASSOC))
							{
								foreach($stringOfAnswer_2 as $elemOfStr_2)
								{
									$nummer_aud = $elemOfStr_2;
									$listOfAud=str_replace($nummer_aud,"",$listOfAud);
								}
							}
						}
					}
					$answerId=get_answer_index($allSelectDay[$k], $i);
					$answerArray[$answerId]=$listOfAud;
					//echo $answerArray[$answerId];
				}
			}
		}			
	}				
}

echo json_encode($answerArray);

?>