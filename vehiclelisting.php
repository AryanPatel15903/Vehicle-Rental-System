<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Template Stylesheet -->
    <link href="style1.css" rel="stylesheet">
</head>
<body>
    <!--Header-->
    <?php include('adminheader.php');?>
    <!-- /Header -->

    <?php
    // Include database connection details
    require_once('connection.php');

    if(isset($_POST['submit']) && isset($_FILES["image1"]) && isset($_FILES["image2"]) && isset($_FILES["image3"]) && isset($_FILES["image4"]) && isset($_FILES["image5"]) && isset($_FILES["puc"]) && isset($_FILES["insurance"])) {
        $vehicleName = $_POST['vehicle_name'];
        $vehicleBrand = $_POST['vehicle_brand'];
        $vehicleNumberPlate = $_POST['vehicle_number_plate'];
        $model = $_POST['model'];
        $mileage = $_POST['mileage'];
        $vehicleType = $_POST['vehicle_type'];
        $capacity = $_POST['capacity'];
        $price = $_POST['price'];
        $fuelType = $_POST['fuel_type'];
        $description = $_POST['description'];
        $image1 = $_FILES["image1"]["name"];
        $image2 = $_FILES["image2"]["name"];
        $image3 = $_FILES["image3"]["name"];
        $image4 = $_FILES["image4"]["name"];
        $image5 = $_FILES["image5"]["name"];
        $puc = $_FILES["puc"]["name"];
        $insurance = $_FILES["insurance"]["name"];

        $tmpfile1 = $_FILES['image1']['tmp_name'];
        $target = "Vehicle_img";
        $filename1 = "$target/$image1";
        move_uploaded_file($tmpfile1, "$filename1");

        $tmpfile2 = $_FILES['image2']['tmp_name'];
        $filename2 = "$target/$image2";
        move_uploaded_file($tmpfile2, "$filename2");

        $tmpfile3 = $_FILES['image3']['tmp_name'];
        $filename3 = "$target/$image3";
        move_uploaded_file($tmpfile3, "$filename3");

        $tmpfile4 = $_FILES['image4']['tmp_name'];
        $filename4 = "$target/$image4";
        move_uploaded_file($tmpfile4, "$filename4");

        $tmpfile5 = $_FILES['image5']['tmp_name'];
        $filename5 = "$target/$image5";
        move_uploaded_file($tmpfile5, "$filename5");

        $tmppuc = $_FILES['puc']['tmp_name'];
        $pucfile = "$target/$puc";
        move_uploaded_file($tmppuc, "$pucfile");

        $tmpinsurance = $_FILES['insurance']['tmp_name'];
        $insurancefile = "$target/$insurance";
        move_uploaded_file($tmpinsurance, "$insurancefile");

        $sql = "INSERT INTO tblvehicles (vehicle_name, vehicle_brand, vehicle_number_plate, model, mileage, vehicle_type, capacity, price, fuel_type, description, image1, image2, image3, image4, image5, puc, insurance) VALUES ('$vehicleName', '$vehicleBrand', '$vehicleNumberPlate', '$model', $mileage, '$vehicleType', '$capacity', $price, '$fuelType', '$description', '$filename1', '$filename2', '$filename3', '$filename4', '$filename5', '$pucfile', '$insurancefile')";

        if ($con->query($sql) === TRUE) {
            echo '<script>alert("new record added successfully")</script>';
            echo '<script> window.location.href = "vehiclelisting.php";</script>';
        } else {
            echo "Error: " . $sql . "<br>" . $con->error;
        }
    }
    ?>

    <form action="vehiclelisting.php" method="post" enctype="multipart/form-data">
        <label for="vehicle_name">Vehicle Name:</label>
        <input type="text" id="vehicle_name" name="vehicle_name" required>

        <label for="vehicle_brand">Vehicle Brand:</label>
        <input type="text" id="vehicle_brand" name="vehicle_brand" required>

        <label for="vehicle_number_plate">Vehicle Number Plate:</label>
        <input type="text" id="vehicle_number_plate" name="vehicle_number_plate" required>

        <label for="model">Model:</label>
        <input type="text" id="model" name="model" required>

        <label for="mileage">Mileage (km/litre):</label>
        <input type="number" id="mileage" name="mileage" required>

        <label for="vehicle_type">Vehicle Type:</label>
        <select id="vehicle_type" name="vehicle_type" required>
            <option value="">Select Type</option>
            <option value="manual">manual</option>
            <option value="automatic">automatic</option>
        </select>

        <label for="capacity">Capacity (seating):</label>
        <input type="text" id="capacity" name="capacity" required>

        <label for="price">Price (per day):</label>
        <input type="number" id="price" name="price" min="0" required>

        <label for="fuel_type">Fuel Type:</label>
        <select id="fuel_type" name="fuel_type" required>
            <option value="">Select Fuel Type</option>
            <option value="petrol">Petrol</option>
            <option value="diesel">Diesel</option>
            <option value="cng">CNG</option>
            <option value="electric">Electric</option>
        </select>

        <div>
            <label for="image1">Image 1:</label>
            <input type="file" id="image1" name="image1">
        </div>

        <div>
            <label for="image2">Image 2:</label>
            <input type="file" id="image2" name="image2">
        </div>

        <div>
            <label for="image3">Image 3:</label>
            <input type="file" id="image3" name="image3">
        </div>

        <div>
            <label for="image4">Image 4:</label>
            <input type="file" id="image4" name="image4">
        </div>

        <div>
            <label for="image5">Image 5:</label>
            <input type="file" id="image5" name="image5">
        </div>

        <div>
            <label for="puc">PUC (PDF):</label>
            <input type="file" id="puc" name="puc">
        </div>

        <div>
            <label for="insurance">Insurance (PDF):</label>
            <input type="file" id="insurance" name="insurance">
        </div>

        <label for="description">Description:</label>
        <textarea id="description" name="description" required></textarea>

        <button type="submit" name="submit">Submit Listing</button>
    </form>

    <!-- footer start -->
    <?php include('footer.php');?>
    <!-- footer end -->
</body>
</html>