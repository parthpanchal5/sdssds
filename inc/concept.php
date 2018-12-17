<li><a href="#modal1" class="waves-effect waves-light modal-trigger">Login/Signup</a></li>
			<div id="modal1" class="modal gradient-4">
				<div class="modal-content black-text">
					<div class="container-fluid">
						<div class="row">
							<div class="col m2 hide-on-med-and-down">
								<img src="img/login.svg" height="280" style="margin: 30px 0px 0px 20px;" alt="login">
							</div>
							<div class="col s12 m7 right">
								<div class="card-panel z-depth-2">
									<form action="logcode.php" method="POST">
										<div class="row">
											<div class="input-field s4">
												<i class="material-icons prefix">account_circle</i>
												<input type="text" name="userinput" id="userinput">
												<label for="userinput">Username or email</label>
											</div>
										</div>
										<div class="row">
											<div class="input-field s4">
												<i class="material-icons prefix">security</i>
												<input type="password" name="password" id="password">
												<label for="userinput">Password</label>
											</div>
										</div>
										<div class="row">
											<input type="submit" value="Login" name="login" class="btn btn-small blue" style="margin-right: 20px;">
											<input type="reset" value="cancel" class="btn grey btn-small lighten-1">
										</div>
											<a href="forgot.php" class="blue-text" style="padding: 0px !important; margin: -30px -2px -40px;" id="modal-links">Forgot Password?</a>  
											<a href="reg.php" class="blue-text" style="padding: 0px !important; margin: -30px -2px -40px;" id="modal-links">Signup</a>
									</form>
								</div>	
							</div>
						</div>
					</div>						
				</div>
			</div>