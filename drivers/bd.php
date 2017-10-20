<?php
$host = '127.0.0.1:3306'; // '127.0.0.1'
$db = 'orders';
$user = 'root';
$pass = '';
$charset = 'utf8';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$opt = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];
$pdo = new PDO($dsn, $user, $pass, $opt);

function pdoSet($allowed, &$values, $source = array())
{
    $set = '';
    $values = array();
    if(!$source) $source = &$_POST;
    foreach($allowed as $field)
    {
        if(isset($source[$field]))
        {
            $set .= "`" . str_replace("`", "``", $field) . "`" . "=:$field, ";
            $values[$field] = $source[$field];
        }
    }   
    return substr($set, 0, -2);
}
?>