<?php
include 'includes/connect.php';
include 'includes/wallet.php';
	if($_SESSION['admin_sid']==session_id())
	{
	    $user_id = $_SESSION['admin_sid'];
        $id = "";
        $getuser = mysqli_query($con, "SELECT * FROM users WHERE name='$name';");
        while($row1 = mysqli_fetch_array($getuser))
        {
            $id = $row1['id'];
        }
        $date = new DateTime(date('Y-m-d H:i:sP'), new DateTimeZone('America/Jamaica'));
        $date->setTimezone(new DateTimeZone('America/Jamaica'));
        $timestamp = $date->format('Y-m-d H:i:sP');
        $url = $_SERVER['REQUEST_URI'];
        $action = "Viewed account page";
        $sql = "INSERT INTO timeline (user_id, action, url, date) VALUES ('$id', '$action', '$url', '$timestamp')";
        $con->query($sql);
        $result = mysqli_query($con, "SELECT * FROM users WHERE name='$name';");
        while($row = mysqli_fetch_array($result)){
            $name = $row['name'];
            $address = $row['address'];
            $contact = $row['contact'];
            $email = $row['email'];
            $username = $row['username'];
        }
		?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Account</title>
  <link rel="icon" href="images/yaadi-icon.png" sizes="32x32">
  <link rel="apple-touch-icon-precomposed" href="images/yaadi-icon.png">
  <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/yaadi-icon.png">
  <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
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
                    <ul class="left">                      
                      <li><h1 class="logo-wrapper" style="font-family: 'Open Sans', ;font-family: 'Akronim';font-size:42px;"><a href="index.php" class="brand-logo darken-1" style="font-family: 'Open Sans', ;font-family: 'Akronim';font-size:42px;">Yaadi<span style="font-size: 12px;color: mediumspringgreen;"> Admissions</span></a></h1></li>
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
                        <li class="bold active"><a href="admin-account-page.php"><i class="mdi-social-person"></i>Account</a></li>
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
            <div class="row">
            </div>
          </div>
      </section>





        <section>
            <ul class="collection with-header" style="border-top-right-radius: 8px;border-top-left-radius: 8px;">
                <form class="formValidate" id="formValidate" novalidate="novalidate">
                    <img src="images/must_have.jpg" width="100%" height="50px" style="border-top-right-radius: 8px;border-top-left-radius: 8px;object-fit: cover">
                    <li class="collection-header">
                        <h5>Admin Account</h5>
                        <?php

                        $bal = 0;

        $sqll = mysqli_query($con, "SELECT * FROM orders WHERE status LIKE 'Completed' and not deleted;");
        while($row = mysqli_fetch_array($sqll)){

            $service = $row['service_fee'];
            $delivery = $row['fee'];
            $bal = $bal + $service + $delivery;

        }


                        ?>
                        <h6><i class="mdi-action-account-balance"></i> Company Wallet $<?php echo number_format($bal); ?> <span style="font-size: 10px;">JMD</span> </h6>
                        <p>Edit account details below, information is required for logins, user management, order modifications and ticketing.</p>
                    </li>
                    <li class="collection-item">
                        <i class="mdi-action-account-circle prefix prefix"></i>
                        <input name="username" id="username" type="text" value="<?php echo $username;?>" data-error=".errorTxt2" style="border-bottom-right-radius: 8px;border-bottom: 2px solid antiquewhite;">
                        <label for="username" class="">Admin Username</label>
                        <div class="errorTxt2"></div>
                    </li>
                    <li class="collection-item">
                        <i class="mdi-action-perm-contact-cal prefix"></i>
                        <input name="name" id="name" type="text" value="<?php echo $name;?>" data-error=".errorTxt2" style="border-bottom-right-radius: 8px;border-bottom: 2px solid antiquewhite;">
                        <label for="name" class="">Full Name</label>
                        <div class="errorTxt2"></div>
                    </li>
                    <li class="collection-item">
                        <i class="mdi-action-perm-phone-msg prefix"></i>
                        <input name="contact" id="contact" type="number" value="<?php echo $contact;?>" data-error=".errorTxt5" style="border-bottom-right-radius: 8px;border-bottom: 2px solid antiquewhite;">
                        <label for="contact" class="">Contact Number</label>
                        <div class="errorTxt5"></div>
                    </li>
                    <li class="collection-item">
                        <i class="mdi-communication-email prefix"></i>
                        <input name="email" id="email" type="email" value="<?php echo $email;?>" data-error=".errorTxt3" style="border-bottom-right-radius: 8px;border-bottom: 2px solid antiquewhite;">
                        <label for="email" class="">Email</label>
                        <div class="errorTxt3"></div>
                    </li>
                    <li class="collection-item">
                        <i class="mdi-action-home prefix"></i>
                        <textarea spellcheck="true" name="address" id="address" class="materialize-textarea validate" data-error=".errorTxt1" style="border-bottom-right-radius: 8px;border-bottom: 2px solid antiquewhite;"><?php echo $address;?></textarea>
                        <label for="address" class="">Address</label>
                        <div class="errorTxt6"></div>
                    </li>
                    <li class="collection-item">
                        <i class="mdi-action-lock-outline prefix"></i>
                        <input name="password" id="password" type="password" data-error=".errorTxt4" style="border-bottom-right-radius: 8px;border-bottom: 2px solid antiquewhite;">
                        <label for="password" class="">Current Password</label>
                        <div class="errorTxt4"></div>
                    </li>
                    <li class="collection-item">
                        <a class="waves-effect waves-light btn modal-trigger text-black" href="#modal1" style="width:100%;border-radius: 8px;font-size: 12px;">Update <i class="mdi-action-thumbs-up-down right"></i></a>
                    </li>

                    <div id="modal1" class="modal bottom-sheet">
                        <div class="modal-content" id="modaltop">
                            <h4>Save Changes?</h4>
                            <p>Are you sure you want to commit to these changes?</p>
                        </div>
                        <div class="modal-footer">
                            <button id="updatedetails" class="btn-flat cyan waves-effect waves-light right white-text" type="submit" name="action" style="width:100%;border-radius: 8px;font-size: 12px;color: #a0381b;">Update
                                <i class="mdi-action-thumbs-up-down right"></i>
                            </button>
                        </div>
                    </div>

                </form>
            </ul>
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
    <script type="text/javascript" src="js/custom-script.js"></script>
  <script>

      $(document).ready(function () {
          update();
      })

      function update() {
          $(document).on('click', "#updatedetails", function (e) {
              e.preventDefault();
              var name = $('#name').val();
              var username = $('#username').val();
              var phone = $('#contact').val();
              var email = $('#email').val();
              var address = $('#address').val();
              var passcode = $('#password').val();

              if (name == "" || passcode == "" || email == "" || address == "" || phone == ""){
                  $('#modaltop').html('<h5>All fields are not filled</h5>');
              }
              else {
                  $.ajax({
                      url: '../routers/adm-router.php',
                      method: 'post',
                      data:{username:username,phone:phone,password:passcode,name:name,email:email,address:address},
                      success: function (data) {
                          Materialize.toast('Account details updated successful', 4000);
                      }
                  })
              }
          })
      }
  </script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            username: {
                required: true,
                minlength: 5,
				maxlength: 10
            },
            name: {
                required: true,
                minlength: 5,
				maxlength: 15
            },
            email: {
				required: true,
				maxlength: 35,
			},
			password: {
				required: true,
				minlength: 5,
				maxlength: 16,
			},
            phone: {
				required: true,
				minlength: 4,
				maxlength: 11
			},
			address: {
				required: true,
				minlength: 10,
				maxlength: 300
			},
        },
        messages: {
            username: {
                required: "Enter username",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 10 characters are required."				
            },
            name: {
                required: "Enter name",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 15 characters are required."
            },
            email: {
				required: "Enter email",
                maxlength: "Maximum 35 characters are required."				
			},
			password: {
				required: "Enter password",
				minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 16 characters are required."				
			},
            phone:{
				required: "Specify contact number.",
				minlength: "Minimum 4 characters are required.",
                maxlength: "Maximum 11 digits are accepted."				
			},	
            address:{
				required: "Specify address",
				minlength: "Minimum 10 characters are required.",
                maxlength: "Maximum 300 characters are accepted."				
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
</body>
</html>
    
<?php
	}
	else
	{
		if($_SESSION['admin_sid']==session_id())
		{
			header("location:admin.php");		
		}
		else{
			header("location:login.php");
		}
	}
?>