$(document).ready(function() {

	/*валидация формы задачи*/

  $('#addtask').submit(function(e) {
			
		e.preventDefault();
		console.log('jljdosho');
		var flag = true;
		$(".error").remove();

		var author =$.trim( $('#author').val());
		var desc= $.trim($('#description').val());
		var email = $.trim($('#email').val());

		if (author == '') {

			$('#author').after('<span class="error">Поле обязательно для заполнения</span>');
			flag = false;
		}

		if (desc == '') {
			$('#description').after('<span class="error">Описание должно быть добавлено</span>');
			flag = false;
		}
		
		// если поля прошли проверку разрешаем подпись формы
		
		/*проверка email */
		if (email == '') {
			$('#email').after('<span class="error">Поле должно быть заполнено</span>');
			flag = false;
		} else{
				var regEx = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
				
				var validEmail = regEx.test(email);
				if (!validEmail) {
					$('#email').after('<span class="error">Введите валидный почтовый ящик</span>');
					flag = false;
				}
		}

			if(flag == true){
				$(this).unbind().submit();
			}
		
   
	});
	
/*валидация формы входа*/

	$('#loginform').submit(function(e){
		e.preventDefault();
		$(".error").remove();

		var login = $.trim($("#login").val());
		var password = $.trim($("#password").val());
		var flag = true;

		if(login == ''){
			$("#login").after('<span class="error">Поле обязательно для заполнения</span>');
			flag = false;
		}

		if(password == ''){
			$("#password").after('<span class="error">Поле обязательно для заполнения</span>');
			flag = false;
		}
		// если поля прошли проверку разрешаем подпись формы

		console.log(flag);
		if(flag == true){
			$(this).unbind().submit();
		}

	});

	
}); 



function formValidationTask(){
	/*
		валидация задачи
	*/
	var author = $('#author').val();
	var desc= $('#description').val();
	var email = $('#email').val();


	var flag = true;
	$(".error").remove();

	if (author.length< 1) {
		$('#author').after('<span class="error">Поле обязательно для заполнения</span>');
		flag = false;
	}
	if (desc.length< 1) {
		$('#description').after('<span class="error">Описание должно быть добавлено</span>');
		flag = false;
	}
	if (email.length< 1) {
		$('#email').after('<span class="error">Поле должно быть заполнено</span>');
		flag = false;
	} else {
		var regEx = /^\w+([\.-]?\w+)*@(((([a-z0-9]{2,})|([a-z0-9][-][a-z0-9]+))[\.][a-z0-9])|([a-z0-9]+[-]?))+[a-z0-9]+\.([a-z]{2}|(com|net|org|edu|int|mil|gov|arpa|biz|aero|name|coop|info|pro|museum))$/i;
		
		var validEmail = regEx.test(email);
		if (!validEmail) {
			$('#email').after('<span class="error">Введите валидный почтовый ящик</span>');
			flag = false;
		}
	}

	/*валидация формы входа */

	if (login.length< 1) {
		$('#author').after('<span class="error">Поле обязательно для заполнения</span>');
		flag = false;
	}

	if (password.length< 1) {
		$('#author').after('<span class="error">Поле обязательно для заполнения</span>');
		flag = false;
	}

	return flag;
}

function formValidationLogin(){
	
	/*валидация формы входа */
	var login = $('#login').val();
	var password = $('#password').val();
console.log(login + '  ' + password);
	var flag = true;

	/*валидация формы входа */

	if (login.length< 1) {
		$('#author').after('<span class="error">Поле обязательно для заполнения</span>');
		flag = false;
	}

	if (password.length< 1) {
		$('#author').after('<span class="error">Поле обязательно для заполнения</span>');
		flag = false;
	}

	console.log(flag);
	return flag;
}