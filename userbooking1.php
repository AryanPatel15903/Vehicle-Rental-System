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

    ?>

<form action="payment.php" method="POST">
<div class="container-fluid pt-5">
    <div class="container-fluid pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-4">Vehicle Detail</h2>
                    <div class="mb-5">
                    <div class="row">
                            <div class="col-6 form-group">
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
                            <input type="radio" id="driverRadio" name="driverOption" value="yes" required> Driver
                            <input type="radio" id="selfDriveRadio" name="driverOption" value="no" style="margin-left: 15px;" require> Self-drive
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
                    <div id="locationContainer" style="display: none;">  
                            <div class="radiobtn form-group">
                                <input type="radio" id="selfDriveRadioLoc" name="locOption" value="location" required> By Loaction
                                <input type="radio" id="selfDriveRadioOffice" name="locOption" value="office" style="margin-left: 15px;" required> By Office
                            </div>
                    </div>
                            <div class="row">
                                <div class="col-12 form-group">
                                <textarea class="form-control p-4" id="picloc" name="loc" placeholder="Pickup Location" required ></textarea>
                                </div>
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
                            Duration: <input type="text" style="width: 10%; color:red; text-align:center;" id="totalHoursDisplay" name="duration" value="0" readonly> hours
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

                        <h2 class="mb-4">Payable Amount</h2>
                        <div class="mb-5">
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" name="price" placeholder="0" id="paymentprice" readonly >
                                </div>
                                <div class="mt-3">
                                    Rs.
                                </div>
                            </div>
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
        const paymentPriceInput = document.getElementById('paymentprice');
        const locationContainer = document.getElementById('locationContainer');
        const picloc = document.getElementById('picloc');
        const selfDriveRadioLoc = document.getElementById('selfDriveRadioLoc');
        const selfDriveRadioOffice = document.getElementById('selfDriveRadioOffice');

        driverRadio.addEventListener('change', () => {
        driverFormContainer.style.display = 'block';
        locationContainer.style.display = 'none';
        updatePayableAmount();
        });

        selfDriveRadio.addEventListener('change', () => {
        driverFormContainer.style.display = 'none';
        locationContainer.style.display = 'block';
        updatePayableAmount();
        });

        selfDriveRadioLoc.addEventListener('change', () => {
        picloc.style.display = 'block';
        updatePayableAmount();
        });
        
        selfDriveRadioOffice.addEventListener('change', () => {
        picloc.style.display = 'none';
        updatePayableAmount();
        });

        function updatePayableAmount() {
            const duration = parseFloat(document.getElementById('totalHoursDisplay').value);
            let price = 0;
            let extra = 50.00;

            // Fetch the price based on the selected option
            if (driverRadio.checked) {
                price = <?php echo $result['dpriceph']; ?>;
            } else if (selfDriveRadio.checked) {
                price = <?php echo $result['priceph']; ?>;
            }

            //by location radio button
            if (selfDriveRadioLoc.checked) {
                price = price + extra ;
            }

            // Calculate payable amount
            const payableAmount = duration * price;

            // Update the payment price input field
            paymentPriceInput.value = payableAmount.toFixed(2);
        }

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
            document.getElementById("totalHoursDisplay").value = formattedHours;

            updatePayableAmount();
        }
    

    </script>


  </body>

</html>