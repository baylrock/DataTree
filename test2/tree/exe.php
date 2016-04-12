<?php
header('Content-type: text/html; charset=utf-8');
setlocale(LC_ALL, 'uk_UA.KOI8-U');
$_POST['dir'] = urldecode($_POST['dir']);
$root         = "./";
//$dir          = isset($_POST['dir']) ? iconv('utf-8', 'cp1251', $_POST['dir']) : '';

$dir .= "/";
$dir          = str_replace("..", ".", $dir);
$dir          = str_replace("//", "/", $dir);


//die ("".$root.$_POST['dir']);
if (file_exists($root.$dir)) {
	$files = scandir($root.$dir);
	//var_dump ($files);
	natcasesort($files);
	if (count($files) > 2) { /* The 2 accounts for . and .. */
		echo "<ul class=\"jqueryFileTree\" style=\"display: none;\">";
		// All dirs
		//print_r($files);
		foreach ($files as $file) {
			if (file_exists($root.$dir.$file) && $file != '.' && $file != '..' && is_dir($root.$dir.$file)) {
				echo "<li class=\"directory collapsed\"><a href=\"#\" rel=\"".htmlentities($dir.$file)."/\">".htmlentities($file)."</a></li></br>";
			}
		}
		// All files
		foreach ($files as $file) {
			if (file_exists($root.$dir.$file) && $file != '.' && $file != '..' && !is_dir($root.$dir.$file)) {
				$ext = preg_replace('/^.*\./', '', $file);
				echo "<li class=\"file ext_$ext\"><a href=\"#\" rel=\"".htmlentities($dir.$file)."\">".htmlentities($file)."</a></li></br>";
			}
		}
		echo "</ul>";
	}
}