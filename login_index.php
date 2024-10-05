<?php
    include("connection.php");
    session_start();
    $user = $_SESSION["email_login"];
    $sql= "select * from customer_details where c_email='$user'";
    $result=mysqli_query($conn,$sql);
    $row_no=mysqli_num_rows($result);
    if($row_no > 0){
        if($new_row=mysqli_fetch_assoc($result)){
            $user_name = $new_row["c_name"];
            $first_char = substr($user_name,0,1);
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

        <link rel="apple-touch-icon" sizes="180x180" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="32x32" href="img/apple-touch-icon.png">
        <link rel="icon" type="image/png" sizes="16x16" href="img/apple-touch-icon.png">

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/508c111fc7.js" crossorigin="anonymous"></script>
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>

        <link href='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css' rel='stylesheet'>
        <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css' rel='stylesheet'>
        <link rel="stylesheet" href="style.css?v=<?php echo time(); ?>">

    </body>

    </head>

    <body onload="myLoading()">

        <div id="preloader"> </div

        <!-- bottom scroll arrow -->
        <div class="topbtn">
            <a href="#top-nav"><img src="img\upper_arrow.png" alt="" class="topbtn-img"></a>
        </div>

<!-- topnav -->
        <div class="top_nav" id="top-nav">
            <div class="container top_nav_container">
                <div class="top_nav_wrapper">
                <p class="tap_nav_p">
                    Summer Sale For All Swim Suits And Free Express Delivery - OFF 50%!
                </p>
                </div>
            </div>
        </div>
<!-- whole navbar code -->

<section id="header">
  <a onclick="window.location.href='index.html';"><img src="img/logo.png" class="logo" alt=""></a>

  <div class="navbar_all">
    <ul id="navbar">
      <li><a class="active" onclick="window.location.href='login_index.php';">Home</a></li>
      <li><a onclick="window.location.href='shop.php';">Shop</a></li>
      <li><a onclick="window.location.href='blog.php';">Blog</a></li>
      <li><a onclick="window.location.href='about.php';">About</a></li>
      <li><a onclick="window.location.href='contact.php';">Contact</a></li>
      <li><a id="search-bar">Search</a></li>
      <li id="lg-bag"><a onclick="window.location.href='cart.php';"><i class="fa-solid fa-bag-shopping"></i></a></li>
      <li id="profile">
        <div class="dropdown" data-dropdown>
          <button id="dropdownbtn" class="link drop_font" data-dropdown-button><?php echo  $first_char ?></button>
          <div class="dropdown-menu information-grid">
            <div>
              <div class="dropdown-links">
                <a href="logoutuser.php" class="link"><i class="fa-solid fa-right-from-bracket"></i> Logout</a>
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

  <div class="search-box">
    <input type="search" placeholder="search here">
  </div>
</section>
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


<!-- whole navbar code -->



<!-- slider code -->
        <!-- <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
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
        </div> -->
          <!-- <section id="hero">
            <h4>Trade-in-offer</h4>
            <h2>Super Value Deals</h2>
            <h1>on all products</h1>
            <p>Save more with coupons & up to 70% off! </p>
            <button>Shop Now</button>
          </section> -->

          <!-- <section>
            <img src="img/blog/b1.jpg" class="rounded-0" alt="...">
            <img src="img/blog/b1.jpg" class="rounded-1" alt="...">
            <img src="img/blog/b1.jpg" class="rounded-2" alt="...">
            <img src="img/blog/b1.jpg" class="rounded-3" alt="...">
          </section> -->

<!-- category_suggest -->
<br><br><section class="category_suggest">
            <a href="product_find.php?category=saree"><div >
                <img src="img/saree.jpg" alt="">
                <center><p>Sarees</p></center>
            </div></a>
            <a href="product_find.php?category=kurti"><div>
                <img src="img/kurti.jpg" alt="">
                <center><p>Kurti's</p></center>
            </div></a>
            <a href="product_find.php?category=t-shirt"><div>
                <img src="img/tshirt.jpg" alt="">
                <center><p>Gents T-shirts</p></center>
            </div></a>
            <a href="product_find.php?category=shirt"><div>
                <img src="img/shirt.jpg" alt="">
                <center><p>Gents Shirts</p></center>
            </div></a>
            <a href="product_find.php?category=jeans"><div>
                <img src="img/jeans.jpg" alt="">
                <center><p>Gents Jeans</p></center>
            </div></a>
            <a href="product_find.php?category=ladies_tshirt"><div>
                <img src="img/tshirt.jpg" alt="">
                <center><p>Ladies T-shirts</p></center>
            </div></a>
            <a href="product_find.php?category=ladies_shirt"><div>
                <img src="img/shirt.jpg" alt="">
                <center><p>Ladies Shirts</p></center>
            </div></a>
            <a href="product_find.php?category=ladies_jeans"><div>
                <img src="img/jeans.jpg" alt="">
                <center><p>Ladies Jeans</p></center>
            </div></a>
        </section>

<!-- Categories Section Start -->
<section class="categories spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3">
                    <div class="categories__text">
                        <h2>Clothings Hot <br /> <span>Kurti Collection</span> <br /> Accessories</h2>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="categories__hot__deal">
                        <img src="img/dress.png" alt="" width="525px">
                        <div class="hot__deal__sticker">
                            <span>Sale Of</span>
                            <h5>₹289</h5>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 offset-lg-1">
                    <div class="categories__deal__countdown">
                        <span>Deal Of The Week</span>
                        <h2>Black Fashion Kurti</h2>
                        <div class="categories__deal__countdown__timer" id="countdown">
                            <p id="demo"></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        
    </style>
    <!-- Categories Section End -->
    <!-- recent search -->
    <section id="product1" class="section-p1 ">
            <h2>Recent Search</h2>
            <div class="pro-container">
                <?php
                    $sql_product= "select * from product_details";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count = $count+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <div>
                        <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    </div>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count==5){ break;}
                    }
                    } 
                ?>
            </div>
            <!-- <div class="container_btn">
                <button class="normal1">VIEW ALL PRODUCTS</button>
            </div> -->
          </section> 

      <!-- service -->

          <section id="feature" class="section-p1">
          <?php 
          $array[100]=0;
            for($i=1; $i<=6; $i++){
                $preference = random_int(1,6);
                while(in_array($preference,$array)){
                    $preference = random_int(1,6);
                }
                $array[]=$preference;
                if($preference==1){
            ?>
                    <div class="fe-box">
                        <img src="img/features/f1.png" alt="">
                        <h6>Free Shipping</h6>
                    </div>
        <?php   }  
                elseif($preference==2){
            ?>
                    <div class="fe-box">
                        <img src="img/features/f2.png" alt="">
                        <h6>Online Order</h6>
                    </div>
        <?php   } 
                elseif($preference==3){ ?>
                    <div class="fe-box">
                        <img src="img/features/f3.png" alt="">
                        <h6>Save Money</h6>
                    </div>
        <?php   }   
                elseif($preference==4){
        ?>
                    <div class="fe-box">
                        <img src="img/features/f4.png" alt="">
                        <h6>Promotions</h6>
                    </div>
        <?php   }
                elseif($preference==5){
        ?>
                    <div class="fe-box">
                        <img src="img/features/f5.png" alt="">
                        <h6>Happy Sell</h6>
                    </div>
        <?php   }
                elseif($preference==6){
        ?>
                    <div class="fe-box">
                        <img src="img/features/f6.png" alt="">
                        <h6>F24/7 Support</h6>
                    </div>
        <?php   }
            }?>
          </section>

          <!-- Feature product -->

          <section id="product1" class="section-p1">
            <h2>Feature Products</h2>
            <div class="pro-container">
                <?php
                    $sql_product= "select * from product_details";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count1 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count1 = $count1+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count1==15){ break;}                     
                    }
                    } 
                ?>
            </div>
            <div class="container_btn">
                <button class="normal1">VIEW ALL PRODUCTS</button>
            </div>
          </section> 

          <!-- banner -->
          <br><br><section class="section_trend"> 
            <div class="container">
                <div class="trending">
                    <div class="trending_content">
                        <p class="trending_p">Check Out</p>
                        <h2 class="trending_title">Enhance Your Music Experience</h2>
                        <h3><a href="#" class="trending_btn" color="white">Our Music Site</a></h3>
                    </div>
                    <img src="img/speaker.png" alt="" class="trending_img" />
                </div>
            </div>
          </section><br>

<!-- new arrivals -->
        <section id="product1" class="section-p1">
            <h2>New Arrivals</h2>
            <p>Summer Colletion New Mordern Design</p>
            <div class="pro-container">
            <?php
                    $sql_product= "select * from product_details where product_category='shirt' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                            <?php
                    $sql_product= "select * from product_details where product_category='t-shirt' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                <?php
                    $sql_product= "select * from product_details where product_category='jeans' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                            <?php
                    $sql_product= "select * from product_details where product_category='saree' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                            <?php
                    $sql_product= "select * from product_details where product_category='kurti' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                <?php
                    $sql_product= "select * from product_details where product_category='ladies_tshirt' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                                            <?php
                    $sql_product= "select * from product_details where product_category='ladies_shirt' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                                            <?php
                    $sql_product= "select * from product_details where product_category='ladies_jeans' order by product_id desc";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
            </div>

        </section>

        <section>
                    <div class="banner">
                    <div class="banner-content">
                        <h1>Welcome to Kolkata Kravings</h1>
                        <p>Serving the best dishes to satisfy your taste buds.</p>
                        <a href="#" class="btn">Check It Out</a>
                    </div>
                </div>
                <style>
                    .banner {
    width: 100%;
    height: 500px;
    background-image: url('https://images.unsplash.com/photo-1553621042-f6e147245754?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=MnwzNjUyOXwwfDF8c2VhcmNofDEwfHxmb29kJTIwcmVzdGF1cmFudHxlbnwwfHx8fDE2MzA4NTc4Nzk&ixlib=rb-1.2.1&q=80&w=4000');
    background-size: cover;
    background-position: center;
    position: relative;
}

.banner::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5); /* Dark overlay */
}

.banner-content {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    text-align: center;
    color: white;
}

.banner-content h1 {
    font-size: 4rem;
    margin-bottom: 20px;
    color: white;
}

.banner-content p {
    font-size: 2.5rem;
    margin-bottom: 30px;
    color: white;
}

.btn {
    padding: 20px 30px;
    background-color: #ff523b;
    color: white;
    text-decoration: none;
    font-size: 2rem;
    border-radius: 5px;
    transition: background-color 0.3s ease;
}

.btn:hover {
    background-color: #e74c3c;
}
                </style>
        </section>
<!-- suggestion -->
<br><br><section class="section">
      <div class="container">
        <center>
        <h2>Our Suggestion For You</h2><br><br>
        </center>
        <div class="gallery">
          <div class="gallery_item gallery_item_1">
            <img
              src="https://assets.myntassets.com/h_720,q_90,w_540/v1/assets/images/25067594/2023/9/20/e0914c7c-00d5-4144-a227-df29377f503f1695206780022TokyoTalkiesWomenBlueRelaxedFitMildlyDistressedLightFadeJean1"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Best Jeans</div>
              <a href="#" class="trending_btn">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_2">
            <img
              src="https://brandmandir.com/media/catalog/product/cache/411a7c368a356a11933f7218f5d4cdaa/t/m/tmpTGC2685149_1.jpg"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Fashion Saree</div>
              <a href="product_find.php?category=saree" class="trending_btn">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_3">
            <img
              src="https://triprindia.com/cdn/shop/files/1_7ffb3a60-4e49-43d8-9f12-7b0713012811_1200x1500.jpg?v=1717658137"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">T-Shirts</div>
              <a href="product_find.php?category=t-shirt" class="trending_btn">SHOP NOW</a>
            </div>
          </div>
          <div class="gallery_item gallery_item_4">
            <img
              src="https://m.media-amazon.com/images/I/61u2ObHtoYL._SY741_.jpg"
              alt=""
              class="gallery_item_img" />
            <div class="gallery_item_content">
              <div class="gallery_item_title">Kurti and Churidars</div>
              <a href="product_find.php?category=kurti" class="trending_btn">SHOP NOW</a>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- mens section -->
<section id="product1" class="section-p1">
            <h2>Men's Collection</h2>
            <p>Summer Colletion New Mordern Design</p>
            <div class="pro-container">
                        <?php
                    $sql_product= "select * from product_details where product_category='shirt'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                            <?php
                    $sql_product= "select * from product_details where product_category='t-shirt'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                <?php
                    $sql_product= "select * from product_details where product_category='jeans'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
            </div>
            <div class="container_btn">
            <a href="collections.php?category=men"><button class="normal1">VIEW ALL PRODUCTS</button></a>
            </div>
          </section>

          <!-- banner -->
          <section id="banner" class="section-m1">
            <h4>Repair Service</h4>
            <h2>Up to <span>70% off</span> All t-shirts & Accessories</h2>
            <a href="shop.php"><button class="normal">Explore More</button></a>
          </section>

          <!-- Female's Section -->
        <section id="product1" class="section-p1">
            <h2>Female's Collection</h2>
            <p>Summer Colletion New Mordern Design</p>
            <div class="pro-container">
            <?php
                    $sql_product= "select * from product_details where product_category='saree' ";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                            <?php
                    $sql_product= "select * from product_details where product_category='kurti'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                <?php
                    $sql_product= "select * from product_details where product_category='ladies_tshirt'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                                            <?php
                    $sql_product= "select * from product_details where product_category='ladies_shirt'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
                                            <?php
                    $sql_product= "select * from product_details where product_category='ladies_jeans'";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    $count2 = 0;
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
                            $count2 = $count2+1;
                            $product_id = $new_row_product["product_id"];
                            $product_name = $new_row_product["product_name"];
                            $product_price = $new_row_product["product_price"];
                            $product_description = $new_row_product["product_description"];
                            $product_category = $new_row_product["product_category"];
                            $product_gender = $new_row_product["product_gender"];
                            $company_name = $new_row_product["company_name"];
                            $product_image = $new_row_product["product_image"];
                            $product_varient_id = $new_row_product["product_varient_id"];	
                ?>
                <div class="pro">
                    <a href="sproduct.php?product=<?php echo $product_id;?>"><img src="<?php echo $product_image; ?>" class="product_pro_image" alt=""></a>
                    <div class="des">
                        <span><?php echo $company_name; ?></span>
                        <h5><?php echo $product_name; ?></h5>
                        <div class="star">
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                            <i class="fas fa-star"></i>
                        </div>
                        <h4>₹<?php echo $product_price; ?></h4>
                    </div>
                    <a href="#"><i class="fa-solid fa-cart-shopping" style="color: #880808;" id="cart"></i></a>
                </div>
                <?php
                    if($count2==10){break;}                     
                    }
                    } 
                ?>
            </div>
            <div class="container_btn">
            <a href="collections.php?category=women"><button class="normal1">VIEW ALL PRODUCTS</button></a>
            </div>
          </section>



          <!-- <section id="sm-banner" class="section-p1">
            <table width="100%">
                <tr width="45%">
                    <td class="banner-box-td">
                        <div class="banner-box">
                        <h4>Crazy Deals</h4>
                        <h2>buy 1 get 1 free</h2>
                        <span>The best classic dress is on sale at Rayne</span>
                        <button class="white">Learn More</button>
                        </div>
                    </td>
                    <td width="10%"></td>
                    <td width="45%">
                        <div class="banner-box banner-box2">
                        <h4>Spring/Summer</h4>
                        <h2>Upcoming Season</h2>
                        <span>The best classic dress is on sale at Rayne</span>
                        <button class="white">Collection</button>
                        </div>
                    </td>
                </tr>
            </table>
          </section> -->
<br><br>
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

<!-- our trusted partners -->
          <section class="pt-5 pb-5">
            <center>
                <h2>Our Trusted Partners</h2>
                <p>Always in your service</p>
            </center>
            <div class="container">
                <div class="row">
                    <div class="col-6">
                        <h3 class="mb-3"></h3>
                    </div>
                    <div class="col-6 text-right">
                        <a class="btn btn-primary mb-3 mr-1" href="#carouselExampleIndicators2" role="button" data-slide="prev">
                            <i class="fa fa-arrow-left"></i>
                        </a>
                        <a class="btn btn-primary mb-3 " href="#carouselExampleIndicators2" role="button" data-slide="next">
                            <i class="fa fa-arrow-right"></i>
                        </a>
                    </div>
                    <div class="col-12">
                        <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTBQQhlSg4704iCND7P9V0-T1h_dtJU-pawO62k1tFBkA&s&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=7c625ea379640da3ef2e24f20df7ce8d">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://scontent.fccu16-1.fna.fbcdn.net/v/t1.6435-9/116313422_980193119092248_4345385204247229243_n.jpg?_nc_cat=101&ccb=1-7&_nc_sid=5f2048&_nc_ohc=-f9MkvflqfwQ7kNvgHp1Wa0&_nc_ht=scontent.fccu16-1.fna&oh=00_AYDgn-rQ8vUfICmpbKx9UUzraK0lzfThI3muh19wlx-PdQ&oe=66927569&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=42b2d9ae6feb9c4ff98b9133addfb698">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img  id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbvtyXWlojpk7IYvWMngq7ra61aW5bZj3WncMrUrRsOQ&s&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3d2e8a2039c06dd26db977fe6ac6186a">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSQJNQKlAki8wtSYFpHQEzaGAEvmabM9YU4EGbMkQsM3lA1C522muHI1IY&s=10&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=3f317c1f7a16116dec454fbc267dd8e4">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTq_nL1N2L60zvRR26AazTAkO8PjvQ4mDNcPfuUGZ58x8-nL-m28RFMokpP&s=10&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ebadb044b374504ef8e81bdec4d0e840">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQB7Wt32dukAZxHg9V8xY3XWqZzy4IMDhxJcw&usqp=CAU&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=0754ab085804ae8a3b562548e6b4aa2e">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <div class="row">

                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQ4dyEvRZViYe6eaMUcxX3xxthmonEUUjv2yw&usqp=CAU&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=ee8417f0ea2a50d53a12665820b54e23">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRM-XoUsLZQ_061b0rPgwVCwT7Z7AH8UeqpmLAKHPSLmVGq9q_izyy8rTk&s=10&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=8ac55cf3a68785643998730839663129">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mb-3">
                                            <div class="card">
                                                <img id="photo" class="img-fluid" alt="100%x280" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSUXeDgW5Khx2r5IftQbdSKzHJ-dsdwQAvn9e0o8oZ3Np0ELqYkk9l4zDA&s=10&amp;q=80&amp;fm=jpg&amp;crop=entropy&amp;cs=tinysrgb&amp;w=1080&amp;fit=max&amp;ixid=eyJhcHBfaWQiOjMyMDc0fQ&amp;s=5ee4fd5d19b40f93eadb21871757eda6">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
<!-- footer -->

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
                <p>From App Store or Google Play</p>
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
        <script src="login.js" defer></script>
        <script src="script1.js" defer></script>
        <script type='text/javascript' src=''></script>
        <script type='text/javascript' src='https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js'></script>
        <script type='text/javascript' src='https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.min.js'></script>
        <script>
                        // search

                        let searchbar = document.querySelector('#search-bar');
                        let searchbox = document.querySelector('.search-box');

                        searchbar.onclick = () =>{
                            searchbox.classList.toggle('active')
                        }
                    </script>
    </body>

</html>