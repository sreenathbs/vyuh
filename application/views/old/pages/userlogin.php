<?php
$this->load->helper('url');

$this->load->helper('file');


$data = 'Some file data';
if ( ! write_file('./login.txt', $data))
{
        echo 'Unable to write the file';
}
else
{
        echo 'File written!';
}



//$loginpage = fopen("../../user/login.php", "r") or die("Unable to open file!");
//echo fread($myfile,filesize("webdictionary.txt"));
//fclose($myfile);
