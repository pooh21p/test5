<?php

ini_set("display_errors", 1);
error_reporting(-1);

echo "7777";

	$limit=(int)$_REQUEST['limit'];
	if($limit<1)
		$limit=7;
	
	
function nok($a, $b){
	
	return $a*$b/nod($a, $b);
}

function nod($a, $b){
	while($a!=$b){
		if($a>$b)
			$a-=$b;
		elseif($a<$b)
			$b-=$a;
		
	}
	return $a;
}

	//$amin=($p1+$p2)*9;
	
//echo 'Подбор минимума. При каждой перезагрузке разные результаты, экспериментируйте!';
	$res=array();


for($i=1; $i<=$limit;$i++){
	
for($j=1; $j<=$i;$j++){
	$s1=nok($i,$j);
	if($s1+$i+$j>$limit)
		continue;
for($k=1; $k<=$j;$k++){

	$s=nok($i,$j)+nok($j,$k)+nok($k,$i);
	if($s<=$limit && !isset($res[$s])){
		$res[$s]="$i,$j,$k";
//echo "<BR><B>".__FILE__." (".__LINE__.")</B><BR><div align=left color=green><PRE>"; print_r($res); echo "</PRE></div>"; 	
	}
}
}

//echo $i.'--';
}

	ksort($res);

echo '<table border=1 cellpadding=5>';
//echo "<tr><td> x </td> <td> angle </td> <td> a1 </td>  <td> a2 </td>  <td> a </td>  <td> a^2 </td> </tr>";	

	foreach($res as $k=>$v){
		
		echo "<tr><td> $k </td> <td> $v </td> </tr>";	
		
	}


echo '</table>';

echo 'Не входят: ';
for($i=1; $i<=$limit;$i++){
	if(!isset($res[$i]))
		echo " $i ";
}
