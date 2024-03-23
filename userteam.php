<!DOCTYPE html>
<html lang="en">


<body>
    <?php include('userheader.php'); ?>

    <?php 
    require_once('connection.php');

    $sql="select *from tblteam";
    $team= mysqli_query($con,$sql);
    

    ?>



    <!-- Team Start -->
    <div class="container-fluid py-5">
            <div class="container py-5">
                <h1 class="display-4 text-uppercase text-center mb-5">Meet Our Team</h1>
                <div class="owl-carousel team-carousel position-relative" style="padding: 0 30px;">
                <?php
                        while($result1= mysqli_fetch_array($team))
                        {            
                ?>
                    <div class="team-item">
                        <img class="img-fluid w-100" src="<?php echo $result1['Profile_img']?>" alt="">
                        <div class="position-relative py-4">
                            <h4 class="text-uppercase"><?php echo $result1['fname'] ." ".$result1['lname']?></h4>
                            <p class="m-0"><?php echo $result1['designation']?></p>
                        </div>
                    </div>
                    <?php
                                    }
                                ?>
                </div>
            </div>
        </div>
        <!-- Team End -->

    <?php include('footer.php'); ?>


</body>
</html>