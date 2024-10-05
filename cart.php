<?php
    session_start();
    include("connection.php");
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
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.core.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/css/glide.theme.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <script src="https://kit.fontawesome.com/508c111fc7.js" crossorigin="anonymous"></script>
        <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet"/>
        <link rel="stylesheet" href="style.css">
    </head>

    <body>
<!-- whole navbar code -->

<section id="header">
  <a onclick="window.location.href='index.html';"><img src="img/logo.png" class="logo" alt=""></a>

  <div class="navbar_all">
    <ul id="navbar">
      <li><a onclick="window.location.href='login_index.php';">Home</a></li>
      <li><a onclick="window.location.href='shop.php';">Shop</a></li>
      <li><a onclick="window.location.href='blog.php';">Blog</a></li>
      <li><a onclick="window.location.href='about.php';">About</a></li>
      <li><a onclick="window.location.href='contact.php';">Contact</a></li>
      <li><a id="search-bar">Search</a></li>
      <li id="lg-bag"><a class="active" onclick="window.location.href='cart.php';"><i class="fa-solid fa-bag-shopping"></i></a></li>
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
          <section id="page-header" class="cart-header">
            <h2>Your Shopping Cart</h2>
            <p>Sales tax will be calculated during checkout where applicable</p>
          </section>

          <section id="cart">
            <table width="100%">
                <thead width="100%">
                    <tr width="100%">
                        <td width="19.5%">Action</td>
                        <td width="5%">Image</td>
                        <td width="19.5%">Product Name</td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td><td width="19.5"></td>
                        <td width="19.3%">Price</td>
                        <td width="19.5%">Size</td>
                        <td width="19.5%">Quantity</td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5%">Subtotal</td>
                    </tr>
                </thead>
                <tbody>
                <?php
          
                  $sql_product= "select * from cart where user_id='$user'";
                  $result_product=mysqli_query($conn,$sql_product);
                  $row_no_product=mysqli_num_rows($result_product);
                  if($row_no_product > 0){
                    $count_item = 0;
                    $total_price = 0;
                    while($new_row_product=mysqli_fetch_assoc($result_product)){
                        $id = $new_row_product["id"];
                        $user_id = $new_row_product["user_id"];
                        $product_id = $new_row_product["product_id"];
                        $product_name = $new_row_product["product_name"];
                        $product_price = $new_row_product["product_price"];
                        $product_description = $new_row_product["product_description"];
                        $product_category = $new_row_product["product_category"];
                        $company_name = $new_row_product["company_name"];
                        $product_image = $new_row_product["product_image"];
                        $product_varient_id = $new_row_product["product_varient_id"];
                        $size = $new_row_product["size"];
                        $quantity = $new_row_product["quantity"];

                        $count_item++;
                        $total_price = $total_price + $product_price;
                ?>
                    <tr width="100%">
                        <td width="19.5%">
                        <a href="cart_update.php?remove=<?php echo $id; ?>" onclick="return confirm('remove item from cart?')" class="delete-btn"><i class="far fa-times-circle"></iclass></i></a>
                        </td>
                        <td width="5%"><img src=<?php echo $product_image; ?> alt=""></td>
                        <td width="19.5%"><?php echo $product_name; ?></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td><td width="19.5"></td>
                        <td width="19.3%">₹ <?php echo $product_price; ?></td>
                        <td width="19.5%"><?php echo $size; ?></td>
                        <td width="19.5%">
                          <form action="cart_update.php" method="POST">
                            <input type="hidden" name="update_quantity_id"  value="<?php echo $id;?>" >
                            <input type="number" name="quant" value=<?php echo $quantity; ?>> 
                            <input type="submit" name="submit_update" value="update">
                          </form>
                        </td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <td width="19.5"></td>
                        <?php $multiply = $quantity*$product_price; ?>
                        <td width="19.5%">₹ <?php echo $multiply; ?></td>
                    </tr>
                    <?php }} ?>
                </tbody>
            </table>
          </section>

          <section id="cart-add" class="section-p1">
            <div id="coupon">
                <!-- <h3>Apply Coupon</h3>
                <div>
                    <input type="text" placeholder="Enter Your Coupon">
                    <button class="normal">Apply</button>
                </div> -->
            </div>


            <?php  error_reporting(E_ALL & ~E_NOTICE);  // Show all errors except notices?>



            <div id="subtotal">
                <h3>Cart Totals</h3>
                <table>
                    <tr>
                        <td>Cart Subtotal</td>
                        <td><?php echo "₹ " . $total_price?></td>
                    </tr>
                    <tr>
                        <td>Shipping</td>
                        <td><?php echo "₹ ".$count_item*50 . " [ ₹ 50 for each product ] ";?></td>
                    </tr>
                    <tr>
                        <td><strong>Total</strong></td>
                        <?php $total_shipping_price = $count_item * 50; 
                              $total_amount=$total_price+$total_shipping_price ?>
                        <td><strong><?php echo "₹ " . $total_amount;?></strong></td>
                    </tr>
                </table>
                <?php $url = "cart_update.php?checkout=" . urlencode($user) . "&size_id=" . urlencode($size)."&quantity_id=" . urlencode($quantity); ?>
                <a href="<?php echo $url;?>"><button type="submit" name="checkout" class="normal">Proceed to checkout</button></a>
            </div>

          </section>

          <section id="page-header">
            <h2>Your Orders</h2>
          </section>
        <center>
          <section id="cart">
            <table width="100%">
                <thead width="100%">
                    <tr width="100%">
                        <td width="25%">Date</td>
                        <td width="25%">Bill Number</td>
                        <!-- <td width="25%">Total Item</td> -->
                        <td width="25%">Total Amount</td>
                        <td width="25%">View Bill</td>
                    </tr>
                </thead>
                <tbody>
                <?php
          
                  $sql_product= "select * from customer_orders where user_id='$user'";
                  $result_product=mysqli_query($conn,$sql_product);
                  $row_no_product=mysqli_num_rows($result_product);
                  if($row_no_product > 0){
                    $total_price = 0;
                    $row_no_product12= $row_no_product;
                    while($new_row_product=mysqli_fetch_assoc($result_product)){
                        $date = $new_row_product["bill_date"];
                        $bill = $new_row_product["bill_id"];
                        $user_id = $new_row_product["user_id"];
                        $product_id = $new_row_product["product_id"];
                        $product_name = $new_row_product["product_name"];
                        $product_price = $new_row_product["product_price"];
                        $total_price12 = $total_price + $product_price;
                      
                ?>
                    <tr width="100%">
                        <td width="25%"><?php echo $date; ?></td>
                        <td width="25%"><?php echo $bill; ?></td>
                        
                        <?php $total_price = $total_price+($row_no_product12*50);?>
                        <td width="25%">₹ <?php echo $total_price12; ?></td>
                        <?php if($row_no_product > 0){?>
                        <td width="25%"><a href="bill.php?bill=<?php echo $bill;?>"><button name="submit" class="normal">Check Bill</button></a></td>
                        <?php } ?>
                      </tr>
                      <?php }} ?>
                </tbody>
            </table>
          </section>
        </center>
          
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
  
          <!-- <div class="popup hide-popup">
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
          </div> -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/Glide.js/3.4.1/glide.min.js"></script>  
        <script src="https://cdn.jsdelivr.net/npm/darkmode-js@1.5.7/lib/darkmode-js.min.js"></script>
        <script src="script.js"></script>
    </body>

</html>

<style>
  /* General Styles */
#cart {
    overflow-x: auto; /* Enable horizontal scrolling */
}

#cart table {
    width: 100%;
    border-collapse: collapse;
    min-width: 800px; /* Minimum width to ensure proper scrolling */
}

#cart th, #cart td {
    padding: 10px;
    text-align: left;
    border-bottom: 1px solid #ddd;
}

#cart img {
    max-width: 100px;
    height: auto;
}

.delete-btn {
    color: #ff0000; /* Red color for delete button */
    text-decoration: none;
}

#cart-add {
    padding: 20px;
}

#coupon, #subtotal {
    margin-bottom: 20px;
}

#subtotal table {
    width: 100%;
    border-collapse: collapse;
}

#subtotal td {
    padding: 10px;
    border-bottom: 1px solid #ddd;
}

.normal {
    padding: 10px 20px;
    background-color: #000;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.normal:hover {
    background-color: #333;
}

/* Responsive Styles */
@media (max-width: 1024px) {
    #cart table {
        font-size: 14px;
    }

    #cart img {
        max-width: 80px;
    }

    #cart td, #cart th {
        padding: 8px;
    }

    #subtotal table {
        font-size: 14px;
    }
}

@media (max-width: 768px) {
    #cart table {
        font-size: 12px;
    }

    #cart img {
        max-width: 60px;
    }

    #cart td, #cart th {
        padding: 6px;
    }

    #coupon input, #coupon button {
        width: 100%;
        margin-bottom: 10px;
    }

    #subtotal table {
        font-size: 12px;
    }

    #subtotal button {
        width: 100%;
    }
}

@media (max-width: 480px) {
    #cart table {
        font-size: 10px;
    }

    #cart img {
        max-width: 50px;
    }

    #cart td, #cart th {
        padding: 4px;
    }

    #coupon input, #coupon button {
        padding: 10px;
    }

    #subtotal table {
        font-size: 10px;
    }

    #subtotal button {
        padding: 10px;
    }
}

</style>