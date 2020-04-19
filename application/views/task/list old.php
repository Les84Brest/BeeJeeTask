<?php //настройка сортировки


  if(!isset($_COOKIE['sort_bind'])){
   
    $sort_item = 'by_name';
    $sort_direction = '';
    $sort_bind = serialize(['sort_item' => 'byname', 'sort_direction' => 'desc']); 
    setcookie('sort_bind', $sort_bind, time() +3600 , '/');
  }
  $sort_bind = unserialize($_COOKIE['sort_bind']);
  
  if(is_array($sort_bind)) {
    extract($sort_bind);
  }
  
?>

<div class="container">
        <div class="row">
          <div class="col-12">
            <h2 class="h2__title">Сортитовка</h2>
          </div>

          <?php
            $sort_id = [
                0 => [
                  'item' =>'byname',
                  'route' =>'/sort/author',
                  'text' => 'по имени'
                ],
                1 => [
                  'item' =>'byemail',
                  'route' =>'/sort/email',
                  'text' => 'по email'
                ],
                2 => [
                  'item' =>'bydone',
                  'route' =>'/sort/done',
                  'text' => 'по выполнению'
                ]
               
                ];
            for ($i=0; $i <sizeof($sort_id); $i++) { 
              $active_class = $sort_item == $sort_id[$i]['item'] ? 'active' : '';
              //отображаем текущий способ сортировки потому стрелки указывают наоборот
              $sort_icon = $sort_direction == '' ? '<i class="anchor-top"></i>': '<i class="anchor-down"></i>';
             
              ?>
                 <div class="col-3">
                  <a  href="<? echo $sort_id[$i]['route'].$sort_direction?>" class="tasks__sorting__item  <? echo $active_class; ?>" id="<?=$sort_id[$i]['item']?>"><?=$sort_id[$i]['text']?> </a>
                  <?php
                    if($active_class == 'active') echo $sort_icon;
                  ?>
                </div>
                 <?php
                              
              
            }
          ?>
          
        
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