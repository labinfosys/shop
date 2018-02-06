<?php
include 'functions.php';
?>

<?php 
    h('Функции'); 
    h('Функции', 3); 
?>

<?php hr(); ?>

<?php 
    $host = getHost(); 
    echo $host;
    hr();
    a('home');
    a(' about', 'about');
?>
