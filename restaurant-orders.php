<?php
include 'includes/connect.php';
	if($_SESSION['restaurant_sid']==session_id())
	{
        $cus="";
        $re_id = $_SESSION['user_id'];
        $user_id = $_SESSION['user_id'];
		?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>All Orders</title>
  <link rel="icon" href="images/yaadi-icon.png" sizes="32x32">
  <link rel="apple-touch-icon-precomposed" href="images/yaadi-icon.png">
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/yaadi-icon.png">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Akronim|Open+Sans&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Modak&display=swap" rel="stylesheet">
    <style>
ul.side-nav.leftnavset{top:64px;overflow:hidden;  }
.side-nav.fixed.leftnavset .collapsible-body li.active{background-color:rgba(0,0,0,0.04)}
.side-nav .collapsible-body li a{margin:0 1rem 0 3rem}ul.side-nav.leftnavset{top:64px;overflow:hidden}
ul.side-nav.leftnavset hr{display:block;height:1px;border:0;border-top:1px solid #e0e0e0;margin:1em 0;padding:0}
ul.side-nav.leftnavset li{line-height:44px}
ul.side-nav.leftnavset li:hover{background-color:rgba(0,0,0,0.04)}
ul.side-nav.leftnavset li.active{background-color:rgba(0,0,0,0.04)}
ul.side-nav.leftnavset li a{font-size:14px;font-weight:400}
ul.side-nav.leftnavset li.user-details{background:url("../images/user-bg.jpg") no-repeat center center;-webkit-background-size:cover;-moz-background-size:cover;-o-background-size:cover;background-size:cover;margin-bottom:15px;padding:15px 0 0 15px}
ul.side-nav.leftnavset li.user-details #profile-dropdown a{padding:8px 15px}
ul.side-nav.leftnavset .profile-btn{margin:0;text-transform:capitalize;padding:0;text-shadow:1px 1px 1px #444;font-size:15px}
ul.side-nav.leftnavset ul.collapsible-accordion{background-color:#fff}
.side-nav.fixed.leftnavset .collapsible-body li.active>a{color:#A82128}ul.side-nav.leftnavset li.active>a{color:#A82128}
label{
    color: black;
}
 </style>
</head>

<body>
  <div id="loader-wrapper">
      <div id="loader"></div>        
      <div class="loader-section section-left"></div>
      <div class="loader-section section-right"></div>
  </div>
  <header id="header" class="page-topbar">
        <div class="navbar-fixed">
            <nav class="navbar-color">
                <div class="nav-wrapper">
                    <ul class="left">
                        <li><h1 class="logo-wrapper" style="font-size:42px;"><a href="restaurant.php" class="brand-logo darken-1" style="font-size:40px;font-family: 'Modak', 'cursive';">Yaad<span style="color: yellow;">i</span></a><span class="logo-text">Logo</span></h1></li>
                    </ul>
                </div>
            </nav>
        </div>
  </header>
  <div id="main">
    <div class="wrapper">
        <aside id="left-sidebar-nav" style="border-radius: 8px;">
            <ul id="slide-out" class="side-nav fixed leftnavset" style="border-top-right-radius: 8px;">
                <li class="user-details teal lighten-2">
                    <div class="row">
                        <div class="col col s4 m4 l4">
                            <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                        </div>
                        <div class="col col s8 m8 l8">
                            <ul id="profile-dropdown" class="dropdown-content">
                                <li><a href="account-page.php"><i class="mdi-social-person"></i>Account</a></li>
                                <li><a href="routers/logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                                </li>
                            </ul>
                        </div>
                        <div class="col col s8 m8 l8">
                            <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                            <p class="user-roal"><?php echo $role;?></p>
                        </div>
                    </div>
                </li>
                <li class="bold"><a href="restaurant.php" class="waves-effect waves-cyan"><i class="mdi-action-swap-vert"></i>Active Orders</a>
                </li>
                <li class="bold"><a href="restaurant-menu.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i>Menu</a>
                </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold active"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-shopping-basket"></i> Orders
                                <?php

                                $getamount = mysqli_query($con, "SELECT * FROM orders WHERE (status LIKE 'Yet to be delivered' OR status LIKE 'Preparing') AND restaurantid LIKE $user_id;");
                                $count = 0;
                                $total = 0;
                                while($row = mysqli_fetch_array($getamount)) {
                                    $count++;
                                    $total = 0;
                                    $total+=$count;
                                }
                                if ($total == 0){
                                    echo '<span class="new badge">'.$total.'</span>';
                                }
                                else{
                                    echo '<span class="new badge">'.$total.'</span>';
                                }


                                ?>
                            </a>
                            <div class="collapsible-body">
                                <ul>
                                    <li><a href="restaurant-orders.php">All Orders</a>
                                    </li>
                                    <?php
                                    $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
                                    while($row = mysqli_fetch_array($sql)){
                                        echo '<li><a href="restaurant-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
                                    }
                                    ?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
                <li class="bold"><a href="place-new-order.php" class="waves-effect waves-cyan"><i class="mdi-action-shop-two"></i>Hanker Order</a>
                </li>
                <li class="bold"><a href="account-page.php" class="waves-effect waves-cyan"><i class="mdi-action-account-circle"></i>Account</a>
                </li>
                <li class="bold"><a href="restaurant-rep.php" class="waves-effect waves-cyan"><i class="mdi-action-view-list"></i>Order Report</a>
                </li>
                <li class="bold"><a href="#." class="waves-effect waves-cyan"><i class="mdi-action-settings"></i>Settings</a>
                </li>
            </ul>
            <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <section id="content">
            <div class="row">
              </div>
        <div class="container">
<div id="work-collections" class="section">
    <ul class="collection white" style="border-radius: 8px;border: 0px solid transparent;">
        <li class="collection-header" style="padding-left: 10px;border: 0px solid transparent;"><h5>Orders</h5></li>
    </ul>
					<?php
					if(isset($_GET['status'])){
						$status = $_GET['status'];
					}
					else{
						$status = '%';
					}
                    
					$sql = mysqli_query($con, "SELECT * FROM orders WHERE restaurantid='$re_id' AND status LIKE '$status';");
					echo '<div class="row">
                <div>
                    <ul id="issues-collection" class="collection">';
					while($row = mysqli_fetch_array($sql))
					{

                        $filler = $row['assignedto'];
                        $fillername = "Not yet filled";

                        $getname = mysqli_query($con, "SELECT * FROM users WHERE id = $filler;");
                        while($row5 = mysqli_fetch_array($getname))
                        {
                            $fillername = $row5['name'];
                        }

                        $fee = $row['fee'];
						$status = $row['status'];
						$deleted = $row['deleted'];
						echo '<li class="collection-item avatar">
                              <i class="mdi-content-content-paste red circle"></i>
                              <span class="collection-header">Order No. <span style="font-size: 20px;">'.$row['id'].'</span></span>
                              <p><strong>Date:</strong> '.$row['date'].'</p>
                              <p><strong>Payment Type:</strong> '.$row['pay_type'].'</p>
                              <p><strong>Courier:</strong> '.$fillername.'</p>
							  <p><strong>Status:</strong> '.($deleted ? $status : '
                              
							  <form method="post" action="routers/edit-r-orders.php">
							    <input type="hidden" value="'.$row['id'].'" name="id">
							    <input type="hidden" value="'.$cus.'" name="cos">
								<select name="status" id="status" class="browser-default">
								<option value="Yet to be delivered" '.($status=='Yet to be delivered' ? 'selected' : '').'>Yet to be delivered</option>
								<option value="Preparing" '.($status=='Preparing' ? 'selected' : '').'>Preparing</option>
								<option value="Cancelled" '.($status=='Cancelled' ? 'selected' : '').'>Cancelled</option>
								<option value="Paused" '.($status=='Paused' ? 'selected' : '').'>On Hold</option>
                                <option value="Ready For Pick-Up" '.($status=='Ready For Pick-Up' ? 'selected' : '').'>Ready For Pick-Up</option>
                                <option value="Cancelled by Admin" '.($status=='Cancelled by Admin' ? 'selected' : '').' disabled>Cancelled by Admin</option>
								</select>
							  ').'</p>
                              <a href="#" class="secondary-content"><i class="mdi-action-grade"></i></a>
                              </li>';
						$order_id = $row['id'];
						$customer_id = $row['customer_id'];
						$sql1 = mysqli_query($con, "SELECT * FROM order_details WHERE order_id = $order_id;");
						$sql3 = mysqli_query($con, "SELECT * FROM users WHERE id = $customer_id;");
							while($row3 = mysqli_fetch_array($sql3))
							{
                                $cus = $customer_id;
							echo '<li class="collection-item">
                            <div class="row">
							<p><strong>Name: </strong>'.$row3['name'].'</p>
							<p><strong>Address: </strong>'.$row['address'].'</p>
							'.($row3['contact'] == '' ? '' : '<p><strong>Contact: </strong>'.$row3['contact'].'</p>').'	
							'.($row3['email'] == '' ? '' : '<p><strong>Email: </strong>'.$row3['email'].'</p>').'		
							'.(!empty($row['description']) ? '<p><strong>Note: </strong>'.$row['description'].'</p>' : '').'								
                            </li>';							
							}
						while($row1 = mysqli_fetch_array($sql1))
						{
							$item_id = $row1['item_id'];
							$sql2 = mysqli_query($con, "SELECT * FROM items WHERE id = $item_id;");
							while($row2 = mysqli_fetch_array($sql2))
								$item_name = $row2['name'];
                            echo '<li class="collection-item">
                            <div class="row">
                            <div class="col s1">
                            <span style="background-color: mediumaquamarine;border-radius: 8px;color: black;">('.$row1['quantity'].')</span>
                            </div>
                            <div class="col s8">
                            <p class="collections-title">'.$item_name.'</p>';
                            if (isset($row1["variation"]) && $row1["variation"] !== '') {
                                echo ' 
                                                                <label>Flavor: </label><label>'.$row1["variation"].'</label><br>';
                            }

                            if (isset($row1["variation_type"]) && $row1["variation_type"] !== ''){
                                echo '   
                                                                <label>Type: </label><label>'.$row1["variation_type"].'</label><br>';
                            }

                            if (isset($row1["variation_side"]) && $row1["variation_side"] !== ''){
                                echo '  
                                                                <label>Side: </label><label>'.$row1["variation_side"].'</label><br>';
                            }

                            if (isset($row1["variation_drink"]) && $row1["variation_drink"] !== '') {
                                echo '  
                                                                <label>Drink: </label><label>'.$row1["variation_drink"].'</label><br>';
                            }

                            echo'
                                </div>
                            <div class="col s3">
                            <span>$'.number_format($row1['price']).' <span style="font-size: 6px;">JMD</span></span>
                            </div>
                            </div>
                            </li>';

						}
						$total = $row['total'] - ($row['service_fee'] + $row['fee']);
								echo'<li class="collection-item">
                                        <div class="row">
                                            <div class="col s8">
                                                <p class="collections-title"> Total</p>
                                            </div>
                                            <div class="col s4">
                                                <span><strong>$'.$total.' JMD</strong></span>
                                            </div>';										
								if(!$deleted){
                                    
								echo '<br><br><button class="waves-effect waves-green btn-flat right" type="submit" name="action" style="border-radius:10px;background-color: #a21318;color: white;">Update Order #'.$order_id.'
                                              <i class="mdi-action-thumbs-up-down right"></i> 
										</button>
										</form>';
								}
								echo'</div></li>';
					}
        echo '</ul>
                </div>';
					?>
					
            </div>
        </div>
      </section>
    </div>
  </div>

  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2019 <a class="grey-text text-lighten-4" href="#" target="_blank">Yaadi® Ltd</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">The Ambassadors</a></span>
        </div>
    </div>
  </footer>
    
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153638148-1');
</script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js"></script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_id']==session_id())
		{
			header("location:orders.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>