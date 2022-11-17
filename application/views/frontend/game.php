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

    


            <!-- //main content -->
            <div>
                <br><br>
            </div>
            
            <div  class="col-sm-11 mx-auto" style="">  
           
                <div class="row"> 
           
                    <div class="col-sm-8 mx-auto" style=" "> 
                        <div class="row">
                            <div class="col-sm-12" style="background:#3765dd; ">
                            <center>
                               <img class="py-4" src="https://cdn.cloudflare.steamstatic.com/steam/apps/921060/capsule_616x353.jpg?t=1667311420" alt="" width="90%" style=" border-radius: 50px;">
                            </center>
                            
                            </div>
                            <div class="col-sm-11 mx-auto">
                                <h4>hello</h4>
                                <h1>hello</h1>

                                <br>

                                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos alias voluptate at maiores, aut recusandae dolorum earum tenetur reprehenderit maxime repellat. Quia, placeat nemo. Illo ad quod natus vero beatae!</p>
                                    <div>
                                        <img src="" alt="" width="1000px" height="150px" style="background:#fff; border-radius: 20px">
                                    </div>

                                    <br>
                                    <h4>reviews</h4>
                                    <div class="col-sm-12 mx-auto" style="background:rgb(131, 158, 229,0.7); border-radius:20px">
                                        <h1>hello</h1>
                                    </div>

                                    <div class="col-sm-12 mx-auto" >
                                    <div class="row">
                                            <div class="col-sm-3  " style=" ">
                                                <div class="card " style="width: 15rem;  background:#3765dd;">
                                                    <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                                    <div class="card-body">
                                                        <h5 class="card-text text-center text-white">Game 1 </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3  " style=" ">
                                                <div class="card " style="width: 15rem;  background:#3765dd;">
                                                    <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                                    <div class="card-body">
                                                        <h5 class="card-text text-center text-white">Game 1 </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3  " style=" ">
                                                <div class="card " style="width: 15rem;  background:#3765dd;">
                                                    <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                                    <div class="card-body">
                                                        <h5 class="card-text text-center text-white">Game 1 </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3  " style=" ">
                                                <div class="card " style="width: 15rem;  background:#3765dd;">
                                                    <img class="card-img-top" src="https://ftw.usatoday.com/wp-content/uploads/sites/90/2021/11/SkyrimSpecialEditionRiverwood_1465779535_bmp_jpgcopy.jpg?w=1000&h=600&crop=1" alt="Card image cap" style=" border-radius: 20px;">
                                                    <div class="card-body">
                                                        <h5 class="card-text text-center text-white">Game 1 </h5>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-sm-3  " style=" ">
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
                        </div>
                    </div>
                
                    <div class="col-sm-4 mx-auto" style="  border-radius: 10px;"> 
                    <div class="row">
                            <div class="col-sm-12" style="background:#3765dd; ">
                            <center>
                               <img class="py-4" src="https://cdn.cloudflare.steamstatic.com/steam/apps/921060/capsule_616x353.jpg?t=1667311420" alt="" width="100%" style=" border-radius: 30px;">
                            </center>

                            <div class="row">
                                <div class="col text-center"><a href=""><p>Similiar</p></a></div>
                                <div class="col text-center"><a href=""></a><p>Popular</p></div>
                                <div class="col text-center"><a href=""></a><p>Recommended</p></div>
                            </div>
                            <div class="row my-4">
                                <div class="col"><a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuLJaumvJwvjhgjUH5QqGTRv5WbLEslRq2dP6vEKb4Mfu8HIFefoFEZOa3fKD8ho-q1A4&usqp=CAU" alt="" width="90%" style="border-radius:10px;"></a></div>
                                <div class="col "><a href=""><p>Popular</p></a>
                                <p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. 
                                </p>
                                </div>
                                
                               
                            </div>

                            <div class="row my-4">
                                <div class="col"><a href=""><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQuLJaumvJwvjhgjUH5QqGTRv5WbLEslRq2dP6vEKb4Mfu8HIFefoFEZOa3fKD8ho-q1A4&usqp=CAU" alt="" width="90%" style="border-radius:10px;"></a></div>
                                <div class="col "><a href=""></a><p>Popular</p></div>
                               
                            </div>
                            
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>    
            
           <div>
            <br>
            <br>
            <br>
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