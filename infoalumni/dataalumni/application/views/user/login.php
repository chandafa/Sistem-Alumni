<center>
<h3>Login Panel</h3>
<form action="<?php echo site_url('Login/doLogin');?>" method="post">
	<input type="text" name="email" class="form-control" placeholder="Email"><br>
	<input type="password" name="password" class="form-control" placeholder="password"><br>
	<button type="submit" name="submit" class="btn btn-primary form-control">Login</button>
</form>
</center>