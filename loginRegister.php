<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <script src="./app.js"></script>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'headerNav.html';?>
    <!-- <?php include 'header.html';?> -->
    <h1>Login/Register</h1>
    <div class="registerForm">
        <h2>Register</h2>
        <form action="" method="post" class="registerForm">
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" id="firstName">

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" id="lastName">

            <label for="Email">Email:</label>
            <input type="text" name="Email" id="Email">

            <label for="Email">Password:</label>
            <input type="password" name="Email" id="Email">

            <label for="gender">Gender:</label>
            <input type="text" name="gender" id="gender">

            <label for="age">Age:</label>
            <input type="text" name="age" id="age">

            <label for="Nationality">Nationality:</label>
            <input type="text" name="Nationality" id="Nationality">

            <br>
            <input type="submit" value="Submit">

        </form>
    </div>
        
    <div class="loginForm">
        <h2>Login</h2>
        <form action="" method="post" class="registerForm">
            <label for="Email">Email:</label>
            <input type="text" name="Email" id="Email">

            <label for="Email">Password:</label>
            <input type="password" name="Email" id="Email">

            <br>
            <input type="submit" value="Submit">

        </form>
    </div>

    






</body>
</html>