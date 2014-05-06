<?php session_start(); ?>
<!-- IF NOT LOGGEDIN -->
<?php if(!isset($_SESSION['loginname'])) { ?>
	<!-- Login START -->
	<div id='login'>
		<div class='header'>
			<h3>Login</h3>
			<div onclick="createDeleteLogin()">x</div>
		</div>
		  <div class="table-wrap">
			<table>
				<tr>
					<td>
						<lable class="text">Login name</lable>
					</td>
				</tr>
				<tr>
					<td>
						<input id="username" class='form-control textinput' type='text' onchange="checkIfEmpty(this)" name='username'>
					</td>
				</tr>
				<tr>
					<td>
						<lable class="text">Password</lable>
					</td>
				</tr>
				<tr>
					<td>
						<input id="password" class='form-control textinput' type='password' onchange="checkIfEmpty(this)" name='password'>
					</td>
				</tr>
				<tr>
					<td>
						<input id='saveuserlogin' type='checkbox' value="on">
						<lable class="text">Remember me</lable>
					</td>
				</tr>
				
				<tr>
					<td>
						<input type='button' class='btn btn-login' onclick="makeLogin()" value='Login'>
						<lable class='forgotPw' onclick='showForgontPw();'>Forgot password?</lable>
					</td>
				</tr>
				<!--
				<tr>
					<td>
						<input type='button' class='btn btn-success btn-forgot' onclick="makeLogin()" value='Forgot password?'>
					</td>
				</tr>
				-->
			</table>
		  </div>
	</div>
	<!-- Login END -->

	<!-- Forgot Password START -->
	<div id='forgotPw' class="hide">
		<div class='header'>
			<h3>Forgot password</h3>
			<div onclick="createDeleteLogin()">x</div>
		</div>
		  <div class="table-wrap">
			<table>
				<tr>
					<td>
						<lable class='text'>Login name</lable>
					</td>
				</tr>
				<tr>
					<td>
						<input id="username" class='form-control textinput' type='text' onchange="checkIfEmpty(this)" name='username'>
					</td>
				</tr>
				<tr>
					<td id="message">
					</td>
				</tr>
				<tr>
					<td>
						<input type='button' onclick='showQuestion();' class='btn btn-login btn-next' value='Next'>
						<input type='button' onclick='showLogin();' class='btn btn-forgot btn-cancel' value='back'>
					</td>
				</tr>
			</table>
		  </div>
	</div>
	<!-- Forgot Password END -->

	<!-- Forgot Password Question START -->
	<div id='forgotPwAnswer' class="hide">
		<div class='header'>
			<h3>Forgot password</h3>
			<div onclick="createDeleteLogin()">x</div>
		</div>
		 <div class="table-wrap">
			<table>
				<tr>
					<td>
						<lable id='question'></lable>
					</td>
				</tr>
				<tr>
					<td>
						<lable class='text'>Answer</lable>
					</td>
				</tr>
				<tr>
					<td>
						<input id="answer" class='form-control textinput' type='text'>
					</td>
				</tr>
				<tr>
					<td>
						<lable class='text'>New password</lable>
					</td>
				</tr>
				<tr>
					<td>
						<input id="newpassword" class='form-control textinput' type='password'>
					</td>
				</tr>
				<tr>
					<td>
						<input id="newpassword2" class='form-control textinput' type='password'>
					</td>
				</tr>
				<tr>
					<td id="message">
					</td>
				</tr>
				<tr>
					<td>
						<input type='button' onclick='checkAnswer()' class='btn btn-login btn-next' value='Submit'>
						<input type='button' onclick='showForgontPw();' class='btn btn-login btn-cancel' value='Back'>
					</td>
				</tr>
			</table>
		  </div>
	</div>
	<!-- Forgot Password Question END -->
	<!-- Make New Password START -->
	<div id='createPassword' class="hide">
		<div class='header'>
			<h3>Make password</h3>
			<div onclick="createDeleteLogin()">x</div>
		</div>
		<div class="table-wrap">
			<table>
				<tr>
					<td>
						New password
					</td>
				</tr>
				<tr>
					<td>
						<input id="password1" type="password" onchange="checkIfEmpty(this)" class="form-control textinput">
					</td>
				</tr>
				<tr>
					<td>
						<input id="password2" type="password" onchange="checkIfEmpty(this)" class="form-control textinput">
					</td>
				</tr>
				<tr>
					<td>
						Recovery question
					</td>
				</tr>
				<tr>
					<td>
						<input id="question" type="text" onchange="checkIfEmpty(this)" class="form-control textinput">
					</td>
				</tr>
				<tr>
					<td>
						Answer
					</td>
				</tr>
				<tr>
					<td>
						<input id="answer" type="text" onchange="checkIfEmpty(this)" class="form-control textinput">
					</td>
				</tr>
				<tr>
					<td id="message">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" onclick="newPasswordAndQuestion()" value="Submit" class="btn btn-login btn-next">
					</td>
				</tr>
			</table>
		</div>
	</div>
	<!-- Make New Password END -->
<?php } else { ?>
<!-- Logout START -->
	<div id='logout'>
		<div class='header'>
			<h3>Logout</h3>
			<div onclick="createDeleteLogin()">x</div>
		</div>
		  <div class="table-wrap">
			<table>
				<tr>
					<td>
						Are you sure you want to log out?
					</td>
				</tr>
				<tr>
					<td>
						<input type='button' onclick='makeLogout();' class='btn btn-login btn-next' value='Yes'>
						<input type='button' onclick='createDeleteLogin();' class='btn btn-forgot btn-cancel' value='No'>
					</td>
				</tr>
			</table>
		  </div>
	</div>
	<!-- Logout Password END -->
<?php } ?>