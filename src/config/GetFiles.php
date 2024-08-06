<?php
$directory = 'uploads/';
$files = array_diff(scandir($directory), array('..', '.'));

$fileList = [];
foreach ($files as $file) {
    $fileList[] = ['name' => $file, 'path' => $directory . $file];
}

header('Content-Type: application/json');
echo json_encode($fileList);
?>
