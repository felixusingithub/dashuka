<?php
// var_dump($row);
    $img=$row->imgurl;  
    // $img="http://img5.douban.com/lpic/s6974202.jpg";
?>
      <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <!-- Indicators -->
        <ol class="carousel-indicators">
          <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
          <!-- <li data-target="#carousel-example-generic" data-slide-to="1"></li>
          <li data-target="#carousel-example-generic" data-slide-to="2"></li> -->
        </ol>

        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active">
            <center><img src="<?=$img?>" alt="..." style="min-height: 400px;min-width: 300px"></center>
          </div>
          <!-- <div class="item">
            <center><img src="<?=$img?>" alt="..." style="min-height: 400px;min-width: 300px"></center>
          </div>
          <div class="item">
            <center><img src="<?=$img?>" alt="..." style="min-height: 400px;min-width: 300px"></center>
          </div> -->
        </div>

        <!-- Controls -->
        <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
          <span class="glyphicon glyphicon-chevron-left"></span>
        </a>
        <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
          <span class="glyphicon glyphicon-chevron-right"></span>
        </a>
      </div>

