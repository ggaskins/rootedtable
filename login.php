<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login Form</title>
	<style>
		body {
			background: #00b4ff;
			color: #333;
			font: 100% Arial, Sans Serif;
			height: 100vh;
			margin: 0;
			padding: 0;
			overflow-x: hidden;
		}

		#background-wrap {
			bottom: 0;
			left: 0;
			padding-top: 50px;
			position: fixed;
			right: 0;
			top: 0;
			z-index: -1;
		}

		/* KEYFRAMES */

		@-webkit-keyframes animateCloud {
			0% {
				margin-left: -1000px;
			}
			100% {
				margin-left: 100%;
			}
		}

		@-moz-keyframes animateCloud {
			0% {
				margin-left: -1000px;
			}
			100% {
				margin-left: 100%;
			}
		}

		@keyframes animateCloud {
			0% {
				margin-left: -1000px;
			}
			100% {
				margin-left: 100%;
			}
		}

		/* ANIMATIONS */

		.x1 {
			-webkit-animation: animateCloud 35s linear infinite;
			-moz-animation: animateCloud 35s linear infinite;
			animation: animateCloud 35s linear infinite;

			-webkit-transform: scale(0.65);
			-moz-transform: scale(0.65);
			transform: scale(0.65);
		}

		.x2 {
			-webkit-animation: animateCloud 20s linear infinite;
			-moz-animation: animateCloud 20s linear infinite;
			animation: animateCloud 20s linear infinite;

			-webkit-transform: scale(0.3);
			-moz-transform: scale(0.3);
			transform: scale(0.3);
		}

		.x3 {
			-webkit-animation: animateCloud 30s linear infinite;
			-moz-animation: animateCloud 30s linear infinite;
			animation: animateCloud 30s linear infinite;

			-webkit-transform: scale(0.5);
			-moz-transform: scale(0.5);
			transform: scale(0.5);
		}

		.x4 {
			-webkit-animation: animateCloud 18s linear infinite;
			-moz-animation: animateCloud 18s linear infinite;
			animation: animateCloud 18s linear infinite;

			-webkit-transform: scale(0.4);
			-moz-transform: scale(0.4);
			transform: scale(0.4);
		}

		.x5 {
			-webkit-animation: animateCloud 25s linear infinite;
			-moz-animation: animateCloud 25s linear infinite;
			animation: animateCloud 25s linear infinite;

			-webkit-transform: scale(0.55);
			-moz-transform: scale(0.55);
			transform: scale(0.55);
		}

		/* OBJECTS */

		.cloud {
			background: #fff;
			background: -moz-linear-gradient(top,  #fff 5%, #f1f1f1 100%);
			background: -webkit-gradient(linear, left top, left bottom, color-stop(5%,#fff), color-stop(100%,#f1f1f1));
			background: -webkit-linear-gradient(top,  #fff 5%,#f1f1f1 100%);
			background: -o-linear-gradient(top,  #fff 5%,#f1f1f1 100%);
			background: -ms-linear-gradient(top,  #fff 5%,#f1f1f1 100%);
			background: linear-gradient(top,  #fff 5%,#f1f1f1 100%);
			filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fff', endColorstr='#f1f1f1',GradientType=0 );

			-webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;

			-webkit-box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);
			-moz-box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);
			box-shadow: 0 8px 5px rgba(0, 0, 0, 0.1);

			height: 120px;
			position: relative;
			width: 350px;
		}

		.cloud:after, .cloud:before {
			background: #fff;
			content: '';
			position: absolute;
			z-indeX: -1;
		}

		.cloud:after {
			-webkit-border-radius: 100px;
			-moz-border-radius: 100px;
			border-radius: 100px;

			height: 100px;
			left: 50px;
			top: -50px;
			width: 100px;
		}

		.cloud:before {
			-webkit-border-radius: 200px;
			-moz-border-radius: 200px;
			border-radius: 200px;

			width: 180px;
			height: 180px;
			right: 50px;
			top: -90px;
		}
		@import url('https://fonts.googleapis.com/css?family=Poppins:400,500,600,700,800,900');

		body{
			font-family: 'Poppins', sans-serif;
			font-weight: 300;
			font-size: 15px;
			line-height: 1.7;
			color: #c4c3ca;
			overflow-x: hidden;
		}
		a {
			cursor: pointer;
			transition: all 200ms linear;
		}
		a:hover {
			text-decoration: none;
		}
		.link {
			color: #c4c3ca;
		}
		.link:hover {
			color: #ffeba7;
		}
		p {
			font-weight: 500;
			font-size: 14px;
			line-height: 1.7;
		}
		h4 {
			font-weight: 600;
		}
		h6 span{
			padding: 0 20px;
			text-transform: uppercase;
			font-weight: 700;
		}
		.section{
			position: relative;
			width: 100%;
			text-align: center;
		}
		.full-height{
			min-height: 100vh;
		}
		[type="checkbox"]:checked,
		[type="checkbox"]:not(:checked){
			position: absolute;
			left: -9999px;
		}
		.checkbox:checked + label,
		.checkbox:not(:checked) + label{
			position: relative;
			display: block;
			text-align: center;
			width: 60px;
			height: 16px;
			border-radius: 8px;
			padding: 0;
			margin: 10px auto;
			cursor: pointer;
			background-color: #ffeba7;
		}
		.checkbox:checked + label:before,
		.checkbox:not(:checked) + label:before{
			position: absolute;
			display: block;
			width: 36px;
			height: 36px;
			border-radius: 50%;
			color: #ffeba7;
			background-color: #102770;
			font-family: 'unicons';
			content: '\eb4f';
			z-index: 20;
			top: -10px;
			left: -10px;
			line-height: 36px;
			text-align: center;
			font-size: 24px;
			transition: all 0.5s ease;
		}
		.checkbox:checked + label:before {
			transform: translateX(44px) rotate(-270deg);
		}


		.card-3d-wrap {
			position: relative;
			width: 440px;
			max-width: 100%;
			height: 400px;
			-webkit-transform-style: preserve-3d;
			transform-style: preserve-3d;
			perspective: 800px;
			margin-top: 60px;
		}
		.card-3d-wrapper {
			width: 100%;
			height: 100%;
			position:absolute;    
			top: 0;
			left: 0;  
			-webkit-transform-style: preserve-3d;
			transform-style: preserve-3d;
			transition: all 600ms ease-out; 
		}
		.card-front, .card-back {
			width: 100%;
			height: 100%;
			background-color: #2a2b38;
			background-image: url('https://s3-us-west-2.amazonaws.com/s.cdpn.io/1462889/pat.svg');
			background-position: bottom center;
			background-repeat: no-repeat;
			background-size: 300%;
			position: absolute;
			border-radius: 6px;
			left: 0;
			top: 0;
			-webkit-transform-style: preserve-3d;
			transform-style: preserve-3d;
			-webkit-backface-visibility: hidden;
			-moz-backface-visibility: hidden;
			-o-backface-visibility: hidden;
			backface-visibility: hidden;
		}
		.card-back {
			transform: rotateY(180deg);
		}
		.checkbox:checked ~ .card-3d-wrap .card-3d-wrapper {
			transform: rotateY(180deg);
		}
		.center-wrap{
			position: absolute;
			width: 100%;
			padding: 0 35px;
			top: 50%;
			left: 0;
			transform: translate3d(0, -50%, 35px) perspective(100px);
			z-index: 20;
			display: block;
		}


		.form-group{ 
			position: relative;
			display: block;
			margin: 0;
			padding: 0;
		}
		.form-style {
			padding: 13px 20px;
			padding-left: 55px;
			height: 35px;
			width: 75;
			font-weight: 500;
			border-radius: 4px;
			font-size: 14px;
			line-height: 22px;
			letter-spacing: 0.5px;
			outline: none;
			color: #c4c3ca;
			background-color: #1f2029;
			border: none;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
			box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
		}
		.form-style:focus,
		.form-style:active {
			border: none;
			outline: none;
			box-shadow: 0 4px 8px 0 rgba(21,21,21,.2);
		}
		.input-icon {
			position: absolute;
			top: 0;
			left: 18px;
			height: 48px;
			font-size: 24px;
			line-height: 48px;
			text-align: left;
			color: #ffeba7;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}

		.form-group input:-ms-input-placeholder  {
			color: #c4c3ca;
			opacity: 0.7;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input::-moz-placeholder  {
			color: #c4c3ca;
			opacity: 0.7;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input:-moz-placeholder  {
			color: #c4c3ca;
			opacity: 0.7;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input::-webkit-input-placeholder  {
			color: #c4c3ca;
			opacity: 0.7;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input:focus:-ms-input-placeholder  {
			opacity: 0;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input:focus::-moz-placeholder  {
			opacity: 0;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input:focus:-moz-placeholder  {
			opacity: 0;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}
		.form-group input:focus::-webkit-input-placeholder  {
			opacity: 0;
			-webkit-transition: all 200ms linear;
			transition: all 200ms linear;
		}

		.btn{  
			border-radius: 4px;
			height: 44px;
			font-size: 13px;
			font-weight: 600;
			text-transform: uppercase;
			-webkit-transition : all 200ms linear;
			transition: all 200ms linear;
			padding: 0 30px;
			letter-spacing: 1px;
			display: -webkit-inline-flex;
			display: -ms-inline-flexbox;
			display: inline-flex;
			-webkit-align-items: center;
			-moz-align-items: center;
			-ms-align-items: center;
			align-items: center;
			-webkit-justify-content: center;
			-moz-justify-content: center;
			-ms-justify-content: center;
			justify-content: center;
			-ms-flex-pack: center;
			text-align: center;
			border: none;
			background-color: #ffeba7;
			color: #102770;
			box-shadow: 0 8px 24px 0 rgba(255,235,167,.2);
		}
		.btn:active,
		.btn:focus{  
			background-color: #102770;
			color: #ffeba7;
			box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
		}
		.btn:hover{  
			background-color: #102770;
			color: #ffeba7;
			box-shadow: 0 8px 24px 0 rgba(16,39,112,.2);
		}
		.container {
			display: flex;
			justify-content: center;
			align-items: center;
			min-height: 100vh;
		}
		.row.full-height {
			flex-grow: 1;
		}
	</style>
</head>
<body>
	<div id="background-wrap">
		<div class="x1">
			<div class="cloud"></div>
		</div>

		<div class="x2">
			<div class="cloud"></div>
		</div>

		<div class="x3">
			<div class="cloud"></div>
		</div>

		<div class="x4">
			<div class="cloud"></div>
		</div>

		<div class="x5">
			<div class="cloud"></div>
		</div>
	</div>
	<div class="section">
		<div class="container">
			<div class="row full-height justify-content-center">
				<div class="col-12 text-center align-self-center py-5">
					<div class="section pb-5 pt-5 pt-sm-2 text-center">
						<h6 class="mb-0 pb-3"></h6>
						<input class="checkbox" type="checkbox" id="reg-log" name="reg-log"/>
						<label for="reg-log"></label>
						<div class="card-3d-wrap center-vertically">
							<div class="card-3d-wrapper">
								<div class="card-front">
									<div class="center-wrap">
										<form action="authenticate.php" method="post">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Log In</h4>
												<div class="form-group">
													<input type="text" name="user_email" id="user_email" class="form-control" />
													<i class="input-icon uil uil-at"></i>
												</div>  
												<div class="form-group mt-2">
													<input type="password" name="user_password" id="user_password" class="form-control" />
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<input type="submit" name="login" id="login" class="btn btn-info" value="Login" /><p class="mb-0 mt-4 text-center"><a href="#0" class="link">Forgot your password?</a></p>
											</div>
										</form>
									</div>
								</div>
								<div class="card-back">
									<div class="center-wrap">
										<form action="register.php" method="post">
											<div class="section text-center">
												<h4 class="mb-4 pb-3">Sign Up</h4>
												<div class="form-group">
													<input type="text" name="name" class="form-style" placeholder="Your Full Name" id="logname" autocomplete="off">
													<i class="input-icon uil uil-user"></i>
												</div>  
												<div class="form-group mt-2">
													<input type="email" name="email" class="form-style" placeholder="Your Email" id="logemail" autocomplete="off">
													<i class="input-icon uil uil-at"></i>
												</div>  
												<div class="form-group mt-2">
													<input type="password" name="password" class="form-style" placeholder="Your Password" id="logpass" autocomplete="off">
													<i class="input-icon uil uil-lock-alt"></i>
												</div>
												<input type="submit" class="btn mt-4" value="submit">
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>
