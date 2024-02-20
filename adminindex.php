<!DOCTYPE html>
<html lang="en">

<body>
    <!--Header-->
    <?php include('adminheader.php');?>
    <!-- /Header --> 
    
     <!-- Carousel Start -->
     <div class="container-fluid p-0" style="margin-bottom: 90px;">
        <div id="header-carousel" class="carousel slide" data-ride="carousel" style="padding:10px 0px 0px 0px;">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4">Welcome back, Admin!</h1>
                            <h4 class="text-white text-uppercase mb-md-3">Hey there, admin! Let's get your rental business rolling!</h4>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h1 class="display-1 text-white mb-md-4">Ready to manage your rental operations?</h1>
                            <h4 class="text-white text-uppercase mb-md-3">Ready to conquer the day? Your car rental empire awaits!</h4>
            
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#header-carousel" data-slide="prev">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-prev-icon mb-n2"></span>
                </div>
            </a>
            <a class="carousel-control-next" href="#header-carousel" data-slide="next">
                <div class="btn btn-dark" style="width: 45px; height: 45px;">
                    <span class="carousel-control-next-icon mb-n2"></span>
                </div>
            </a>
        </div>
    </div>
    <!-- Carousel End -->
    

    
    <!-- footer start -->
    <?php include('footer.php');?>
    <!-- footer end -->

</body>

</html>