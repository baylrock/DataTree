<?php
	$start_dir = ".";
    $data = cleanUpDir(scandir($start_dir));
    $data = checkDirs($data);
	$json_data = json_encode($data);
    buildJson($json_data);

/**
 * @param $dir Dirs array for looking for other dirs in array
 * @return mixed returns checked array
 */
function checkDirs($dir) {
    foreach ($dir as $key => $value)
    if (is_dir($value)) {
        $dir[$key] = checkDirs(cleanUpDir(scandir($dir[$key])));
        $dir[$key]['name'] = $value;
    }
    return $dir;
}


/**
 * @param $dir Array that filed by elements path that placed in dir
 * @return mixed Cleared array from trash elements
 */
function cleanUpDir($dir) {
    foreach ($dir as $i => $value) {
        if ($value == "." || $value== "..") {
            unset ($dir[$i]);
        }
    }
    return $dir;
}

/**
 * @param $data Data for building JSON file
 */
function buildJson($data) {
    $fp = fopen('ex.json', 'w');
    fwrite($fp, $data);
    fclose($fp);
}

echo $json_data;
?>