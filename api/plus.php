<?php

$x = $_REQUEST["x"]; 
$y = $_REQUEST["y"];
$z = $x + $y;
sleep(7); //симуляция задержки

// Здесь нарушены все мыслимые нормы безопасности:
// 1.слабый пароль
// 2.нарушен принцип наименьших привилегий
// 3. секрет в коде
$conn = mysqli_connect("localhost:3306", "root","","cyb4"); 

// 4. уязвимостость для SQL Injection
$sql = "INSERT INTO Calcs(Num1,Num2,User) VALUES($x,$y,'Anonym') ";
mysqli_query($conn, $sql);
mysqli_close($conn);

echo $z;
