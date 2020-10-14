<div class="page-header header-filter">
  <div class="squares square1"></div>
  <div class="squares square2"></div>
  <div class="squares square3"></div>
  <div class="squares square4"></div>
  <div class="squares square5"></div>
  <div class="squares square6"></div>
  <div class="squares square7"></div>
  <div class="section mt-5">
    <div class="container mt-lg-5">
    <div class="row justify-content-between align-items-center">
              <div class="col-lg-5 mb-5 mb-lg-0 ">
                <h1 class="text-white font-weight-light">Bootstrap carousel</h1>
                <p class="text-white mt-4">Black Design comes with three pre-built pages to help you get started faster.
                  You can change the text and images and you're good to go.</p>
                <a href="./docs/1.0/components/alerts.html" class="btn btn-warning mt-4">See all components</a>
              </div>
              <div class="col-lg-6">

                <div id="myCarousel" class="carousel slide">
                  <div class="carousel-inner">

                   <?php 
                    $activeStat=true;
 
                    $data=$db->getAllData('products');

                    for ($i=0; $i < count($data); $i++) { 
                       if ($i===1) {
                         $activeStat=false;
                        }
                        $Pname= $data[$i]["product_name"];
                        $Pprice= $data[$i]["product_price"];
                        $Pimg= $data[$i]["img"];

                   ?>

                     <div class="carousel-item <?php if($activeStat){echo "active";}?>" >
                      <img class="d-block w-100" src="img/<?php echo $Pimg; ?>" alt="First slide">
                       <div class="carousel-caption">
                        <h3><?php echo $Pname; ?></h3>
                          <p><?php echo $Pprice; ?></p>
                        </div>
                      </div>
                    <?php
                     }
                    ?>
                    <!-- <div class="carousel-item">
                      <img class="d-block w-100" src="assets/img/fabien-bazanegue.jpg" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                      <img class="d-block w-100" src="assets/img/mark-finn.jpg" alt="Third slide">
                    </div> -->
                  </div>
                  <a class="carousel-control-prev" href="#headerCarousel" role="button" data-slide="prev">
                    <i class="tim-icons icon-minimal-left"></i>
                    <span class="sr-only">Previous</span>
                  </a>
                  <a class="carousel-control-next" href="#headerCarousel" role="button" data-slide="next">
                    <i class="tim-icons icon-minimal-right"></i>
                    <span class="sr-only">Next</span>
                  </a>
                </div>
              </div>
            </div>
    </div>
  </div>
</div>