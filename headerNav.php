

    <ul class="navList">
        <li class="navListItem"><a href="index.php" class="navListItemText">Home</a></li>
        <li class="navListItem"><a href="loginRegister.php" class="navListItemText">Login/Registration</a></li>
        <li class="navListItem"><a href="booking.php" class="navListItemText">Booking</a></li>
        <li class="navListItem"><a href="report.php" class="navListItemText">Report</a></li>
    </ul>
    <ul class="navList2">
        <li class="navListItem2"><a href="basket.php" class="navListItemText">Basket</a></li>
        <li class="navListItem2"><a href="account.php" class="navListItemText">Account</a></li>
        <!-- Once logged in need to change from "login/register" to "Account"  -->
    </ul>

    <?php
    session_start();

    if (isset($_SESSION["firstName"])){
        echo "<h1> Welcome " . $_SESSION["firstName"] . "</h1>";
        echo '<a href="logout.php">Logout</a>';
        
    } else {
        echo "<h1>Welcome Guest </h1>";
        
    }

?>

