<?php

if(!isset($_POST["register"])){
    echo "Не переданны данные для регистрации!";
    exit();
}

$conn = mysqli_connect("localhost:3306", "root","","cyb4"); 

$Login=$_POST['login'];
$PwdHash=hash("sha256", $_POST['password']);
$Email=$_POST['email'];
$UserName=$_POST['username'];

// Уезвимость msql Иньекции
//$sql = "INSERT INTO users (`Login`, `PwdHash`, `Email`, `UserName`) VALUES ('".$Login."', '".$PwdHash."', '".$Email."', '".$UserName."')";
$sql = "INSERT INTO users (`Login`, `PwdHash`, `Email`, `UserName`) VALUES (?, ?, ?, ?)";
$query = mysqli_prepare($conn, $sql);
mysqli_stmt_bind_param($query, 'ssss', $Login, $PwdHash, $Email, $UserName);

mysqli_stmt_execute($query);

mysqli_close($conn); 
echo "Вы успешно зарегестрированны";
?>
<br>
<a href="/cyb4/register.php">Вернуться назад</a>
