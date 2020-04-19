<!DOCTYPE html>
<html lang="ru">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title><?=$title?></title>
    <link rel="stylesheet" href="/css/main.min.css">
  </head>
  <body>
    <header>
      <div class="container">
        <div class="row">
          <div class="col-6">
            <h1 class="h1__title"><?=$title?></h1>
          </div>
          
          <div class="col-6">
            <div class="header__login">
          
            <?php
              if((isset($_SESSION['logined'])) ){
                ?>
                <a href="/task/list" class="header_link">Управление задачами</a>
                <br><a href="/account/logout">Выйти</a>
                <?php
              }else{
            ?>
            <a class="header__link" href="/account/login">Войти</a>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>
    </header>
    <main>
      <?=$content?>
    </main>
    <footer>
      <div class="container">
        <div class="row">
        <? 
          if(isset($paginator)){
            if(isset($_GET['page'])){
              $links_data = $paginator->getLinks($_GET['page']);
            }else{
              $links_data = $paginator->getLinks(1);
            }
          }
         
         if(isset($links_data)) :

         ?>
          <div class="col-12"> 
            <ul class="pagination">
         <?php
          foreach($links_data as $k => $link): 
        ?>
          <li><a class="pagination__link <?=$link['active'] ? 'active': ''?>" href="<?=$link['href']?>"><?=$link['page']?></a></li>

        <?php
          endforeach;
        endif;
        ?>
        </ul>
          </div>
        
        
        </div>
      </div>
    </footer>
    <script src="/js/scripts.min.js"></script>
    <script src="/js/main.js"></script>
  </body>
</html>