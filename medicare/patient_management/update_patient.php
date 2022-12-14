<?php
include '../connection/connect.php';
$pid = $_GET['updateid'];
$sql = "select * from `patient` where pid=$pid";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result);
$name = $row['name'];
$nic = $row['nic'];
$gender = $row['gender'];
$dob = $row['dob'];
$address = $row['address'];
$city = $row['city'];
$t_phone = $row['t_phone'];

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $nic = $_POST['nic'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $t_phone = $_POST['t_phone'];

    $sql = "update `patient` set pid=$pid, name='$name', nic='$nic', gender='$gender', dob='$dob', address='$address', city='$city', t_phone='$t_phone' where pid=$pid";
    $result = mysqli_query($con, $sql);
    if ($result) {

        header('location: view_patient.php');
    } else {
        die(mysqli_error($con));
    }
}

?>



<!doctype html>
<html lang="en">

<head>
<script type="text/javascript">
    function validate(){
    
    var nic = document.forms["myform"]["nic"].value;
    if(nic.length<10){
        document.getElementById("error").innerHTML="<span style='color: red;'>"+"Invalid NIC Format</span>"
        return false;
    }

    var t_phone = document.forms["myform"]["t_phone"].value;
    if(isNaN(t_phone)){
        document.getElementById("error1").innerHTML="<span style='color: red;'>"+"Only digits allowed for Phone number</span>"
        return false;
    }

    else if(t_phone.length>10){
        document.getElementById("error1").innerHTML="<span style='color: red;'>"+"Maximum limit is 10 digits</span>"
        return false;
    }

    else if(t_phone.length<10){
        document.getElementById("error1").innerHTML="<span style='color: red;'>"+"Maximum limit is 10 digits</span>"
        return false;
    }

    else if(t_phone.charAt(0)==9){
        document.getElementById("error1").innerHTML="<span style='color: red;'>"+"Starting number 9 not allowed</span>"
        return false;
    }




} 

</script>  

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">


    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="secondNav.css">

    <title>Update Patient</title>
</head>

<body>
    <!-- header -->
    <?php
    include('header.php');
    ?>

    <!-- second navigation bar -->
    <div>
        <ul class="secondNav">
        <li><a href="create_patient.php" class="list">Register Patient</a></li>
            <li><a href="view_patient.php" class="list" id="active">View Patient</a></li>
            <li><a href="view_admission.php" class="list" >Check Up Admission</a></li>
            <li><a href="create_admission.php" class="list">Add Admission</a></li>
            <li><a href="search.php" class="list">Search Patients</a></li>
            <li><a href="report.php" class="list">Report</a></li>
        </ul>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" style="background-color:#198754; margin-left:25px; margin-top:25px" onclick="location.href='view_patient.php'" name="back">Back</button><br>
    <div class="container my-5">
       
        <form name="myform" onsubmit="return validate()" method="POST">
        <h1 style="margin-left:35% ;">Edit Patient Details</h1><br><br><br>

            <div class="row" style="margin-left:10%">
                <div class="col-md-5" style="margin-bottom:30px ;">
                    <label>Name</label>
                    <input type="text" class="form-control" placeholder="Enter Your Firstname" name="name" autocomplete="off" value="<?php echo $name ?>" required>
                </div>
                <div class="col-md-5" style="margin-bottom:30px ;">
                    <label>NIC</label>
                    <input type="text" class="form-control" placeholder="use capital V" name="nic" autocomplete="off" value="<?php echo $nic ?>" required>
                    <span id="error"></span>
                </div>
                <div class="col-md-5"style="margin-bottom:30px ;">
                    <label>Gender</label>
                    <select name="gender" id="Gender"  required  class="form-control"value="<?php echo $gender ?>" >
                        <option disabled selected><?php echo $gender ?></option>
                        <option>Male</option>
                        <option>Female</option>
                    </select>
                    
                </div>

                    <div class="col-md-5"style="margin-bottom:30px ;">
                        <label>Date of Birth</label>
                        <input type="date" class="form-control" placeholder="Enter Your Name" name="dob" autocomplete="off" value="<?php echo $dob ?>" required>
                    </div>
                    <div class="col-md-5"style="margin-bottom:30px ;">
                        <label>Address</label>
                        <input type="text" class="form-control" placeholder="Enter Your Address" name="address" autocomplete="off" value="<?php echo $address ?>" required>
                    </div>
                    <div class="col-md-5"style="margin-bottom:30px ;">
                        <label>City</label>
                        <input type="text" class="form-control" placeholder="Enter Your City" name="city" autocomplete="off" value="<?php echo $city ?>" required>
                    </div>
                    <div class="col-md-5"style="margin-bottom:30px ;">
                        <label>Phone Number</label>
                        <input type="number" class="form-control" placeholder="Ex: +94 727373731" name="t_phone" autocomplete="off" value="<?php echo $t_phone ?>" required>
                        <span id="error1"></span>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary" style="background-color:#198754;margin-left:40%" name="submit">Update</button>
                <button type="reset" class="btn btn-primary" style="background-color:#198754" name="reset">Reset</button>
        </form>

    </div>
    <!-- Footer -->
    <?php
    include('footer.php');
    ?>

</body>

</html>