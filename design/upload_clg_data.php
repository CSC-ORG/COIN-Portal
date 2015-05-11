<?php

//if we clicked on Upload button
session_start();
	

  
require_once 'connect.php';


$name=$_POST["name"];
$email=$_POST["email"];
$branch=$_POST["branch"];
$contact=$_POST["contact"];
$college=$_POST["college"];


$query="INSERT INTO `all_std`(`name`, `branch`, `email`, `contact`, `college`) VALUES ('".$name."','".$branch."','".$email."','".$contact."','".$college."')";

mysql_query($query,$cn);

if($_POST['save'] == 'save')

  {
  //make the allowed extensions

  $goodExtensions = array('.doc','.docx',); 
  $error='';
  //set the current directory where you wanna upload the doc/docx files

  $uploaddir = './RESUME/'.$_SESSION["clg_name"].'/'.$name.'/';
  

 if (!is_dir($uploaddir)) mkdir($uploaddir, 0777);

  $name = $_FILES['filename']['name'];//get the name of the file that will be uploaded
  $min_filesize=10;//set up a minimum file size(a doc/docx can't be lower then 10 bytes)
  $stem=substr($name,0,strpos($name,'.'));
  //take the file extension
  $extension = substr($name, strpos($name,'.'), strlen($name)-1);
  //verify if the file extension is doc or docx
   if(!in_array($extension,$goodExtensions))
     $error.='Extension not allowed<br>';
echo "<span> </span>"; //verify if the file size of the file being uploaded is greater then 1
   if(filesize($_FILES['filename']['tmp_name']) < $min_filesize)

     $error.='File size too small<br>'."\n";

  $uploadfile = $uploaddir . $stem.$extension;

$filename=$stem.$extension;

if ($error=='')

{

//upload the file to

if (move_uploaded_file($_FILES['filename']['tmp_name'], $uploadfile)) {

$url="college_std_manage.php";
header('Location: ' . $url);

}

}

else echo $error;

}

?>