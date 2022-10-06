<?php
    $loggedIn = "none";
    $firstName = "";
?>

<style>
    .navListItem2 {
        display: <?php echo "$loggedIn" ?>;
    }
</style>

<?php
    session_start();

    if (isset($_SESSION["firstName"])){
        $firstName = $_SESSION["firstName"];
        $loggedIn = "unset";
        $loggedIn2 = "none";
        
        
    } else {
        
        
    }

?>

    <ul class="navList">
        <li class="navListItem"><a href="index.php" class="navListItemText">Home</a></li>
        
        
        <li class="navListItem"><a href="report.php" class="navListItemText">Report</a></li>
        <li class="navListItem"><a href="content.php" class="navListItemText">Content</a></li>
    </ul>
    <ul class="navList2">
        <li class="navListItem2"><a class="navListItemText"><?php echo "Welcome ". $firstName; ?> </a></li>
        <li class="navListItem2"><a href="booking.php" class="navListItemText">Booking</a></li>
        <li class="navListItem2"><a href="basket.php" class="navListItemText">Basket</a></li>
        <li class="navListItem2"><a href="account.php" class="navListItemText">Account</a></li>
        <li class="navListItem2"><a href="logout.php" class="navListItemText">Logout</a></li>

        <li class="navListItem3"><a href="loginRegister.php" class="navListItemText">Login/Registration</a></li>

        <!-- Once logged in need to change from "login/register" to "Account"  -->
    </ul>

    

<style>
    .navListItem2 {
        display: <?php echo "$loggedIn" ?>;
    }
    .navListItem3 {
        display: <?php echo "$loggedIn2" ?>;
    }
</style>
