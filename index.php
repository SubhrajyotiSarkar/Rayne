<?php
include("connection.php");
function get_client_ip() {
    $ipaddress = '';
    if (isset($_SERVER['HTTP_CLIENT_IP']))
        $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
    else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_X_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
    else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
        $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
    else if(isset($_SERVER['HTTP_FORWARDED']))
        $ipaddress = $_SERVER['HTTP_FORWARDED'];
    else if(isset($_SERVER['REMOTE_ADDR']))
        $ipaddress = $_SERVER['REMOTE_ADDR'];
    else
        $ipaddress = 'UNKNOWN';
    return $ipaddress;
}

$ip_address = get_client_ip();
$sql1= "select * from session where ip_address='$ip_address'";
$result=mysqli_query($conn,$sql1);
$row_no=mysqli_num_rows($result);
if($row_no > 0){
    if($new_row=mysqli_fetch_assoc($result)){
        $category = $new_row["category"];
        $ip = $new_row["ip_address"];
        $email = $new_row["c_email"];
    }
    if($ip_address==$ip && $category=="user"){
        ini_set('session.gc_maxlifetime', 2592000); //
        // session_set_cokkie_params(2592000); //
        session_start();
        if(!isset($_SESSION['initiated'])){ //
            session_regenerate_id(); //
            $_SESSION['initiated']=true; //
        } //
        $_SESSION["email_login"]=$email; //
        // $sql2="insert into session (Email,Password,Category,Img) values ('$id','$pass','$x','$link')";
        // $result=mysqli_query($conn,$sql);
        echo "<script>document.location='login_index.php'</script>";
    }
    else{

    }
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Rayne</title>

        <!-- fav icon -->
        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/apple-touch-icon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/508c111fc7.js" crossorigin="anonymous"></script>
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
<!-- navbar -->
 <!-- whole navbar code -->

<section id="header">
  <a onclick="window.location.href='index.html';"><img src="img/logo.png" class="logo" alt=""></a>

  <div class="navbar_all">
    <ul id="navbar">
      <li><a class="active" onclick="window.location.href='index.php';">Home</a></li>
      <li><a onclick="showAlert()">Shop</a></li>
      <li><a onclick="showAlert()">Blog</a></li>
      <li><a onclick="showAlert()">About</a></li>
      <li><a onclick="showAlert()">Contact</a></li>
      <li id="lg-bag"><a onclick="showAlert()"><i class="fa-solid fa-bag-shopping"></i></a></li>
      <li id="profile">
                                <div class="dropdown" data-dropdown>
                                    <button  id= "dropdownbtn" class="link" data-dropdown-button><i class="fa-solid fa-user" style="color: #ffffff;"></i></button>
                                    <div class="dropdown-menu information-grid">
                                      <div>
                                          <div class="dropdown-links">
                                            <a href="login.html" class="link"><i class="fa-solid fa-user-plus"></i> Register</a>
                                            <a href="login.html" class="link"><i class="fa-solid fa-arrow-right-to-bracket"></i> Login</a>
                                            <!-- <a href="#" class="link"><i class="fa-solid fa-pen-to-square"></i> Edit</a>
                                            <a href="#" class="link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a> -->
                                          </div>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </li>
    </ul>
  </div>

  <div class="hamburger" id="hamburger">
    <i class="fas fa-bars"></i>
  </div>
</section>
<script>
  function showAlert() {
    alert('You have to register your self first or If you have an account to login first');
  }
</script>

<style>
#header{
    height:90px;
}
.navbar_all {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding-top:30px;
}
.hamburger {
  display: none;
  cursor: pointer;
}

#navbar li {
  margin-bottom: 20px; 
}

@media (max-width: 977px) {
  .hamburger {
    padding-top: 10px;
    font-size: 2.5rem; /* Make it even larger on smaller screens */
  }
}
/* For screens smaller than 977px */
@media (max-width: 977px) {
  .navbar_all {
    display: none;
    flex-direction: column;
  }

  .navbar_all.show {
    display: flex;
  }

  .hamburger {
    display: block;
    position: absolute;
    right: 20px;
    top: 50%;  /* Align the top of the icon with the middle of the section */
    transform: translateY(-50%);  /* Center the icon vertically */
    font-size: 2rem; /* Adjust the size of the icon */
    cursor: pointer;
   }

  #navbar {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 10px;
  }

  #navbar li {
    margin-bottom: 10px;
  }

  .dropdown-menu {
    position: relative;
  }
}


/* Hide .navbar_all by default on small screens */
@media (max-width: 977px) {
  .navbar_all {
    display: none;
    position: absolute; /* Position it under the header */
    top: 100%; /* Move it just below the header */
    width: 100%;
    left: 0;
    flex-direction: column;
    background-color: #fff; /* Optional: background */
    z-index: 999;
  }

  /* Show the navbar when the 'show' class is added */
  .navbar_all.show {
    display: flex;
    height: max-content;
  }

  .hamburger {
    display: block;
    position: absolute;
    right: 20px;
    top: 50%;
    transform: translateY(-50%);
    font-size: 2.5rem;
    cursor: pointer;
  }

  #navbar {
    display: flex;
    flex-direction: column;
    align-items: flex-start;
    padding: 10px;
  }

  #navbar li {
    margin-bottom: 10px;
  }

  .dropdown-menu {
    position: relative;
  }
  #navbar li {
    margin-bottom: 15px; /* Add more space between list items on small screens */
  }
}


</style>
<script>
const hamburger = document.getElementById('hamburger');
const navbarAll = document.querySelector('.navbar_all');

hamburger.addEventListener('click', () => {
  navbarAll.classList.toggle('show');  // Toggles the visibility of navbar_all
});

</script>



<!-- slider code -->
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active c-item">
                <img src="img/slide1.jpg" class="d-block w-100 c-imgs" alt="Slide 1">
                <div id= "slidealign" class="carousel-caption top-0 mt-4">
                  <h4 id="slideh4">Trade-in-offer</h4>
                  <h2 id="slideh2">Super Value Deals</h2>
                  <h1 id="slideh1"class="display-1 fw-bolder text-capitalize">on all products</h1>
                  <p id="slidep" class="mt-5 fs-3 text-uppercase"><b>Save more with coupons & up to 70% off!</b></p>
                  <button id="slidershop" class="btn btn-primary px-4 py-2 fs-5 mt-5">Shop Now</button>
                </div>
              </div>
              <div class="carousel-item c-item">
                <img src="img/slide2.jpg" class="d-block w-100 c-imgs" alt="Slide 2">
                <div id= "slidealign2"class="carousel-caption top-0 mt-4">
                  <h4 id="slideh4-1">Trade-in-offer</h4>
                  <h2 id="slideh2-1">Super Value Deals</h2>
                  <h1 id="slideh1-1"class="display-1 fw-bolder text-capitalize">on all products</h1>
                  <p id="slidep-1"class="mt-5 fs-3 text-uppercase"><b>Save more with coupons & up to 70% off!</b></p>
                  <button id="slidershop" class="btn btn-primary px-4 py-2 fs-5 mt-5">Shop Now</button>
                </div>
              </div>
              <div class="carousel-item c-item">
                <img src="img/slide3.jpg" class="d-block w-100 c-imgs" alt="Slide 3">
                <div id="slidealign3" class="carousel-caption top-0 mt-4">
                  <h4 id="slideh4-2">Trade-in-offer</h4>
                  <h2 id="slideh2-2">Super Value Deals</h2>
                  <h1 id="slideh1-2" class="display-1 fw-bolder text-capitalize">on all products</h1>
                  <p id="slidep-2" class="mt-5 fs-3 text-uppercase"><b>Save more with coupons & up to 70% off!</b></p>
                  <button id="slidershop" class="btn btn-primary px-4 py-2 fs-5 mt-5">Shop Now</button>
                </div>
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="visually-hidden">Next</span>
            </button>
          </div> 
           <!-- <section id="hero">
            <h4>Trade-in-offer</h4>
            <h2>Super Value Deals</h2>
            <h1>on all products</h1>
            <p>Save more with coupons & up to 70% off! </p>
            <button>Shop Now</button>
          </section> -->
          
          <section id="feature" class="section-p1">
            <div class="fe-box">
                <img src="img/features/f1.png" alt="">
                <h6>Free Shipping</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f2.png" alt="">
                <h6>Online Order</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f3.png" alt="">
                <h6>Save Money</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f4.png" alt="">
                <h6>Promotions</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f5.png" alt="">
                <h6>Happy Sell</h6>
            </div>
            <div class="fe-box">
                <img src="img/features/f6.png" alt="">
                <h6>F24/7 Support</h6>
            </div>
          </section>

          <section id="product1" class="section-p1">
            <h2>Featured Products</h2>
            <p>Summer Colletion New Mordern Design</p>
            <div class="pro-container">
                <div class="pro">
                    <img src="img/products/f1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f2.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f3.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f4.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f5.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f6.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f7.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/f8.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
            </div>
          </section>

          <section id="banner" class="section-m1">
            <h4>Repair Service</h4>
            <h2>Up to <span>70% off</span> All t-shirts & Accessories</h2>
            <button class="normal">Explore More</button>
          </section>
          
          <section id="product1" class="section-p1">
            <h2>New Arrivals</h2>
            <p>Summer Colletion New Mordern Design</p>
            <div class="pro-container">
                <div class="pro">
                    <img src="img/products/n1.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n2.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n3.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n4.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n5.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n6.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n7.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <div class="pro">
                    <img src="img/products/n8.jpg" alt="">
                    <div class="des">
                        <span>adidas</span>
                        <h5>Cartoon Astronaut T-Shirts</h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>$78</h4>
                    </div>
                    <a onclick="showAlert()"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
            </div>
          </section>

          <section id="sm-banner" class="section-p1">
                <div class="banner-box">
                    <h4>Crazy Deals</h4>
                    <h2>buy 1 get 1 free</h2>
                    <span>The best classic dress is on sale at Rayne</span>
                    <button class="white">Learn More</button>
                </div>
                <div class="banner-box banner-box2">
                    <h4>Spring/Summer</h4>
                    <h2>Upcoming Season</h2>
                    <span>The best classic dress is on sale at Rayne</span>
                    <button class="white">Collection</button>
                </div>
          </section>

          <section id="banner3">
                <div class="banner-box">
                    <h2>SEASON SALE</h2>
                    <h3>Winter Collection -50% OFF</h3>
                </div>
                <div class="banner-box banner-box2">
                    <h2>NEW FOOTWEAR COLLECTION</h2>
                    <h3>Spring / Summer 2024</h3>
                </div>
                <div class="banner-box banner-box3">
                    <h2>T-SHIRTS</h2>
                    <h3>New Trendy Prints</h3>
                </div>
          </section>

          <section id="newsletter" class="section-p1 section-m1">
            <div class="newstext">
                <h4>Sign Up For Newsletters</h4>
                <p>Get E-mail updates about our latest shop and <span>special offers.</span>
                </p>
            </div>
            <div class="form">
                <input type="text" placeholder="Your email address">
                <button class="normal">Sign Up</button>
            </div>
          </section>

          <footer class="section-p1">
            <div class="col">
                <img id="img" class="logo" src="img/logo1.png" alt="">
                <h4>Contact</h4>
                <p><strong>Address: </strong> 562 Wellington Road, Street 32, San Francisco</p>
                <p><strong>Phone: </strong> (+91) 89101 98575 / (+91) 83368 90358</p>
                <p><strong>Hours: </strong> 10:00 - 18:00, Mon - Sat</p>
                <div class="follow">
                    <h4>Follow Us</h4>
                    <div class="icon">
                        <i class="fab fa-facebook-f"></i>
                        <i class="fab fa-twitter"></i>
                        <i class="fab fa-instagram"></i>
                        <i class="fab fa-pinterest-p"></i>
                        <i class="fab fa-youtube"></i>
                    </div>
                </div>
            </div>

            <div id= "fabout" class="col">
                <h4>About</h4>
                <a href="#">About Us</a>
                <a href="#">Delivery Information</a>
                <a href="#">Privacy Policy</a>
                <a href="#">Terms & Conditions</a>
                <a href="#">Contact Us</a>
            </div>

            <div class="col">
                <h4>My Account</h4>
                <a href="#">Sign In</a>
                <a href="#">View Cart</a>
                <a href="#">My Wishlist</a>
                <a href="#">Track My Order</a>
                <a href="#">Help</a>
            </div>

            <div id="col" class="col install">
                <h4>Install App</h4>
                <p>From App Store or Goohle Play</p>
                <div class="row">
                    <img id="apple" src="img/pay/app.png" alt="">
                    <img id=" playstore" src="img/pay/play.png" alt="">
                </div>
                <p>Secured Payment Gateways</p>
                <img src="img/pay/pay.png" alt="">
            </div>

            <div class="copyright">
                <p>© 2024, Rayne - Ecommerce Website</p>
            </div>
          </footer>

            <!-- bottom scroll arrow -->
            <div>
                <a class="gotopbtn" href="#"> <i class="fas fa-arrow-up"></i> </a>
            </div>
  
          <div class="popup hide-popup">
            <div class="popup-content">
              <div class="popup-close">
                <i class='bx bx-x'></i>
              </div>
              <div class="popup-left">
                <div class="popup-img-container">
                  <img class="popup-img" src="./img/popup.jpg" alt="popup">
                </div>
              </div>
              <div class="popup-right">
                <div class="right-content">
                  <h1>Get Discount <span>50%</span> Off</h1>
                  <p>Sign up to our newsletter and save 30% for you next purchase. No spam, We promise!
                  </p>
                </div>
              </div>
            </div>
          </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
        <script src="script.js"></script>
    </body>

</html>