
<div class="container">
	<div class="row">
		<div class="col-12">
			<span class="error"><?=$error_msg?></span>
		<h3>Авторизация </h3>
		<form action="/account/checkuser" method="post" id="loginform">
	<p>Логин</p>
	<p><input type="text" name="login" id="login"></p>
	<p>Пароль</p>
	<p><input type="password" name="password" id="password"></p>
<p><input type="submit" value="Войти"></p>
</form>



		</div>
	</div>
</div>
