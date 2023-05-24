<?php
include('database.php');
function getWatches(){
    $sql = 'SELECT * FROM watches';
    $result = $GLOBALS['mysqli']  -> query($sql);
    foreach ($result as $watch) {
        echo '
        <div class="col-md-4">
        <div class="product-item">
          <a href="#"><img src="'.$watch['img'].'" alt=""></a>
          <div class="down-content">
            <a href="#"><h4>'.$watch['model'].'</h4></a>
            <h6>'.$watch['price'].'$</h6>
            <p>'.$watch['brand'].'</p>
          </div>
        </div>
      </div> ';
    }
};

function getWatchesAdmin(){
    $sql = 'SELECT * FROM watches';
    $result = $GLOBALS['mysqli']  -> query($sql);
    foreach ($result as $watch) {
      echo'
      
          <form action = "crud.php" method = "post">
      <div class="col-md-3">
          <input type = "text" name = "id" value = '.$watch['id'].' hidden>
              <div class="product-item-1">
                  
                  <div class="product-content">
                  <input type = "text" name = "img" value = "'.$watch['img'].'" placeholder = "img-src">
                      <h5><input type = "text" name = "brand" value = "'.$watch['brand'].'"></h5>
                      <span class="tagline"><input type = "text" name = "model" value = "'.$watch['model'].'"></span>
                      <span class="price"><input type = "text" name = "price" value = "'.$watch['price'].'"></span>
                      
                      <input type = "submit" name = "edit_watch" value = "Upravit">
                      <input type = "submit" name = "remove_watch" value = "Vymazat">
                  </div> 
              </div> 
          </div> 
          </form>';

  }
  echo 
      
  '
  <form action = "crud.php" method = "post">
  <div class="col-md-3">
          <div class="product-item-1">
              
              <div class="product-content">
              <input type = "text" name = "img"  placeholder = "img-src">
                  <h5><input type = "text" name = "brand" placeholder = "brand"></h5>
                  <span class="tagline"><input type = "text" name = "model" placeholder = "model" ></span>
                  <span class="price"><input type = "text" name = "price" placeholder = "price"></span>
                  
                  <input type = "submit" name = "add_watch" value = "Pridat">
                  
              </div> 
          </div> 
      </div> 
      </form>';
      
};
