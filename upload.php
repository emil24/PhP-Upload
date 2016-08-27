<?php
$name = $_FILES['photo']['name'];

$tmp_name = $_FILES['photo']['tmp_name'];

$targetFile = 'upload/' . date("ymdh") . $name; 
$imageFileType = pathinfo($targetFile, PATHINFO_EXTENSION); 
$listF = fopen('list.txt', 'a+'); 


session_start();
if (isset($name)) {
	if (!empty($name) && !empty($_POST['name']) && !empty($_POST['surname'])) {	
		if ($size < 500 * 1024) {	
			if ($imageFileType == 'png' || $imageFileType == 'jpg' || $imageFileType == 'gif') {	
				move_uploaded_file($tmp_name, $targetFile); 
				$info = $_POST['name'] . '|' . $_POST['surname'] . '|' . $targetFile . "@@@###@@@";	
				fwrite($listF, $info);
			}
			else {
				$_SESSION['error'] = "*";
			}
		}
		else {
			$_SESSION['error'] = '*Sheklin hecmi 500 kb dan az olmalidi';
		}
	}
	else {
		$_SESSION['error'] = '*boshluq buraxmayin';
	}	
}
fclose($listF);
header('Location:index.php');
?>