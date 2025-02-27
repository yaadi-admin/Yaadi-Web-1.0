<?php
include 'includes/connect.php';
	if($_SESSION['admin_sid']==session_id())
	{
        $id = "";
        $result = mysqli_query($con, "SELECT * FROM users WHERE name='$name';");
        while($row = mysqli_fetch_array($result))
        {
            $id = $row['id'];
        }
        $date = new DateTime(date('Y-m-d H:i:sP'), new DateTimeZone('America/Jamaica'));
        $date->setTimezone(new DateTimeZone('America/Jamaica'));
        $timestamp = $date->format('Y-m-d H:i:sP');
        $url = $_SERVER['REQUEST_URI'];
        $action = "Viewed customer page";
        $sql = "INSERT INTO timeline (user_id, action, url, date) VALUES ('$id', '$action', '$url', '$timestamp')";
        $con->query($sql);
        $allcustomers = 0;
        $result = mysqli_query($con, "SELECT * FROM users WHERE role='Customer';");
        while($row = mysqli_fetch_array($result))
        {
            $allcustomers++;
        }
		?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Customers</title>
  <link rel="icon" href="images/yaadi-icon.png" sizes="32x32">
  <link rel="apple-touch-icon-precomposed" href="images/yaadi-icon.png">
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/yaadi-icon.png">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/custom/search.bar.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Akronim|Open+Sans&display=swap" rel="stylesheet">
     <style type="text/css">
  .input-field div.error{
    position: relative;
    top: -1rem;
    left: 0rem;
    font-size: 0.8rem;
    color:#FF4081;
    -webkit-transform: translateY(0%);
    -ms-transform: translateY(0%);
    -o-transform: translateY(0%);
    transform: translateY(0%);
  }
  .input-field label.active{
      width:100%;
  }
  .left-alert input[type=text] + label:after, 
  .left-alert input[type=password] + label:after, 
  .left-alert input[type=email] + label:after, 
  .left-alert input[type=url] + label:after, 
  .left-alert input[type=time] + label:after,
  .left-alert input[type=date] + label:after, 
  .left-alert input[type=datetime-local] + label:after, 
  .left-alert input[type=tel] + label:after, 
  .left-alert input[type=number] + label:after, 
  .left-alert input[type=search] + label:after, 
  .left-alert textarea.materialize-textarea + label:after{
      left:0px;
  }
  .right-alert input[type=text] + label:after, 
  .right-alert input[type=password] + label:after, 
  .right-alert input[type=email] + label:after, 
  .right-alert input[type=url] + label:after, 
  .right-alert input[type=time] + label:after,
  .right-alert input[type=date] + label:after, 
  .right-alert input[type=datetime-local] + label:after, 
  .right-alert input[type=tel] + label:after, 
  .right-alert input[type=number] + label:after, 
  .right-alert input[type=search] + label:after, 
  .right-alert textarea.materialize-textarea + label:after{
      right:70px;
  }
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
                    <ul>                      
                      <li><h1 class="logo-wrapper" style="font-family: 'Open Sans', ;font-family: 'Akronim';font-size:42px;"><a href="index.php" class="brand-logo darken-1" style="font-family: 'Open Sans', ;font-family: 'Akronim';font-size:42px;">Yaadi<span style="font-size: 12px;color: mediumspringgreen;"> Admissions</span></a></h1></li>
                    </ul>
                    <ul class="right">
                    </ul>
                </div>
            </nav>
        </div>
  </header>
  <div id="main">
    <div class="wrapper">
      <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftnavset">
            <li class="user-details cyan darken-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="Ambassador Avatar" class="circle responsive-img valign profile-image" width="50px" height="50px">
                </div>
				 <div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
                        <li><a href="admin-account-page.php"><i class="mdi-social-person"></i>Account</a></li>
                        <li><a href="routers/ad-logout.php"><i class="mdi-hardware-keyboard-tab"></i> Logout</a>
                        </li>
                    </ul>
                </div>
                <div class="col col s8 m8 l8">
                    <a class="btn-flat dropdown-button waves-effect waves-light white-text profile-btn" href="#" data-activates="profile-dropdown"><?php echo $name;?> <i class="mdi-navigation-arrow-drop-down right"></i></a>
                    <p class="user-roal"><?php echo $role;?></p>
                </div>
            </div>
            </li>
            <li class="bold"><a href="admin.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Dashboard</a>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i>All Orders
                            <?php

                            $getamount = mysqli_query($con, "SELECT * FROM orders WHERE (status LIKE 'Yet to be delivered' OR status LIKE 'Preparing') AND assignedto LIKE '0';");
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
                                <li><a href="all-orders.php">All Orders</a>
                                </li>
                                <?php
                                $sql = mysqli_query($con, "SELECT DISTINCT status FROM orders;");
                                while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i>Hanker Orders
                            <?php

                            $gethankers = mysqli_query($con, "SELECT * FROM hanker_orders WHERE (status LIKE 'Yet to be delivered' OR status LIKE 'Preparing') AND assignedto LIKE 0;");
                            $counter = 0;
                            $totalhanker = 0;
                            while($row = mysqli_fetch_array($gethankers)) {
                                $counter++;
                                $totalhanker = 0;
                                $totalhanker+=$counter;
                            }
                            if ($totalhanker == 0){
                                echo '<span class="new badge">'.$totalhanker.'</span>';
                            }
                            else{
                                echo '<span class="new badge">'.$totalhanker.'</span>';
                            }

                            ?>
                        </a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="all-hanker-orders.php">All Orders</a>
                                </li>
                                <?php
                                $sql = mysqli_query($con, "SELECT DISTINCT status FROM hanker_orders;");
                                while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-hanker-orders.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
                                }
                                ?>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>
                 <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-action-question-answer"></i> Tickets</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="all-tickets.php">All Tickets</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="all-tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>
            <li class="bold"><a href="am_active.php" class="waves-effect waves-cyan"><i class="mdi-action-book"></i>My Activity</a>
            </li>
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <section id="content">
        <div class="container">
          <div id="editableTable" class="section">
            <div class="row">
                  <ul class="collection with-header collapsible z-depth-0">
                      <li class="collection-header"><h4>Customers <span class="right"><?php echo $allcustomers; ?><span style="font-size: 10px;"> Customers</span></span></h4><p class="caption">Enable or Disable Customer Accounts.</p></li>

                      <?php

                      $getriders = mysqli_query($con, "SELECT * FROM users WHERE role='Customer';");
                      while($row = mysqli_fetch_array($getriders)) {
                          $name = $row["name"];
                          $id = $row["id"];
                          $username = $row["username"];
                          $email = $row["email"];
                          $contact = $row["contact"];
                          $address = $row["address"];
                          $paw = $row['password'];
                          $type = $row['ocassion'];


                          echo '<li class="collection-item avatar" style="background-color: white;color: black;">
      <span class="title">' . $row["name"] . '</span>
      <p>Phone: ' . $row["contact"] . ' <br>
         Email: ' . $email . '
      </p>';

                          echo '<ul class="collapsible z-depth-0" data-collapsible="accordion">';
                          echo '
						<li>
							<div class="collapsible-header"><i class="mdi-image-add-to-photos"></i>Enable / Disable</div>
							<div class="collapsible-body">';
                          echo '<form action="routers/arest-router.php" method="post" enctype="multipart/form-data" novalidate="novalidate">
                          <select name="'.$row['id'].'_verified">
                      <option value="1"'.($row['verified'] ? 'selected' : '').'>Verified</option>
                      <option value="0"'.(!$row['verified'] ? 'selected' : '').'>Not Verified</option>
                    </select>
                    
                    <select name="'.$row['id'].'_deleted">
                      <option value="1"'.($row['deleted'] ? 'selected' : '').'>Disable</option>
                      <option value="0"'.(!$row['deleted'] ? 'selected' : '').'>Enable</option>
                    </select>
                    
                    <p><button class="btn-flat waves-effect waves-light black-text z-depth-1" style="border-radius: 6px;background-color: white;border: 1px solid maroon;font-size: 10px;color: maroon;width: 100%;" type="submit" name="submit">Update
                              <i class="mdi-action-thumbs-up-down right" style="color: maroon;"></i>
                              </button></p>
                              </form>
                          ';
                          echo'
							</div>
						</li>';

                          echo '</ul>';


     echo' <a href="#." class="secondary-content waves-effect waves-light collapsible-header" style="border-bottom: 0px solid white;"><i class="mdi-action-info-outline" style="font-size: 21px;"></i></a>
      <div class="collapsible-body" style="background-color: white;">
      <form class="formValidate" id="formValidate1" method="post" action="routers/ard-router.php" novalidate="novalidate">
      <table class="responsive centered highlight striped">
                    <tbody>
      <tr><td>
    <p class="col s7"><label for="email">Email</label><input id="email" name="'.$row['id'].'_email" value="'.$email.'" type="text" data-error=".errorTxt01" style="border-bottom-right-radius: 8px;"></p>
    <p class="col s5"><label for="contact">Contact</label><input id="contact" name="'.$row['id'].'_contact" value="'.$contact.'" type="tel" data-error=".errorTxt01" style="border-bottom-right-radius: 8px;"></p>
    <p class="col s12"><label for="address">Address</label><input id="address" name="'.$row['id'].'_address" value="'.$address.'" type="text" data-error=".errorTxt01" style="border-bottom-right-radius: 8px;></p>

';

                          $key = $row['id'];
                          $sql = mysqli_query($con, "SELECT * from wallet WHERE customer_id = $key;");
                          if ($row1 = mysqli_fetch_array($sql)) {
                              $wallet_id = $row1['id'];
                              $sql1 = mysqli_query($con, "SELECT * from wallet_details WHERE wallet_id = $wallet_id;");
                              if ($row2 = mysqli_fetch_array($sql1)) {
                                  $balance = $row2['balance'];
                              }
                          }

                          echo '
                    <p class="col s7"><label for="balance">Balance</label><input id="balance" name="'.$row['id'].'_balance" value="'.$balance.'" type="number" data-error=".errorTxt01" style="border-bottom-right-radius: 8px;"></p>
                    </td></tr>
                    
                    </tbody>
                  </table>
                  
                  <p><button class="btn-flat waves-effect waves-light black-text z-depth-1" style="border-radius: 6px;background-color: white;border: 1px solid maroon;font-size: 10px;color: maroon;width: 100%;" type="submit" name="submit">Update
                              <i class="mdi-action-thumbs-up-down right" style="color: maroon;"></i>
                              </button></p>
                  </form></div>
    </li>';

                      }
                      ?>
                  </ul>







            </div>

            <div class="divider"></div>
            
          </div>
        </div>
        </section>      
    </div>
  </div>

  <footer class="page-footer">
    <div class="footer-copyright">
      <div class="container">
        <span>Copyright © 2020 <a class="grey-text text-lighten-4" href="#" target="_blank">Yaadi.Co</a> All rights reserved.</span>
        <span class="right"> Design and Developed by <a class="grey-text text-lighten-4" href="#">The Ambassadors</a></span>
        </div>
    </div>
  </footer>
    <script type="text/javascript" src="js/plugins/jquery-1.11.2.min.js"></script>    
    <script type="text/javascript" src="js/plugins/angular.min.js"></script>
    <script type="text/javascript" src="js/materialize.min.js"></script>
    <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script>
	<script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    <script type="text/javascript" src="js/plugins.min.js"></script>
    <script type="text/javascript" src="js/custom-script.js">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
            },
            password: {
                required: true,
                minlength: 5,
            },
            name: {
                required: true,
                minlength: 5,
			},
            contact: {
                required: true,
                minlength: 4,
			},
            address: {
                minlength: 10,
			},		
            balance: {
                required: true,
			},				
		},
        messages: {
           username:{
                required: "Enter a username",
                minlength: "Enter at least 5 characters"
            },	
           password:{
                required: "Provide a prove",
                minlength: "Password must be atleast 5 characters long",
            },	
           name:{
                required: "Please provide CVV number",
                minlength: "Enter at least 5 characters",		
            },	
           contact:{
                required: "Please provide card number",
                minlength: "Enter at least 4 digits",
            },	
           address:{
                minlength: "Address must be atleast 10 characters long",		
            },		
           balance:{
                required: "Please provide a balance.",		
            },				
		},
        errorElement : 'div',
        errorPlacement: function(error, element) {
          var placement = $(element).data('error');
          if (placement) {
            $(placement).append(error)
          } else {
            error.insertAfter(element);
          }
        }
     }); 
    </script>
    <script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-153638148-1');
</script>
    <script>
        const body = document.querySelector('body');
const searchBtn = document.querySelector('#search');
const searchInput = document.querySelector('#search-input');
let active = false;

body.addEventListener('click', (e) => {
  if(e.target.id === 'search' || e.target.id === 'search-input' || e.target.id === 'search-icon') {
    if(!active) {
      searchBtn.classList.add('active');
      searchInput.classList.add('active');
      active = true;
    }
  } else {
      searchBtn.classList.remove('active');
      searchInput.classList.remove('active');
      searchInput.value = '';
      active = false;
  }
});</script>
</body>

</html>
<?php
	}
	else
	{
		if($_SESSION['customer_sid']==session_id())
		{
			header("location:index.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>