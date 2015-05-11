<?php
session_start();

$path = $_SERVER['DOCUMENT_ROOT'].'/design/RESUME/'.$_SESSION["clg_name"].'/'.$_SESSION["name"].'/';//change path here of the root folder
$fullPath = $path.$_GET['name'];
if ($fdata = fopen ($fullPath, "r")) 
{    
    $fsize = filesize($fullPath);
    $path_parts = pathinfo($fullPath);
    $ext = strtolower($path_parts["extension"]);
    switch ($ext) 
    {
        case "jpg":
        case "gif":
        
        header("Content-type:application/image");
        
        break;
        case "pdf":
        header("Content-type:application/pdf");
        
        break;
        default:
        header("Content-type: application/octet-stream");
        
    }
    // use 'attachment' to force a download
    header("Content-Disposition: attachment;filename=\"
        ".$path_parts["basename"]."\"");  
               
    header("Content-length: $fsize");
    header("Cache-control:private");
    while(!feof($fdata)) 
    {
        $buffer = fread($fdata, 2048);
        echo $buffer;
    }
}
fclose ($fdata);
exit;
?>