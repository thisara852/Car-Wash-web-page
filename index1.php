<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbanme = "appointment";
$conn = new mysqli($servername,$username,$password,$dbanme);

if($conn->connect_error){
    die("Connection Failed:" .$conn->connect_error);

}
//Handle form submission
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = $_POST["name"];
    $contact_number = $_POST["contact-number"];
    $vehicle_number = $_POST["vehicle-number"];
    $appointment_date = $_POST["appointment-date"];
    $service = $_POST["service"];

    //prepare and execute the database insertion
    $sql = "INSERT INTO `appointment`(`name`, `contact_number`, `vehicle_number`, `appointment_date`, `service`)
     VALUES ('$name','$contact_number','$vehicle_number','$appointment_date','$service')";

     if($conn->query($sql) == TRUE){
        echo "Booking Successfully";
     }else{
        echo "Error: " .$sql . "<br>" .$conn->error; 
     }
}
$conn->close();
?>