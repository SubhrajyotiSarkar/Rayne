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
<body>
<!-- recent search -->
<!-- whole navbar code -->

<section id="header">
  <a onclick="window.location.href='index.html';"><img src="img/logo.png" class="logo" alt=""></a>

  <div class="navbar_all">
    <ul id="navbar">
      <li><a onclick="window.location.href='login_index.php';">Home</a></li>
      <li><a class="active" onclick="window.location.href='shop.php';">Shop</a></li>
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
<section id="product1" class="section-p1 ">
            <h2><?php echo "View All Collections Of Us";?></h2>
            <div class="pro-container">
                <?php
                    $sql_product= "select * from product_details ";
                    $result_product=mysqli_query($conn,$sql_product);
                    $row_no_product=mysqli_num_rows($result_product);
                    if($row_no_product > 0){
                        while($new_row_product=mysqli_fetch_assoc($result_product)){
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
                <?php }}?>
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