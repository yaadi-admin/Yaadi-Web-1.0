<?php
include 'includes/connect.php';
include 'includes/wallet.php';
$continue=0;
if($_SESSION['customer_sid']==session_id())
{
		$ticket_id = $_GET['id'];
		$sql1 = "SELECT * FROM tickets where poster_id = $user_id AND id = $ticket_id AND not deleted;";
		if(mysqli_num_rows(mysqli_query($con,$sql1))>0){
			$row  = $con->query($sql1)->fetch_assoc();
			$type = $row['type'];
			$subject = $row['subject'];
			$description = $row['description'];
			$date = $row['date'];
			$status = $row['status'];
			$continue=1;
		}
		else
			$continue = 0;	
}
if($continue){
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="msapplication-tap-highlight" content="no">
  <title>Ticket No. <?php echo $ticket_id.' - '. $type;?></title>
   <link rel="icon" href="images/yaadi-icon.png" sizes="32x32">
   <link rel="apple-touch-icon-precomposed" href="images/yaadi-icon.png">
   <meta name="msapplication-TileColor" content="#00bcd4">
  <meta name="msapplication-TileImage" content="images/yaadi-icon.png">
   <link href="css/materialize.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="css/style.min.css" type="text/css" rel="stylesheet" media="screen,projection">
   <link href="css/custom/custom.min.css" type="text/css" rel="stylesheet" media="screen,projection">
  <link href="js/plugins/perfect-scrollbar/perfect-scrollbar.css" type="text/css" rel="stylesheet" media="screen,projection">
    <link href="https://fonts.googleapis.com/css?family=Akronim|Open+Sans&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Modak&display=swap" rel="stylesheet">
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
                        <li><h1 class="logo-wrapper" style="font-size:42px;"><a href="index.php" class="brand-logo darken-1" style="font-size:40px;font-family: 'Modak', 'cursive';">Yaad<span style="color: mediumspringgreen;">i</span></a><span class="logo-text">Logo</span></h1></li>
                    </ul>
                    <ul class="right hide-on-med-and-down">                        
                        <li><a href="#" class="waves-effect waves-block waves-light"><i class="mdi-editor-attach-money"><?php echo $balance;?></i></a>
                        </li>
                    </ul>					
                </div>
            </nav>
        </div>
   </header>
  <div id="main">
     <div class="wrapper">
       <aside id="left-sidebar-nav">
        <ul id="slide-out" class="side-nav fixed leftnavset">
            <li class="user-details teal lighten-2">
            <div class="row">
                <div class="col col s4 m4 l4">
                    <img src="images/avatar.jpg" alt="" class="circle responsive-img valign profile-image">
                </div>
				<div class="col col s8 m8 l8">
                    <ul id="profile-dropdown" class="dropdown-content">
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
            <li class="bold"><a href="index.php" class="waves-effect waves-cyan"><i class="mdi-editor-border-color"></i> Order Food</a>
            </li>
                <li class="no-padding">
                    <ul class="collapsible collapsible-accordion">
                        <li class="bold"><a class="collapsible-header waves-effect waves-cyan"><i class="mdi-editor-insert-invitation"></i> Orders</a>
                            <div class="collapsible-body">
                                <ul>
								<li><a href="orders.php">All Orders</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM orders WHERE customer_id = $user_id;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="orders.php?status='.$row['status'].'">'.$row['status'].'</a>
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
								<li><a href="tickets.php">All Tickets</a>
                                </li>
								<?php
									$sql = mysqli_query($con, "SELECT DISTINCT status FROM tickets WHERE poster_id = $user_id;");
									while($row = mysqli_fetch_array($sql)){
                                    echo '<li><a href="tickets.php?status='.$row['status'].'">'.$row['status'].'</a>
                                    </li>';
									}
									?>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </li>				
            <li class="bold"><a href="details.php" class="waves-effect waves-cyan"><i class="mdi-social-person"></i> Account</a>
            </li>				
        </ul>
        <a href="#" data-activates="slide-out" class="sidebar-collapse btn-floating btn-medium waves-effect waves-light hide-on-large-only cyan"><i class="mdi-navigation-menu"></i></a>
        </aside>
      <section id="content">
         <div id="breadcrumbs-wrapper">
          <div class="container">
            <div class="row">
              <div class="col s12 m12 l12" style="background: url(https://image.freepik.com/free-vector/food-pattern-design_1221-27.jpg) repeat fixed;border-radius: 16px;border-top-left-radius: 0px;border-top-right-radius: 0px;">
              <div class="col s12 m12 l12">
                <h5 class="breadcrumbs-title" style="font-weight: 800;mso-bidi-font-style: oblique;color: #fff;width: 120px;background-color: #FFB03B;border-radius: 8px;text-align: center;">Ticket Details</h5>
              </div>
            </div>
          </div>
        </div>
        <div class="container">
          <p class="caption">Receipt</p>
          <div class="divider"></div>
 <div class="section">
                                <?php 
								echo '<ul id="task-card" class="collection with-header">
									<div id="card-alert" class="card cyan">
										<div class="card-content white-text">
										<span class="card-title white-text darken-1">Ticket No. '.$ticket_id.'</span>
										<p><strong>Subject: </strong>'.$subject.'</p>
										<p><strong>Status: </strong>'.$status.'</p>	
										<p><strong>Type: </strong>'.$type.'</p>											
										</div>
										<div class="card-action cyan">
										<form method="post" action="routers/ticket-status.php">
										<input type="hidden" name="ticket_id" value="'.$ticket_id.'">										
										<input type="hidden" name="status" value="'.($status != 'Closed' ? 'Closed' : 'Open').'">
										<button class="waves-effect waves-light deep-orange btn white-text" type="submit" name="action">'
										.($status != 'Closed' ? 'Close<i class="mdi-navigation-close"></i>' : 'Reopen<i class="mdi-navigation-check"></i>').'
										</button>
										</form>
										</div>
									</div>										
                                </ul>';
								echo '<ul id="issues-collection" class="collection">';
								$sql1 = mysqli_query($con, "SELECT * from ticket_details WHERE ticket_id = $ticket_id;");
								while($row1 = mysqli_fetch_array($sql1)){
									$sql2 = "SELECT * FROM users WHERE id = ".$row1['user_id'].";";
									if(mysqli_num_rows(mysqli_query($con,$sql2))>0){
										$row2  = $con->query($sql2)->fetch_assoc();
										$name = $row2['name'];
										$role1 = $row2['role'];										
									}
								  echo '
								  <li class="collection-item avatar">
									  <i class="'.($role1=='Administrator' ? 'mdi-action-star-rate' : 'mdi-social-person').' cyan circle"></i>
									  <span class="collection-header"> '.$name.'</span>
									  <p><strong>Date:</strong> '.$row1['date'].'</p>
									  <p><strong>Role:</strong> '.$role1.'</p>					                               
									  <a href="#" class="secondary-content">
									  <i class="mdi-action-grade"></i></a>
								  </li>
								  <li class="collection-item">
									  <div class="row">
									  <p class="caption">'.$row1['description'].'</p>
									  </div>
									  </li>';
								}
							  echo '</ul>';
							  if($status != 'Closed'){
							  echo '
							  <div class="card-panel">
                  <div class="row">
                    <form class="formValidate" id="formValidate" method="post" action="routers/ticket-message.php" novalidate="novalidate" class="col s12">					  
                      <div class="row">
					  <input type="hidden" name="role" value="'.$role.'">
					  <input type="hidden" name="ticket_id" value="'.$ticket_id.'">
                        <div class="input-field col s12">
                          <i class="mdi-action-home prefix"></i>
                          <textarea name="message" id="message" class="materialize-textarea validate" data-error=".errorTxt1"></textarea>
                          <label for="message" class="">Add a reply</label>
						  <div class="errorTxt1"></div>
                        </div>
                        <div class="row">
                          <div class="input-field col s12">
                            <button class="btn cyan waves-effect waves-light right" type="submit" name="action">Reply
                              <i class="mdi-content-send right" style="border-radius:16px;"></i>
                            </button>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>';
							  }
								?>
          </div>
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
    <script type="text/javascript" src="js/plugins/jquery-validation/jquery.validate.min.js"></script>
    <script type="text/javascript" src="js/plugins/jquery-validation/additional-methods.min.js"></script>
    
     <script type="text/javascript" src="js/plugins/perfect-scrollbar/perfect-scrollbar.min.js"></script> 
     <script type="text/javascript" src="js/plugins.min.js"></script>
     <script type="text/javascript" src="js/custom-script.js"></script>
    <script type="text/javascript">
    $("#formValidate").validate({
        rules: {
            message: {
                required: true,
                minlength: 5,
				maxlength: 300	
            },		
        },
        messages: {
            message: {
                required: "Please provide a reply.",
                minlength: "Minimum 5 characters are required.",
                maxlength: "Maximum 3000 characters are required."				
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
			header("location:view-ticket-admin.php?id=".$_GET['id']);		
		}
		else{
			header("location:login.php");
		}
	}
?>