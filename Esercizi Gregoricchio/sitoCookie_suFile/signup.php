<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>SignUP</title>
</head>
<body>
    <form action="register.php" method="POST" name="signup">
            <input type="email" name="mail"><br/>
            <input type="password" name="pwd"><br/>
            <input type="submit" name="signup">
    </form>
    <?php if (isset($_COOKIE['notValidate'])){
        echo "<h6> " . $_COOKIE['notValidate'] . "</h6>";
        }
    ?>
</body>
</html>