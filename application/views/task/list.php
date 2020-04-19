

<div class="container">
        <div class="row">
                 
        
          <div class="col-12"><a class="btn-blue" href='/task/add'>Добавить задачу</a></div>
        </div>
        <div class="row">
          <div class="col-12">
            <div class="tasks__list">
					<?php 
					
					foreach ($tasks as $val) :
						
					?>
              <div class="task__item">
                <div class="task__text">
									<div class="text_wrap">
										<input type="hidden" name="id" value="<?=$val['id']?>">
										<p class="task__author"><?=$val['author']?></p>
										<p class="task__desc"><?=$val['description']?></p>
										<p class="task__email"><?=$val['email']?></p>
									</div>
									<div class="task_manage">
										<a href="/task/edit?id=<?=$val['id']?>">Редактировать</a> |
										<a href="/task/delete?id=<?=$val['id']?>">Удалить</a>

										<?php $display_edit = (int)($val['edited']) ? 'inline' : 'none'; ?>
										<span class="edited" style="display:<?=$display_edit ?>"> Отредактировано </span>
									</div>
								</div>
								<?php
								if($val['done']*1){
									$done_text = 'Выполнено';
									$done_class = 'completed';
								}else{
									$done_text = 'Не выполнено';
									$done_class = 'not-completed';
								}
								?>
								<div class="task__done  <?=$done_class?>"><?=$done_text?></div>
							</div>
						<?php endforeach ?>

            </div>
          </div>
        </div>
      </div>