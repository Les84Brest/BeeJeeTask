<div class="container">
	<div class="row">
		<div class="col-12">
			<form action="editingtask" method="post" id="addtask">
			<?php //не меняем id формы т.к. валидация такая же как при добавлении ?>
				<input type="hidden" name="id" value="<?=$id?>">
				<p>Автор</p>
				<p><input type="text" name='author' id="author" value="<?=$author?>"></p>
				<p>Электронная почта</p>
				<p><input type="text" name='email' id='email' placeholder="youmail@domain.ru" value="<?=$email?>" ></p>
				<p>Описание задачи</p>
				<p><textarea name="description" id='description'  cols="45" rows="3"><?=$description?></textarea></p>
				<?php $check = $done ? 'checked' : ''; ?> 
				<p>Выполнено <input type="checkbox" name="done" <?=$check?>></p>
				<button type="submit">Сохранить</button>

			</form>
		</div>
	</div>
</div>