<?php
$servername = "localhost";
$username = "root";
$password = "";

try{
    
$conn = new PDO("mysql:host=$servername", $username,$password);
$conn->setAttribute(PDO::ATTR_ERRMODE, 	PDO::ERRMODE_EXCEPTION);
echo "Connected successfully";

$sql = "CREATE DATABASE shop";
$conn->exec($sql);
    
$conn->query("USE shop");

$sql = "CREATE TABLE user (
id_user INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
username VARCHAR(30) NOT NULL,
email VARCHAR(150) NOT NULL,
password VARCHAR(50)NOT NULL,
nivel int NOT NULL,
morada VARCHAR(150) NOT NULL,
phone INT,
nif INT)";
$conn->exec($sql);


$sql = "CREATE TABLE linha_encomenda (
id_ENCOMENDA INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_produto int NOT NULL,
quantidade int)";
$conn->exec($sql);

$sql = "CREATE TABLE transportadora (
id_transportadora INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome_transportadora VARCHAR(50))";
$conn->exec($sql);

$sql = "CREATE TABLE transporte (
id_trasporte INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
id_transportadora INT,
nome_transportadora VARCHAR(50))";
$conn->exec($sql);

$sql = "CREATE TABLE produto (
id_produto INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
nome VARCHAR(150),
descricao TEXT,
marca VARCHAR(50),
id_Categoria int,
stock int,
preco float,
cod_imagem int)";
$conn->exec($sql);

$sql = "CREATE TABLE imagem (
cod_imagem INT(6),
url varchar(300))";
$conn->exec($sql);

$sql = "CREATE TABLE categoria (
cod_categoria INT(6) PRIMARY KEY ,
categoria VARCHAR (300))";
$conn->exec($sql);

 $sql =  "CREATE TABLE encomenda (
id_encomenda INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
data_Encomenda DATE NOT NULL,
id_user INT(6) NOT NULL,
id_transporte INT NOT NULL,
preco_total FLOAT)";
    $conn->exec($sql);






}
    catch(PDOExeption $e)
{
    echo"Nabo";
}
?>
