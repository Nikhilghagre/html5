<?php defined('BASEPATH') OR exit('No direct script access allowed');?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>Collapsible sidebar using Bootstrap 4</title>

    
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/bootstrap.min.css"; ?>">
    <script src="<?php echo base_url()."assets/frontend/js/jquery.js"; ?>"></script>
    
    <!-- Our Custom CSS -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url()."assets/frontend/css/style1.css"; ?>">
    <!-- Scrollbar Custom CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.min.css">

    <!-- Font Awesome JS -->
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/solid.js" integrity="sha384-tzzSw1/Vo+0N5UhStP3bvwWPq+uvzCMfrN1fEFe+xBmv1C/AtVX5K0uZtmcHitFZ" crossorigin="anonymous"></script>
    <script defer src="https://use.fontawesome.com/releases/v5.0.13/js/fontawesome.js" integrity="sha384-6OIrr52G08NpOFSZdxxz1xdNSndlD4vdcf/q2myIUVO0VsqaGHJsB0RaBE01VTOY" crossorigin="anonymous"></script>

    
</head>

<body>

    <div class="wrapper">
        <!-- Sidebar  -->
        <nav id="sidebar">

            <br>
            <br>
            <div id="dismiss">
                <i class="fas fa-arrow-left"></i>
            </div>

            <div class="sidebar-header">
                <h6>Bootstrap Sidebar</h6>
            </div>

            <ul class="list-unstyled components">
                <p>Dummy Heading</p>
                <li class="active">
                    <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false">Home</a>
                    <ul class="collapse list-unstyled" id="homeSubmenu">
                        <li>
                            <a href="#">Home 1</a>
                        </li>
                        <li>
                            <a href="#">Home 2</a>
                        </li>
                        <li>
                            <a href="#">Home 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">About</a>
                    <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false">Pages</a>
                    <ul class="collapse list-unstyled" id="pageSubmenu">
                        <li>
                            <a href="#">Page 1</a>
                        </li>
                        <li>
                            <a href="#">Page 2</a>
                        </li>
                        <li>
                            <a href="#">Page 3</a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#">Portfolio</a>
                </li>
                <li>
                    <a href="#">Contact</a>
                </li>
            </ul>

          
        </nav>

        <!-- Page Content  -->
        <div id="content">

            <nav class="navbar navbar-expand-lg navbar-light" style="background: #162c66;">
                <div class="container-fluid">

                   
                    <button type="" id="sidebarCollapse" class="btn " style="background:#162c66 ;">
                       <img src="<?php echo base_url()."assets/upload/menu/"; ?>menu.png" alt="" width="35px">
                    </button>
                    <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <img src="<?php echo base_url()."assets/upload/menu/"; ?>menu.png" alt="" width="35px">
                    </button>
                    <h5 class="text-white">ooltahchasmaplay.com</h5>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="nav navbar-nav ml-auto">
                            <li class="nav-item active mx-3 ">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>search.jpeg" alt=""  width="60px" height="50px" >
                                <a class="nav text-white" href="#">Search</a>
                            </li>
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>home.jpeg" alt="" width="60px" height="50px" >
                                <a class="nav pl-2 text-white" href="#">Home</a>
                            </li>
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>about.jpeg" alt="" width="60px" height="50px">
                                <a class="nav pl-2 text-white" href="#">About Us</a>
                            </li>
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>user.jpeg" alt="" width="60px" height="50px" >
                                <a class="nav pl-2 text-white" href="#">You</a>
                            </li>
                            <li class="nav-item mx-3">
                                <img src="<?php echo base_url()."assets/upload/menu/"; ?>logout.jpeg" alt="" width="60px" height="50px">
                                <a class="nav pl-2 text-white" href="#">SignOut</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div >
              <center>
                    <div class="col-sm-11" >
                        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
                            <div class="carousel-inner">
                              <div class="carousel-item active " style="background:rgb(32, 2, 2); border-radius: 20px; ">
                                <img class="d-block w-50" src="https://theimgstudio.com/wp-content/uploads/2021/01/right-mobilesadf-asdfasfaRecovered-Recovered.png" alt="First slide"  style="background:red">
                              </div>
                              <div class="carousel-item" style="background:green; border-radius: 20px;">
                                <img class="d-block w-50" src="https://theimgstudio.com/wp-content/uploads/2021/01/right-mobilesadf-asdfasfaRecovered-Recovered.png" alt="Second slide" >
                              </div>
                              <div class="carousel-item" style="background:blue; border-radius: 20px;">
                                <img class="d-block w-50" src="https://theimgstudio.com/wp-content/uploads/2021/01/right-mobilesadf-asdfasfaRecovered-Recovered.png" alt="Third slide" >
                              </div>
                            </div>
                          </div>
                    </div>
                </center>
                  
            </div>


            <!-- //main content -->
            <div>
                <br><br>
            </div>
            
            <div  class="col-sm-11 mx-auto">  
            <h2 class="text-white">Latest Games</h2> 
            <div class="row"> 
           
                <div class="col-sm-10 mx-auto" style=" ">
                    
                        <div class="row">
                            <div class="col-sm-2 mr-4 " style=" ">
                            <div class="card " style="width: 15rem;  background:#3765dd;">
                                <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">Game 1 </h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-2 mr-4" style="">
                            <div class="card " style="width: 15rem;  background:#3765dd;">
                                <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">Game 1 </h5>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-2 mr-4" style="">
                            <div class="card " style="width: 15rem;  background:#3765dd;">
                                <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">Game 1 </h5>
                                </div>
                                </div>
                            </div>

                     

                            
                           

                            
                        </div>
                </div>
                    <div class="col-sm-2 mx-auto" style=" border-radius: 10px;">
                            <div>
                                <img src="https://uploads-ssl.webflow.com/61eaf804c2d92c0a1f61c682/6217f5c689b9700c0d046bd8_Graphic%20Dazzle%20-%20Display%20Ad%20-%20Feb212022.png" alt="" style="width:300px; background:yellow; border-radius: 10px;">
                            </div> 
                        
                    </div>
                </div>
            </div>    
            
           <div>
            <br>
            <br>
            <br>
           </div>

            <div>
               
                        
                        <div class="col-sm-11 mx-auto"  ">
                        <h2 class="text-white">Featured Games</h2> 
                                <div class="row">
                                    
                                <div class="col-sm-2  " style=" ">
                            <div class="card " style="width: 15rem;  background:#3765dd;">
                                <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">Game 1 </h5>
                                </div>
                                </div>
                            </div>
                            <div class="col-sm-2 " style="">
                            <div class="card " style="width: 15rem;  background:#3765dd;">
                                <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">Game 1 </h5>
                                </div>
                                </div>
                            </div>

                            <div class="col-sm-2 " style="">
                            <div class="card " style="width: 15rem;  background:#3765dd;">
                                <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                <div class="card-body">
                                    <h5 class="card-text text-center text-white">Game 1 </h5>
                                </div>
                                </div>
                            </div>
                                    
                                </div>
                        </div>
                
            </div>    
            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h2>Lorem Ipsum Dolor</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>

            <div class="line"></div>

            <h3>Lorem Ipsum Dolor</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
    </div>

    <div class="overlay"></div>

    <!-- jQuery CDN - Slim version (=without AJAX) -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <!-- Popper.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <!-- Bootstrap JS -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <!-- jQuery Custom Scroller CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/malihu-custom-scrollbar-plugin/3.1.5/jquery.mCustomScrollbar.concat.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function () {
            $("#sidebar").mCustomScrollbar({
                theme: "minimal"
            });

            $('#dismiss, .overlay').on('click', function () {
                $('#sidebar').removeClass('active');
                $('.overlay').removeClass('active');
            });

            $('#sidebarCollapse').on('click', function () {
                $('#sidebar').addClass('active');
                $('.overlay').addClass('active');
                $('.collapse.in').toggleClass('in');
                $('a[aria-expanded=true]').attr('aria-expanded', 'false');
            });
        });
    </script>
</body>

</html>