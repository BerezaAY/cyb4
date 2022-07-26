<?php

session_start();

$user = $_REQUEST["txtUser"];
$pwd = $_REQUEST["txtPwd"];
$hash = hash("sha256", $pwd);



// if($hash == "8d969eef6ecad3c29a3a629280e686cf0c3f5d5a86aff3ca12020c923adc6c92") {
// 	echo "<h1>Привет, $user!</h1>";
// }
// else{
// 	echo "<h2>Извините, неверный пароль!</h2>";
// } 

// Здесь нарушены все мыслимые нормы безопасности:
// 1.слабый пароль
// 2.нарушен принцип наименьших привилегий
// 3. секрет в коде
// $conn = mysqli_connect("localhost:3306", "root","","cyb4"); 

// 4. уязвимостость для SQL Injection
// $sql = "SELECT * FROM users WHERE Login='$user' AND PwdHash='$hash'";
// // echo $sql;
// $query = mysqli_query($conn, $sql);
// $result = mysqli_fetch_all($query);
// // var_dump($result);
// $numRows = count($result);
// // echo($numRows);

// устраняем проблему секрета в коде
// тем самым проблема слабого пароля и превышенного логина делегируется администратору производ
    // ственного сервера
$server = getenv("cyb4_db_server");
$login = getenv("cyb4_db_user");
$pwd = trim(getenv("cyb4_db_pwd")); //функция trim для получения пустого пароля вместо пробела 
$conn = mysqli_connect($server,$login,$pwd,"cyb4");

// Устраняем проблему SQL Injection
$sql = "SELECT * FROM users WHERE Login=? AND PwdHash=? ";
// запрос который умеет принимать параметры
$stat = mysqli_prepare($conn, $sql);
// передать параметры
mysqli_stmt_bind_param($stat, "ss", $user, $hash);
// выполнить выражение
mysqli_stmt_execute($stat);
// получить результат, проверить сколько в нем рядов
$result = mysqli_stmt_get_result($stat);
// функция, которая возвращает число рядом в полученном результате
$numRows = mysqli_num_rows($result); 


if ($numRows == 0){
    echo "<h2> Извините, неверный логин или пароль!</h2>";
}
else {
    echo "<h1>Привет, $user!</h1>";
    $_SESSION["user"] = $user;
}

mysqli_close($conn); 