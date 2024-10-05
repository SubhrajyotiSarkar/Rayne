<?php
    session_start();
    include("connection.php");
    $user = $_SESSION["email_login"];
    $bill = $_GET['bill'];
    $sql= "select * from customer_details where c_email='$user'";
    $result=mysqli_query($conn,$sql);
    $row_no=mysqli_num_rows($result);
    if($row_no > 0){
        if($new_row=mysqli_fetch_assoc($result)){
            $user_name = $new_row["c_name"];
            $address = $new_row["c_name"];
            $phone = $new_row["c_phone"];
            $cat = $new_row["category"];
            $first_char = substr($user_name,0,1);
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="author" content="CodeHim">
      <title> Rayne -- Invoice </title>
      <!-- Style CSS -->
      <link rel="stylesheet" href="./css/style.css">
      <link rel="stylesheet" href="./css/demo.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css">
<link rel='stylesheet' href='//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css'>
   </head>
   <body>
   <?php 
                $sql_product= "select * from customer_orders where bill_id=$bill";
                $result_product=mysqli_query($conn,$sql_product);
                $row_no_product=mysqli_num_rows($result_product);
                if($row_no_product > 0){
                  while($new_row_product=mysqli_fetch_assoc($result_product)){
                      $bill_id = $new_row_product["bill_id"];
                      $bill_date = $new_row_product["bill_date"];
                  }
                }
          ?>
      <!--$%adsense%$-->
      <main class="cd__main">
         <div class="container invoice">
  <div class="invoice-header">
    <div class="row">
      <div class="col-xs-8">
        <a href="cart.php"><h3><- Go Back</h3></a><br>
        <h1>Invoice</h1>
        <h4 class="text-muted">NO: <?php echo $bill_id;?> | Date: <?php echo $bill_date;?></h4>
      </div>
      <div class="col-xs-4">
        <div class="media">
          <ul class="media-body list-unstyled">
            <li><strong>Rayne</strong></li>
            <li>Buy What Ever You Want</li>
            <li>rayne@gmail.com</li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="invoice-body">
    <div class="row">
      <div class="col-xs-5">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Company Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
              <dt>Name</dt>
              <dd><strong>Rayne</strong></dd>
              <dt>Industry</dt>
              <dd>Ecommerce Website</dd>
              <dt>Address</dt>
              <dd>NewTown</dd>
              <dt>Phone</dt>
              <dd>123.456.4567</dd>
              <dt>Email</dt>
              <dd>rayne@gmail.com</dd>
              <dt>Tax NO</dt>
              <dd class="mono">123456789</dd>
          </div>
        </div>
      </div>
      <div class="col-xs-7">
        <div class="panel panel-default">
          <div class="panel-heading">
            <h3 class="panel-title">Customer Details</h3>
          </div>
          <div class="panel-body">
            <dl class="dl-horizontal">
              <dt>Name</dt>
              <dd><?php echo $user_name;?></dd>
              <dt>Profile</dt>
              <dd><?php echo $cat;?></dd>
              <dt>Phone</dt>
              <dd><?php echo $phone;?></dd>
              <dt>Email</dt>
              <dd><?php echo $user;?></dd>
              <dt>&nbsp;</dt>
              <dd>&nbsp;</dd>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading">
        <h3 class="panel-title">Services / Products</h3>
      </div>
      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <th>Item Name</th>
            <th class="text-center colfix">Size</th>
            <th class="text-center colfix">Quantity</th>
            <th class="text-center colfix">Cost</th>
          </tr>
        </thead>
        <tbody>
        <?php 
                $sql_product= "select * from customer_orders where bill_id=$bill";
                $result_product=mysqli_query($conn,$sql_product);
                $row_no_product=mysqli_num_rows($result_product);
                if($row_no_product > 0){
                    $total_price = 0;
                    $total_price = 0;
                    $count_item = 0;
                  while($new_row_product=mysqli_fetch_assoc($result_product)){
                      $quantity = $new_row_product["quantity"];
                      $size = $new_row_product["size"];
                      $product_name = $new_row_product["product_name"];
                      $product_price = $new_row_product["product_price"];
                      $total_price = $total_price + $product_price;
                      $count_item++;
          ?>
          <tr>
            <td>
              <?php echo $product_name;?>
              <br>
            </td>
            <td class="text-right">
              <span class="mono"><?php echo $size?></span>
              <br>
            </td>
            <td class="text-right">
              <span class="mono"><?php echo $quantity?></span>
              <br>
            </td>
            <td class="text-right">
              <span class="mono"><?php echo "₹". $product_price?></span>
              <br>
            </td>
          </tr>
          <?php }}?>
        </tbody>
      </table>
    </div>
    <div class="panel panel-default">
      <table class="table table-bordered table-condensed">
        <thead>
          <tr>
            <td class="text-center col-xs-1">Sub Total</td>
            <td class="text-center col-xs-1">Delivery Charge</td>
            <td class="text-center col-xs-1">Total</td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th class="text-center rowtotal mono"><?php echo "₹ " .$total_price;?></th>
            <?php $count_item1 = $count_item*50;?>
            <th class="text-center rowtotal mono"><?php echo "₹ " .$count_item1;?></th>
            <?php $final_amount = $total_price+$count_item1;?>
            <th class="text-center rowtotal mono"><?php echo "₹ " .$final_amount;?></th>
          </tr>
        </tbody>
      </table>
    </div>
    <div class="row">
      <div class="col-xs-7">
        <div class="panel panel-default">
          <div class="panel-body">
            <i>Comments / Notes</i>
            <hr style="margin:3px 0 5px" /> Lorem ipsum dolor sit amet, consectetur adipisicing elit. Odit repudiandae numquam sit facere blanditiis, quasi distinctio ipsam? Libero odit ex expedita, facere sunt, possimus consectetur dolore, nobis iure amet vero.
          </div>
        </div>
      </div>
      <br><br>
      <!-- <button type="button" onclick="downloadPDF()">Download Invoice</button> -->
    </div>

  </div>
  <div class="invoice-footer">
    Thank you for choosing our services.
    <br/> We hope to see you again soon
    <br/>
    <strong>~ RAYNE ~</strong>
  </div>
</div>
         <!-- END EDMO HTML (Happy Coding!)-->
      </main>      
      <!-- Script JS -->
      <script src="./js/script.js"></script>
      <!--$%analytics%$-->
   </body>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js "></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>  
   <script>
    window.jsPDF = window.jspdf.jsPDF;
var docPDF = new jsPDF();

function downloadPDF(invoiceNo){

    var elementHTML = document.querySelector("#myBillingArea");
    docPDF.html(elementHTML, {
        callback: function(docPDF) {
            docPDF.save(invoiceNo+'.pdf');
        },
        x: 15,
        y: 15,
        width: 170,
        windowWidth: 650
    });
}
   </script>              

   <style>
        .cd__main{
   background: black !important;
}
body {
  background: black;
  /* font-size:0.9em !important; */
}

.invoice {
  background: #fff;
  width: 970px !important;
  margin: 50px auto;
}
.invoice .invoice-header {
  padding: 25px 25px 15px;
}
.invoice .invoice-header h1 {
  margin: 0;
}
.invoice .invoice-header .media .media-body {
  font-size: 0.9em;
  margin: 0;
}
.invoice .invoice-body {
  border-radius: 10px;
  padding: 25px;
  background: #FFF;
}
.invoice .invoice-footer {
  padding: 15px;
  font-size: 0.9em;
  text-align: center;
  color: #999;
}

.logo {
  max-height: 70px;
  border-radius: 10px;
}

.dl-horizontal {
  margin: 0;
}
.dl-horizontal dt {
  float: left;
  width: 80px;
  overflow: hidden;
  clear: left;
  text-align: right;
  text-overflow: ellipsis;
  white-space: nowrap;
}
.dl-horizontal dd {
  margin-left: 90px;
}

.rowamount {
  padding-top: 15px !important;
}

.rowtotal {
  font-size: 1.3em;
}

.colfix {
  width: 12%;
}

.mono {
  font-family: monospace;
}



@import url('https://fonts.googleapis.com/css?family=Roboto&display=swap');
@import url('https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css');
*{ margin: 0; padding: 0;}
*, *::before, *::after {
  margin: 0;
  padding: 0;
  box-sizing: inherit;
}

body{
  min-height: 100vh;
  display: flex;
  justify-content: center;
  flex-wrap: wrap;
  align-content: flex-start;
    
  font-family: 'Roboto', sans-serif;
  font-style: normal;
  font-weight: 300;
  font-smoothing: antialiased;
-webkit-font-smoothing: antialiased;
-moz-osx-font-smoothing: grayscale;
  font-size: 15px;
  background: black;
}
.cd__intro{
   padding: 60px 30px;
   margin-bottom: 15px;
        flex-direction: column;

}
.cd__intro,
.cd__credit{
    display: flex;
    width: 100%;
    justify-content: center;
    align-items: center;
    background: #fff;
    color: #333;
    line-height: 1.5;
    text-align: center;
}

.cd__intro h1 {
   font-size: 18pt;
   padding-bottom: 15px;

}
.cd__intro p{
   font-size: 14px;
}

.cd__action{
   text-align: center;
   display: block;
   margin-top: 20px;
}

.cd__action a.cd__btn {
  text-decoration: none;
  color: #666;
   border: 2px solid #666;
   padding: 10px 15px;
   display: inline-block;
   margin-left: 5px;
}
.cd__action a.cd__btn:hover{
   background: #666;
   color: #fff;
    transition: .3s;
-webkit-transition: .3s;
}
.cd__action .cd__btn:before{
  font-family: FontAwesome;
  font-weight: normal;
  margin-right: 10px;
}
.down:before{content: "\f019"}
.back:before{content:"\f112"}

.cd__credit{
    padding: 12px;
    font-size: 9pt;
    margin-top: 40px;

}
.cd__credit span:before{
   font-family: FontAwesome;
   color: #e41b17;
   content: "\f004";


}
.cd__credit a{
   color: #333;
   text-decoration: none;
}
.cd__credit a:hover{
   color: #1DBF73; 
}
.cd__credit a:hover:after{
    font-family: FontAwesome;
    content: "\f08e";
    font-size: 9pt;
    position: absolute;
    margin: 3px;
}
.cd__main{
  background: #fff;
  padding: 20px;
  flex-direction: row;
  flex-wrap: wrap;
  justify-content: center;
  
}
.cd__main{
    display: flex;
    width: 100%;
}

@media only screen and (min-width: 1360px){
    .cd__main{
      max-width: 1280px;
      margin-left: auto;
      margin-right: auto; 
      padding: 24px;
    }
}
   </style>

</html>