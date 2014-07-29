<?php
require_once dirname(__FILE__)."/ducktape.inc.php";
require_once($prepage);

$session = DTSession::sharedSession();
if(isset($_REQUEST["oauth_token"]))
	$oauth_token = $_REQUEST["oauth_token"];
else //never come here directly without requesting a token first
	echo "<script>window.location.replace('index.php');</script>";
?>

<center>
<h2><?=$config["app_name"]?> Login</h2>

<p>Please use your account to log in.</p>

<div>
	<form id="login_form" action='javascript: return false;'>
		<input type="hidden" name="oauth_token" id="oauth_token" value="<?=$oauth_token?>" />
		<input type="hidden" name="tok" value="<?=$dt_token?>" />
		<input type="hidden" name="act" value="authenticate" />
		<div class='login'>
			<p id="login_error_message_div" style="color:red; font-weight:bold"></p>
			<table><tr><th colspan="2">Your Account</th></tr><tr>
				<td align=right><label for="login_user">Username:</label></td>
				<td><input type="text" name="alias" style="width:200px" /></td>
			</tr><tr>
				<td align=right><label for="login_password">Password:</label></td>
				<td><input type="password" name="password" style="width:200px" /></td>
			</tr><tr>
				<td colspan=2 align=right><input type="submit" id="login" value="Login" /></td>
			</tr><tr>
				<td colspan=2>Don't have an account? <a href="register.php">Register Now</a> <strong>or</strong> use:</td>
			</tr></table>
		</div>
	</form>
</div>

</center>

<script>
$(document).ready(function(){ //set up login form submit
	$("#login").button();

	$("#login_form").submit(function(e){
		e.preventDefault();
		dt.post({
			url:"<?=DTSettings::baseURL("consumers/auth_consumer.php")?>",
			form:"#login_form",
			success:function(obj){
				if(obj==null)
					$("#login_error_message_div").html('Authentication failed.');
				else
					window.location.href='<?=DTSettings::baseURL("index.php")?>'; //this will happen if we're already logged in
			}
		});
		return false;
	});
});
</script>


<?php
require_once($postpage);
