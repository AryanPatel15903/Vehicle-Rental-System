<!DOCTYPE html>
<html lang="en">

<body>
    <?php include('userheader.php'); ?>

    <?php 
    require_once('connection.php');

    $vehicleId = $_GET['vehicle_id'];
    $sql2="select *from tblvehicles where vehicle_id='$vehicleId'";
    $vehicles= mysqli_query($con,$sql2);
    $result= mysqli_fetch_array($vehicles);

    $sql="select *from tbldriver";
    $drivers= mysqli_query($con,$sql);


    if(isset($_POST["submit"]))
    {
        $vehicle_id=$_POST['vehicle_id'];
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['email'];
        $mno=$_POST['mno'];
        $address=$_POST['address'];
        $driverOption=$_POST['driverOption'];
        $did=$_POST["did"];
        $loc=$_POST["loc"];
        $pdate=$_POST["pdate"];
        $ddate=$_POST["ddate"];
        $ptime=$_POST["ptime"];
        $dtime=$_POST["dtime"];
        $duration=$_POST["duration"];
        $noadults=$_POST["noadults"];
        $nochildren=$_POST["nochildren"];
        $srequest=$_POST["srequest"];


        $sql1="insert into  tblbooking (vehicle_id,First_name,Last_name,Email,Ph_no,Address,Driver,Driver_id,Pickup_loc,Pickup_date,Dropoff_date,Pickup_time,Dropoff_time,Duration,Adult_no,Children_no,Request) 
        values('$vehicle_id','$fname','$lname','$email','$mno','$address','$driverOption','$did','$loc','$pdate','$ddate','$ptime','$dtime','$duration','$noadults','$nochildren','$srequest')";
        $results = mysqli_query($con,$sql1);

        if($results){
            echo '<script>alert("successfully")</script>';
        	echo '<script> window.location.href = "payment.php";</script>';       
        }
        else{
            echo '<script>alert("please check the connection")</script>';
        }

    }
    

    ?>

<form action="userbooking1.php" method="POST">
<div class="container-fluid pt-5">
    <div class="container-fluid pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-4">Vehicle Detail</h2>
                    <div class="mb-5">
                    <div class="row">
                            <div class="col-12 form-group">
                                Vehicle ID:
                                <input type="text" class="form-control p-4" name="vehicle_id" value="<?php echo $result['vehicle_id']?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                Vehicle Name:
                                <input type="text" class="form-control p-4" name="vname" value="<?php echo $result['vehicle_name']?>" readonly>
                            </div>
                            <div class="col-6 form-group">
                                Model:
                                <input type="text" class="form-control p-4" name="vmodel" value="<?php echo $result['model'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                Vehicle Type:
                                <input type="email" class="form-control p-4" name="vtype" value="<?php echo $result['vehicle_type'] ?>" readonly>
                            </div>
                            <div class="col-6 form-group">
                                Mileage:
                                <input type="text" class="form-control p-4" name="vmileage" value="<?php echo $result['mileage'] ?> km/liter" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                Seating capacity:
                                <input type="text" class="form-control p-4" name="vcapacity" value="<?php echo $result['capacity'] ?> person" readonly>
                            </div>
                            <div class="col-6 form-group">
                                Fuel Type:
                                <input type="text" class="form-control p-4" name="vftype" value="<?php echo $result['fuel_type'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-4">Personal Detail</h2>
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" name="fname" placeholder="First Name" required>
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" name="lname" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" name="email" placeholder="Your Email" required>
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" name="mno" placeholder="Mobile Number" maxlength=10 required>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <textarea class="form-control py-3 px-4" name="address" rows="3" placeholder="Address" required></textarea>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-4">Driver Detail</h2>
                    <div class="mb-5">
                        <div class="radiobtn">
                            <input type="radio" id="driverRadio" name="driverOption" value="yes"> Driver
                            <input type="radio" id="selfDriveRadio" name="driverOption" value="no" style="margin-left: 15px;"> Self-drive
                        </div>

                        

                    <div class="mb-5" id="driverFormContainer" style="display: none;">
                        <div class="container-fluid pb-5">

                        <div class="container pb-5">
                            <div class="owl-carousel related-carousel position-relative" style="padding: 0 30px;">
                            <?php
                                while($result1= mysqli_fetch_array($drivers))
                                {
                                
                            ?>
                                <div class="rent-item">
                                    <img class="img-fluid mb-4" src="<?php echo $result1['Profile_img']?>" alt="">
                                    <h4 class="text-uppercase mb-4"><?php echo $result1['First_name'] ." ".$result1['Last_name']?></h4>
                                    <div class="d-flex justify-content-center mb-4">
                                        
                                    </div>
                                    <a class="btn btn-primary px-3 selectbtn" data-driverid="<?php echo $result1['Driver_id']; ?>" data-first-name="<?php echo $result1['First_name']; ?>" data-mobile="<?php echo $result1['Ph_number']; ?>" data-email="<?php echo $result1['Email']; ?>" data-lno="<?php echo $result1['Lisence_no']; ?>" >Select</a>
                                    <input type="hidden" name="selectedDriverId" value="<?php echo $result1['Driver_id']; ?>">
                                    <input type="hidden" name="selectedDriverFirstName" value="<?php echo $result1['First_name']; ?>">
                                    <input type="hidden" name="selectedDriverMobileNumber" value="<?php echo $result1['Ph_number']; ?>">
                                    <input type="hidden" name="selectedDriverEmail" value="<?php echo $result1['Email']; ?>">
                                    <input type="hidden" name="selectedDriverLisenceNo" value="<?php echo $result1['Lisence_no']; ?>">
                                </div>
                                

                                <?php
                                    }
                                    
                                ?>
                                
                            </div>
                        </div>
                    </div>

                    
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="did" placeholder="Driver Id" id="driverId" readonly >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="dname" placeholder="Driver Name" id="driverName" readonly >
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="dmno" placeholder="Driver Mobile Number" id="driverMobile" maxlength=10 readonly >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="demail" placeholder="Driver Email" id="driverEmail" readonly >
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="dlsno" placeholder="Driver Lisence Number" id="driverLN" readonly >
                                </div>
                            </div>

                           
                        </div>
                    </div>


                    <h2 class="mb-4">Booking Detail</h2>
                    <div class="mb-5">  
                            <div class="row">
                                <div class="col-12 form-group">
                                <textarea class="form-control p-4" name="loc" placeholder="Pickup Location" required ></textarea>
                                </div>
                                <!-- <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Drop Location" required >
                                </div> -->
                            </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="date" id="date2">
                                    <input type="date" class="form-control p-4" name="pdate" id="pickupDate" placeholder="Pickup Date"/>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div class="date" id="date3">
                                    <input type="date" class="form-control p-4" name="ddate" id="dropOffDate" placeholder="Drop-off Date"/>
                                </div>
                            </div>
                            
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="time" id="time2">
                                    <input type="time" class="form-control p-4" name="ptime" id="pickupTime" placeholder="Pickup Time"/>
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div class="time" id="time3">
                                    <input type="time" class="form-control p-4" name="dtime" id="dropOffTime" placeholder="Drop-off Time" onchange="calculateTotalHours()"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            Duration: <span style="color:red;" id="totalHoursDisplay" name="duration">0</span> hours
                        </div>

                        <div class="row">
                            <div class="col-6 form-group">
                                <div style="height: 50px;">
                                    <input type="number" class="form-control p-4" name="noadults" placeholder="No of Adults">
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div style="height: 50px;">
                                    <input type="number" class="form-control p-4" name="nochildren" placeholder="No of Children">
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control py-3 px-4" name="srequest" rows="3" placeholder="Special Request"></textarea>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary py-2 px-4" name="submit" value="Proceed >">
                </div>
            </div>
        </div>
    </div>
</div>


</form>



    <?php include('footer.php'); ?>


    <script>
        const driverRadio = document.getElementById('driverRadio');
        const selfDriveRadio = document.getElementById('selfDriveRadio');
        const driverFormContainer = document.getElementById('driverFormContainer');

        driverRadio.addEventListener('change', () => {
        driverFormContainer.style.display = 'block';
        });

        selfDriveRadio.addEventListener('change', () => {
        driverFormContainer.style.display = 'none';
        });

        let selectButtons = document.querySelectorAll('.selectbtn');
        let driverId = document.getElementById('driverId');
        let driverName = document.getElementById('driverName');
        let driverMobile = document.getElementById('driverMobile');
        let driverEmail = document.getElementById('driverEmail');
        let driverLN = document.getElementById('driverLN');

        selectButtons.forEach(button => {
            button.addEventListener('click', () => {
                const selectedId = button.dataset.driverid;
                const selectedFirstName = button.dataset.firstName;
                const selectedMobile = button.dataset.mobile;
                const selectedEmail = button.dataset.email;
                const selectedLN = button.dataset.lno;

                driverId.value = selectedId;
                driverName.value = selectedFirstName;
                driverMobile.value = selectedMobile;
                driverEmail.value = selectedEmail;
                driverLN.value = selectedLN;
            });
        });



        function calculateTotalHours() {
            const pickupDate = new Date(document.getElementById("pickupDate").value + " " + document.getElementById("pickupTime").value);
            const dropOffDate = new Date(document.getElementById("dropOffDate").value + " " + document.getElementById("dropOffTime").value);

            const timeDiff = dropOffDate.getTime() - pickupDate.getTime();
            const hours = (timeDiff / (1000 * 60 * 60));
            const formattedHours = hours.toFixed(2);
            document.getElementById("totalHoursDisplay").innerHTML = formattedHours;
        }
    

    </script>


  </body>

</html>