<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<body>
		<a href="index1.html">Домашняя страница</a><br />
		<h1>Регистрация нового пользователя </h1>
        <form method="post" action="register_check.php" name="signup-form">
            <div class="form-element">
            <label>Ваше имя</label><br />
            <input type="text" name="username" required />
            </div>
                <div class="form-element">
            <label>Ваш E-mail</label><br />
            <input type="email" name="email" required />
            </div>
                <div class="form-element">
            <label>Ваш логин</label><br />
            <input type="text" name="login" required />
            </div>
                <div class="form-element">
            <label>Password</label><br />
            <input type="password" name="password" required />
            </div>
            <button type="submit" name="register" value="register">Зарегистрироваться</button>    
        </form>
        <p style="text-align: right;"><b>Автор:</b> Алексей Береза</p>
	</body>






</body>
</html>