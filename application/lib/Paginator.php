<?php
namespace application\lib;


class Paginator {

	 
	 private $items_count;
	 private $items;
	 private $maximum;
	 
	
	 
	 public function __construct($items, $max_items){
		
		$this->items = $items;
		$this->maximum = $max_items; //максимальное кол-во для показа
		$this->items_count = count($this->items);
		
	 }


	public function getItem	sByPageNumber($page){
	

		if($this->items_count == 0){
			return array(); //если не добавлено задач возвращаем пустой массив
		}
		
		
		if($this->items_count < $this->maximum)	{
			return $this->items;
			
		}	
//перешли на первую страницу не по ссылке пагинации
		if($page == 0){
			return array_slice($this->items, 0, $this->maximum );
		} else{
			$offset = ($page-1) * $this->maximum ;
			
		}

		 return array_slice($this->items, $offset, $this->maximum);
	}


	public function getLinks($page_num){
		//разбираем строку url;	

		$url = $_SERVER['REQUEST_URI'];
		

		$get_pos = strpos($url,'?');
	
		if(!$get_pos === false || $get_pos == 0 ){ // если 0 значит корень сайта
			//возвращаем строку не считая позиции ввода и ?

			$url =substr($url,0, $get_pos); 	
			
		}

		
		$links = array();
		
		$max_page = ceil($this->items_count / $this->maximum);
		
		
		for ($i=1; $i <= $max_page; $i++) { 
			$links[] = [
				'page' => $i,
				'href' => $url . '?page=' . $i,
				'active' => $i == $page_num
			];
		}

		return $links;


	}

	public function getShowCount(){
		return $this->maximum;
	}

}