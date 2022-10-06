<?php include 'headerNav.php';?>
<?php include "./config/database.php"; ?>
<link rel="stylesheet" href="style.css">
<body>
<?php 
    $customerID = $_SESSION['customerID'];
    $sql = "SELECT * FROM customer WHERE customerID='$customerID'";
    $result = mysqli_query($conn,$sql);
    $customerDetails = mysqli_fetch_all($result, MYSQLI_ASSOC);

    $customerID = $_SESSION["customerID"];
    $sql = "SELECT * FROM booking WHERE customerID='$customerID' AND booked='1'";
    $result = mysqli_query($conn,$sql);
    $bookings = mysqli_fetch_all($result, MYSQLI_ASSOC);

    if (isset($_POST["updateInfo"])){
        $customerID = $_SESSION["customerID"];
        $firstName = filter_input(INPUT_POST, "firstName",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $lastName = filter_input(INPUT_POST, "lastName",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $password = filter_input(INPUT_POST, "password",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $gender = filter_input(INPUT_POST, "gender",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $age = filter_input(INPUT_POST, "age",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nationality = filter_input(INPUT_POST, "nationality",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $sql = "UPDATE customer SET 
            firstName='$firstName', 
            lastName='$lastName', 
            email='$email',
            password='$password', 
            gender='$gender',
            age='$age',
            nationality='$nationality'
             WHERE customerID='$customerID'";
        if (mysqli_query($conn, $sql)){
            
            header("Location: account.php");
        }
          else {
            echo "Error" . mysqli_error($conn);
        }
        
    }



?>
    <div class="customerDisplay">
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            
            <label for="firstName">First Name:</label>
            <input type="text" name="firstName" value=<?php echo $customerDetails[0]["firstName"]?> >

            <label for="lastName">Last Name:</label>
            <input type="text" name="lastName" value=<?php echo $customerDetails[0]["lastName"]?> >

            <label for="email">Email:</label>
            <input type="email" name="email" value=<?php echo $customerDetails[0]["email"]?> >

            <label for="password">Password:</label>
            <input type="password" name="password" value=<?php echo $customerDetails[0]["password"]?> >

            <label for="gender">Gender:</label>
            <input type="text" name="gender" value=<?php echo $customerDetails[0]["gender"]?> >

            <label for="age">Age:</label>
            <input type="number" name="age" value=<?php echo $customerDetails[0]["age"]?> >

            <label for="nationality">Nationality:</label>
            <input type="text" name="nationality" value=<?php echo $customerDetails[0]["nationality"]?> >







            
            <input type="submit" value="Update information" name="updateInfo">
        </form>
        
        <br>
    </div>

    <?php foreach($bookings as $booking): ?>
    <?php
        if ($booking["hotelID"] == '1'){
            $hotelName = "Nottingham";
        }
        if ($booking["hotelID"] == '2'){
            $hotelName = "Derby";
        }
        if ($booking["hotelID"] == '3'){
            $hotelName = "Liverpool";
        }

    ?>
    <h2>Bookings</h2>
    <div class="basketDisplay">
        <p>Hotel: <?php echo $hotelName ?> </p>
        <P>Date booked for: <?php echo $booking["dateBooked"] ?> </p>
        <p>Booking ID: <?php echo $booking["bookingID"] ?> </p>
        <p>Check in time:<?php echo $booking["checkIn"] ?> </p>
        <p>Check out time:<?php echo $booking["checkOut"] ?> </p>
        <p>Adults:<?php echo $booking["adults"] ?> </p>
        <p>Children:<?php echo $booking["children"] ?> </p>
        
        
        <br>
    </div>


    <?php endforeach ?>
    <footer>
        <?php include 'footer.html' ?>
    </footer>
</body>