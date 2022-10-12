<?php include "./config/database.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel Website</title>
    <script src="./app.js"></script>
    <style>
    input.hiddenVariables{
        display:none;
    }


    </style>

</head>
<body>
    
    <?php include 'headerNav.php';?>
    <?php 
        //Display rooms
        $sql = "SELECT * FROM room";
        $result = mysqli_query($conn,$sql);
        $rooms = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //Add, delete and update rooms
        if (isset($_POST["updateRoomInfo"])){
            
            $roomID = filter_input(INPUT_POST, "roomID",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $hotelID = filter_input(INPUT_POST, "hotelID",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $cost = filter_input(INPUT_POST, "cost",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $beds = filter_input(INPUT_POST, "beds",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $roomNumber = filter_input(INPUT_POST, "roomNumber",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $maxAdults = filter_input(INPUT_POST, "maxAdults",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $maxChildren = filter_input(INPUT_POST, "maxChildren",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $bathroomDetails = filter_input(INPUT_POST, "bathroomDetails",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sql = "UPDATE room SET  
                hotelID='$hotelID', 
                cost='$cost',
                beds='$beds', 
                roomNumber='$roomNumber',
                maxAdults='$maxAdults',
                maxChildren='$maxChildren',
                bathroomDetails='$bathroomDetails'
                 WHERE roomID='$roomID'";
            
            if (mysqli_query($conn, $sql)){
                
                header("Location: adminPage.php");
            }
              else {
                echo "Error" . mysqli_error($conn);
            }
            
        }
        if (isset($_POST["deleteRoom"])){
            $roomID = filter_input(INPUT_POST, "roomID",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            
            $sql = "DELETE FROM `room` WHERE roomID='$roomID'";
            if (mysqli_query($conn, $sql)){
            
                echo "All confirmed";
            }
              else {
                echo "Error" . mysqli_error($conn);
            }
            
        }

        if (isset($_POST["addRoomInfo"])){
            $hotelID = filter_input(INPUT_POST, "hotelID",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $cost = filter_input(INPUT_POST, "cost");
            $beds = filter_input(INPUT_POST, "beds",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $roomNumber = filter_input(INPUT_POST, "roomNumber",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $maxAdults = filter_input(INPUT_POST, "maxAdults",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $maxChildren = filter_input(INPUT_POST, "maxChildren",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $bathroomDetails = filter_input(INPUT_POST, "bathroomDetails",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql= "SELECT hotelID,roomNumber FROM room WHERE hotelID='$hotelID' AND roomNumber='$roomNumber'";
            // echo $sql;
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)==0) {
                $sql = "INSERT INTO room(hotelID,cost,beds,roomNumber,maxAdults,maxChildren,bathroomDetails)
                VALUES ('$hotelID','$cost','$beds','$roomNumber','$maxAdults','$maxChildren','$bathroomDetails')";
                if (mysqli_query($conn, $sql)){
                    
                    // header("Location: adminPage.php");
                }
                else {
                    echo "Error" . mysqli_error($conn);
                }
            } else {
                echo "Room number already in use in that hotel";
            }
            
        }
        //Display customers 
        $sql = "SELECT * FROM customer";
        $result = mysqli_query($conn,$sql);
        $customers = mysqli_fetch_all($result, MYSQLI_ASSOC);
        //Add, delete and update customers
        if (isset($_POST["updateCustomerInfo"])){
            
            $customerID = filter_input(INPUT_POST, "customerID",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
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
                header("Location: adminPage.php");
            }
              else {
                echo "Error" . mysqli_error($conn);
            }
            
        }
        if (isset($_POST["deleteCustomer"])){
            $customerID = filter_input(INPUT_POST, "customerID",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $sql = "DELETE FROM 'customer' WHERE customerID='$customerID'";
            if (mysqli_query($conn, $sql)){
                echo "All confirmed";
            }
              else {
                echo "Error" . mysqli_error($conn);
            }
            
        }

        if (isset($_POST["addCustomerInfo"])){
            $firstName = filter_input(INPUT_POST, "firstName",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $lastName = filter_input(INPUT_POST, "lastName",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $email = filter_input(INPUT_POST, "email",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $password = filter_input(INPUT_POST, "password",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $gender = filter_input(INPUT_POST, "gender",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $age = filter_input(INPUT_POST, "age",FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nationality = filter_input(INPUT_POST, "nationality",FILTER_SANITIZE_FULL_SPECIAL_CHARS);

            $sql= "SELECT email FROM customer WHERE email='$email'";
            $result = mysqli_query($conn,$sql);
            if (mysqli_num_rows($result)==0) {
                $sql = "INSERT INTO customer(firstName,lastName,email,password,gender,age,nationality)
                VALUES ('$firstName','$lastName','$email','$password','$gender','$age','$nationality')";
                if (mysqli_query($conn, $sql)){
                    
                    header("Location: adminPage.php");
                }
                else {
                    echo "Error" . mysqli_error($conn);
                }
            } else {
                echo "Email already in use. Please login or use another email.";
            }
            
        }

    ?>


<h1>Room details</h1>

<?php

?>

    <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                
                <label for="hotelID">HotelID:</label>
                <input type="text" name="hotelID" >

                <label for="cost">Cost:</label>
                <input type="text" name="cost"  >

                <label for="beds">Beds:</label>
                <input type="text" name="beds" >

                <label for="roomNumber">Room Number:</label>
                <input type="text" name="roomNumber"  >

                <label for="maxAdults">Max Adults:</label>
                <input type="text" name="maxAdults"  >

                <label for="nationality">Max Children:</label>
                <input type="text" name="maxChildren"  >

                <label for="bathroomDetails">Bathroom Details:</label>
                <input type="text" name="bathroomDetails"  >

                <input type="submit" value="Add room" name="addRoomInfo">
    </form>
<?php foreach($rooms as $room): ?>

    <div class="roomDisplay">
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            
            <label for="roomID">RoomID: <?php echo $room["roomID"]?></label>
            <input type="text" name="roomID" value=<?php echo $room["roomID"]?> class="hiddenVariables">

            <label for="hotelID">HotelID:</label>
            <input type="text" name="hotelID" value=<?php echo $room["hotelID"]?> >

            <label for="cost">Cost:</label>
            <input type="text" name="cost" value=<?php echo $room["cost"]?> >

            <label for="beds">Beds:</label>
            <input type="text" name="beds" value=<?php echo $room["beds"]?> >

            <label for="roomNumber">Room Number:</label>
            <input type="text" name="roomNumber" value=<?php echo $room["roomNumber"]?> >

            <label for="maxAdults">Max Adults:</label>
            <input type="text" name="maxAdults" value=<?php echo $room["maxAdults"]?> >

            <label for="nationality">Max Children:</label>
            <input type="text" name="maxChildren" value=<?php echo $room["maxChildren"]?> >

            <label for="bathroomDetails">Bathroom Details:</label>
            <input type="text" name="bathroomDetails" value=<?php echo $room["bathroomDetails"]?> >

            <input type="submit" value="Update information" name="updateRoomInfo">
        </form>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="text" name="roomID"  value=<?php echo $room["roomID"] ?> class="hiddenVariables">
            <input type="submit" value="Delete room" name="deleteRoom">
        </form>
        <br>
        
    </div>


<?php endforeach ?>

<form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
                
                <label for="firstName">First name:</label>
                <input type="text" name="firstName" >

                <label for="lastName">Last name:</label>
                <input type="text" name="lastName"  >

                <label for="email">Email:</label>
                <input type="text" name="email" >

                <label for="password">Password:</label>
                <input type="text" name="password"  >

                <label for="gender">Gender:</label>
                <input type="text" name="gender"  >

                <label for="age">Age:</label>
                <input type="text" name="age"  >

                <label for="nationality">Nationality:</label>
                <input type="text" name="nationality"  >

                <input type="submit" value="Add customer" name="addCustomerInfo">
    </form>
<?php foreach($customers as $customer): ?>

    <div class="customerDisplay">
        
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            
            <label for="customerID">CustomerID: <?php echo $customer["customerID"]?></label>
            <input type="text" name="customerID" value=<?php echo $customer["customerID"]?> class="hiddenVariables">

            <label for="hotelID">HotelID:</label>
            <input type="text" name="hotelID" value=<?php echo $room["hotelID"]?> >

            <label for="cost">Cost:</label>
            <input type="text" name="cost" value=<?php echo $room["cost"]?> >

            <label for="beds">Beds:</label>
            <input type="text" name="beds" value=<?php echo $room["beds"]?> >

            <label for="roomNumber">Room Number:</label>
            <input type="text" name="roomNumber" value=<?php echo $room["roomNumber"]?> >

            <label for="maxAdults">Max Adults:</label>
            <input type="text" name="maxAdults" value=<?php echo $room["maxAdults"]?> >

            <label for="nationality">Max Children:</label>
            <input type="text" name="maxChildren" value=<?php echo $room["maxChildren"]?> >

            <label for="bathroomDetails">Bathroom Details:</label>
            <input type="text" name="bathroomDetails" value=<?php echo $room["bathroomDetails"]?> >

            <input type="submit" value="Update information" name="updateRoomInfo">
        </form>
        <form action="<?php echo $_SERVER["PHP_SELF"]; ?>" method="post">
            <input type="text" name="roomID"  value=<?php echo $room["roomID"] ?> class="hiddenVariables">
            <input type="submit" value="Delete room" name="deleteRoom">
        </form>
        <br>
        
    </div>


<?php endforeach ?>

</body>