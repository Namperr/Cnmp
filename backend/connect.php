<?php
$server ='localhost';
$user ='root';
$pass ='';
$database = 'website';
$conn= new mysqLi($server,$user,$pass,$database);
if($conn){
    mysqLi_query($conn,"SET NAME ‘utf8’ "); 
}
?>