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


<div class="container-fluid pt-5">
    <div class="container-fluid pb-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="mb-4">Vehicle Detail</h2>
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                Vehicle Name:
                                <input type="text" class="form-control p-4" value="<?php echo $result['vehicle_name']?>" readonly>
                            </div>
                            <div class="col-6 form-group">
                                Model:
                                <input type="text" class="form-control p-4" value="<?php echo $result['model'] ?>" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                Vehicle Type:
                                <input type="email" class="form-control p-4" value="<?php echo $result['vehicle_type'] ?>" readonly>
                            </div>
                            <div class="col-6 form-group">
                                Mileage:
                                <input type="text" class="form-control p-4" value="<?php echo $result['mileage'] ?> km/liter" readonly>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                Seating capacity:
                                <input type="text" class="form-control p-4" value="<?php echo $result['capacity'] ?> person" readonly>
                            </div>
                            <div class="col-6 form-group">
                                Fuel Type:
                                <input type="text" class="form-control p-4" value="<?php echo $result['fuel_type'] ?>" readonly>
                            </div>
                        </div>
                    </div>
                    <h2 class="mb-4">Personal Detail</h2>
                    <div class="mb-5">
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="First Name" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Last Name" required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <input type="email" class="form-control p-4" placeholder="Your Email" required="required">
                            </div>
                            <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Mobile Number" maxlength=10 required="required">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 form-group">
                                <textarea class="form-control py-3 px-4" rows="3" placeholder="Address" required="required"></textarea>
                            </div>
                        </div>
                    </div>

                    <h2 class="mb-4">Driver Detail</h2>
                    <div class="mb-5">
                        <div class="radiobtn">
                            <input type="radio" id="driverRadio" name="driverOption"> Driver
                            <input type="radio" id="selfDriveRadio" name="driverOption" style="margin-left: 15px;"> Self-drive
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
                                    <input type="text" class="form-control p-4" placeholder="Driver Id" id="driverId" readonly >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Driver Name" id="driverName" readonly >
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Driver Mobile Number" id="driverMobile" maxlength=10 readonly >
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Driver Email" id="driverEmail" readonly >
                                </div>
                                <div class="col-6 form-group">
                                    <input type="text" class="form-control p-4" placeholder="Driver Lisence Number" id="driverLN" readonly >
                                </div>
                            </div>

                           
                        </div>
                    </div>


                    <h2 class="mb-4">Booking Detail</h2>
                    <div class="mb-5">
                        <div id="bookingFormContainer" style="display: none;">
                            <div class="row">
                                <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Pickup Location" required >
                                </div>
                                <div class="col-6 form-group">
                                <input type="text" class="form-control p-4" placeholder="Drop Location" required >
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <div class="date" id="date2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Date"
                                        data-target="#date2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                            <div class="col-6 form-group">
                                <div class="time" id="time2" data-target-input="nearest">
                                    <input type="text" class="form-control p-4 datetimepicker-input" placeholder="Pickup Time"
                                        data-target="#time2" data-toggle="datetimepicker" />
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;">
                                    <option selected>Select Adult</option>
                                    <option value="1">Adult 1</option>
                                    <option value="2">Adult 2</option>
                                    <option value="3">Adult 3</option>
                                </select>
                            </div>
                            <div class="col-6 form-group">
                                <select class="custom-select px-4" style="height: 50px;">
                                    <option selected>Select Child</option>
                                    <option value="1">Child 1</option>
                                    <option value="2">Child 2</option>
                                    <option value="3">Child 3</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control py-3 px-4" rows="3" placeholder="Special Request" required="required"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



    <?php include('footer.php'); ?>


    <script>
        const driverRadio = document.getElementById('driverRadio');
        const selfDriveRadio = document.getElementById('selfDriveRadio');
        const driverFormContainer = document.getElementById('driverFormContainer');
        const bookingFormContainer = document.getElementById('bookingFormContainer');

        driverRadio.addEventListener('change', () => {
        driverFormContainer.style.display = 'block';
        bookingFormContainer.style.display = 'block';
        });

        selfDriveRadio.addEventListener('change', () => {
        driverFormContainer.style.display = 'none';
        bookingFormContainer.style.display = 'none';
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
                // Use the selectedFirstName variable as needed outside the loop
                driverId.value = selectedId;
                driverName.value = selectedFirstName;
                driverMobile.value = selectedMobile;
                driverEmail.value = selectedEmail;
                driverLN.value = selectedLN;
            });
        });
       
    </script>


  </body>

</html>