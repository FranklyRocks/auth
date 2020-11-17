<?php session_start();?>
<!doctype html>

<html>
<head>
	<title>Simple Auth Interface</title>
	
	<style>
		.alert {
			color: red;
		}
	</style>
</head>
<body>
	<?php if(isset($_SESSION["username"])) { ?>
		<p>Logged in: <?php echo $_SESSION["username"]; ?></p>
	<?php } ?>
	
	<!-- Login -->
	<div>
		<p class="alert"></p>
		<form id="loginForm" style="display:inline;">
			<input name="user" placeholder="Username">
			<input name="pass" placeholder="Password" type="password">
		</form>
		<button onclick="auth('login', this)">Login</button>
	</div>
	
	<!-- Register -->
	<div>
		<p class="alert"></p>
		<form id="registerForm" style="display:inline;">
			<input name="user" placeholder="Username">
			<input name="pass" placeholder="Password" type="password">
		</form>
		<button onclick="auth('register', this)">Register</button>
	</div>
	
	<!-- Auth Interface JS -->
	<script>
		function auth(url, element) {
			var form = element.parentNode.querySelector('form');
			var formData = new FormData(form);
			
			fetch("../auth/" + url + ".php", {
				method: "POST",
				body: formData
			})
			.then(response => response.text())
			.then(data => verifyAuth(data, form));
		}

		function verifyAuth(data, form) {
			if(data == 0) {
				if(form.id == "registerForm")
					form.parentNode.querySelector(".alert").innerHTML = "Username already exists";		
				if(form.id == "loginForm")
					form.parentNode.querySelector(".alert").innerHTML = "Username or password incorrect";
			} else if(data == 1) {
				location.reload();
			}
		}
	</script>

</body>
</html>