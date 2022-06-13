<?php 
session_start();
if(isset($_SESSION['useremail']) and isset($_SESSION['name']) and isset($_SESSION['role']) and isset($_SESSION['id'])){
	if($_SESSION['role']=="Admin"){
	      header("Location:userdashboard.php");
	  }
	  elseif ($_SESSION['role']=="Employee") {
	    header("Location:emp-dashboard.php");
	  }else{
	     header("Location:emp-projectassign.php");
	  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

	<title>Captain Audit Portal</title>
	
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta name="description" content="Captain Audit Portal is specially designed for management of any brand easily. Here you can track all processes of your business. Captain Audit Portal is product of THE BRAND LANDMARK" />
	<meta name="keywords" content="admin templates, bootstrap admin templates, bootstrap 4, dashboard, dashboard templets, sass admin templets, html admin templates, responsive, bootstrap admin templates free download,premium bootstrap admin templates, Flash Able, Flash Able bootstrap admin template">
	<meta name="author" content="The Brand Landmark" />

	<!-- Favicon icon -->
	<link rel="icon" href="assets/images/webl.png" type="image/x-icon">
	<!-- fontawesome icon -->
	<link rel="stylesheet" href="assets/fonts/fontawesome/css/fontawesome-all.min.css">
	<!-- animation css -->
	<link rel="stylesheet" href="assets/plugins/animation/css/animate.min.css">

	<!-- vendor css -->
	<link rel="stylesheet" href="assets/css/style.css">

</head>

<!-- [ auth-signin ] start -->
<div class="auth-wrapper">
	<div class="auth-content container">
		<div class="card">
			<div class="row align-items-center">
				<div class="col-md-6">
					<div class="card-body">
						<form action="process/login.php?tkn=<?php echo $_GET['token'];?>" method="POST">
							
							<input type="text" name="usertoken" id="token" style="display: none;">
							<img src="assets/images/CAP_BLACK.png" width="180px" height="40px" alt="" class="img-fluid mb-4" style="display: block;margin-left: auto;margin-right: auto;">
							<h4 class="mb-3 f-w-400">Login into your account</h4>
							<div class="input-group mb-3">
								<div class="form-check form-check-inline">
								  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="admin" checked>
								  	<label class="form-check-label" for="inlineRadio1">Admin / Employee / Store</label>&nbsp;&nbsp;&nbsp;
								  	<input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="staff">
								  	<label class="form-check-label" for="inlineRadio2">Store Staff</label>
								</div>
							</div>
							<div class="input-group mb-2">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-mail"></i></span>
								</div>
								<input type="email" id="email" class="form-control" placeholder="Email address" name="email">
							</div>
							<div class="input-group mb-3">
								<div class="input-group-prepend">
									<span class="input-group-text"><i class="feather icon-lock"></i></span>
								</div>
								<input type="password" id="password" class="form-control" placeholder="Password" name="password">
							</div>
							
							<div class="form-group text-left mt-2">
								<div class="checkbox checkbox-primary d-inline">
									<input type="checkbox" name="svcred" id="svcred" checked>
									<label for="checkbox-fill-a1" class="cr"> Save credentials</label>
								</div>
							</div>
							<button class="btn btn-primary mb-4" name="Login">Login</button>
						</form>
					</div>
				</div>
				<div class="col-md-6 d-none d-md-block">
					<img src="assets/images/sideimage.jpg" alt="" class="img-fluid">
				</div>
			</div>
		</div>
	</div>
</div>
<!-- [ auth-signin ] end -->

<!-- Required Js -->
<?php include("process/script.php") ?>
<script>
    var firebaseConfig = {
        databaseURL: "YOUR_FIREBASE_DATBASE_URL",
        apiKey: "AIzaSyCae6Z6p2WIhCkPpdj5s1Vbd1F5FjGabFc",
        authDomain: "captain-audit.firebaseapp.com",
        projectId: "captain-audit",
        storageBucket: "captain-audit.appspot.com",
        messagingSenderId: "939933986097",
        appId: "1:939933986097:web:62421376f31de3e01fd410",
        measurementId: "G-3VC3685M37"
    };
    firebase.initializeApp(firebaseConfig);
    const messaging=firebase.messaging();

    function IntitalizeFireBaseMessaging() {
        messaging
            .requestPermission()
            .then(function () {
                console.log("Notification Permission");
                return messaging.getToken();
            })
            .then(function (token) {
                console.log("Token : "+token);
                document.getElementById("token").value=token;
            })
            .catch(function (reason) {
                console.log(reason);
            });
    }

    messaging.onMessage(function (payload) {
        console.log(payload);
        const notificationOption={
            body:payload.notification.body,
            icon:payload.notification.icon
        };

        if(Notification.permission==="granted"){
            var notification=new Notification(payload.notification.title,notificationOption);

            notification.onclick=function (ev) {
                ev.preventDefault();
                window.open(payload.notification.click_action,'_blank');
                notification.close();
            }
        }

    });
    messaging.onTokenRefresh(function () {
        messaging.getToken()
            .then(function (newtoken) {
                console.log("New Token : "+ newtoken);
            })
            .catch(function (reason) {
                console.log(reason);
            })
    })
    IntitalizeFireBaseMessaging();
</script>
</body>
</html>
