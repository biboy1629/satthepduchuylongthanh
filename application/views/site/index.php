<section class="section-slide">
    <div class="wrap-slick1">
            <div class="slick1">
                <div class="item-slick1 item1-slick1" style="background-image: url(<?php echo base_url()?>public/images/banner/banner1.jpg);">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                                    <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="fadeInDown">
                                            Welcome to
                                    </span>

                                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="fadeInUp">
                                            Pato Place
                                    </h2>

                                    <div class="wrap-btn-slide1 animated visible-false" data-appear="zoomIn">
                                            <!-- Button1 -->
                                            <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                                    Look Menu
                                            </a>
                                    </div>
                            </div>
                    </div>

                    <div class="item-slick1 item2-slick1" style="background-image: url(public/images/master-slides-02.jpg);">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                                    <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rollIn">
                                            Welcome to
                                    </span>

                                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="lightSpeedIn">
                                            Pato Place
                                    </h2>

                                    <div class="wrap-btn-slide1 animated visible-false" data-appear="slideInUp">
                                            <!-- Button1 -->
                                            <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                                    Look Menu
                                            </a>
                                    </div>
                            </div>
                    </div>

                    <div class="item-slick1 item3-slick1" style="background-image: url(public/images/master-slides-01.jpg);">
                            <div class="wrap-content-slide1 sizefull flex-col-c-m p-l-15 p-r-15 p-t-150 p-b-170">
                                    <span class="caption1-slide1 txt1 t-center animated visible-false m-b-15" data-appear="rotateInDownLeft">
                                            Welcome to
                                    </span>

                                    <h2 class="caption2-slide1 tit1 t-center animated visible-false m-b-37" data-appear="rotateInUpRight">
                                            Pato Place
                                    </h2>

                                    <div class="wrap-btn-slide1 animated visible-false" data-appear="rotateIn">
                                            <!-- Button1 -->
                                            <a href="menu.html" class="btn1 flex-c-m size1 txt3 trans-0-4">
                                                    Look Menu
                                            </a>
                                    </div>
                            </div>
                    </div>

            </div>

            <div class="wrap-slick1-dots"></div>
    </div>
</section>
<!--end slider1-->
<div class="container marginleftright-content container-fluid">
    
  <div class="row">
      
            
      
      <div class="col-sm-5 col-lg-3">
          
        
        <div class="row slideanim">
          <div class="col-sm-12 margin_bottom gt_box">
            <h4 class="header-title">Về Chúng Tôi</h4 >
            <div class="border-square">
                <div class="img_anima">
                    <img class="transition"  src="<?php echo base_url()?>public/images/siderbar/baner1.jpg" />
                </div>
                <a href=""><h3 class="title_child">Giới thiệu</h3></a>
                <p >
                    
                    Với năng suất cao và không ngừng mở rộng quy mô nhà xưởng, phối hợp với khả năng chủ động trong mọi..
                </p>
            </div>
            
          </div>
          <div class="col-sm-12 margin_bottom httt_box">
            <h4 class="header-title">Hổ Trợ Trực Tuyến</h4>
            <div class="border-square">
                <img src="<?php echo base_url()?>public/images/siderbar/icon_hotro.jpg" />
                <div class="httthl">
                    <a href="Tel:0976235038">0976 235 038</a>
                </div>
                <ul>
                    <li><i class="fas fa-phone" aria-hidden="true"></i>(+84) 97 623 50 38</li>
                    <li><i class="fas fa-envelope-square" aria-hidden="true"></i>satthepduchuy@gmail.com</li>  
                </ul>
            </div>
            
          </div>
          <div class="col-sm-12 margin_bottom ttnb_box">
            <h4 class="header-title">Tin Tức Nổi Bật</h4>
            <div class="border-square">
                <ul>
                    <li>
                        <a href="" >
                            <img src="<?php echo base_url()?>public/images/tintuc/mini/1111e-7315.jpg" alt="Thiết kế showroom trưng bày cho khách hàng mới." />
                            <p>Thiết kế showroom trưng bày cho khách hàng mới.</p>
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="<?php echo base_url()?>public/images/tintuc/mini/1111e-7315.jpg" alt="Thiết kế showroom trưng bày cho khách hàng mới." />
                            <p>Thiết kế showroom trưng bày cho khách hàng mới.</p>
                        </a>
                    </li>
                    <li>
                        <a href="" >
                            <img src="<?php echo base_url()?>public/images/tintuc/mini/1111e-7315.jpg" alt="Thiết kế showroom trưng bày cho khách hàng mới." />
                            <p>Thiết kế showroom trưng bày cho khách hàng mới.</p>
                        </a>
                    </li>
                </ul>
            </div>
            
          </div>
        </div>
      </div>
      <div class="col-sm-7 col-lg-9">
          <div class="row">
            <div class="col-sm-12 title-catalog">
                <h2 class="left">Sản Phẩm Mới</h2>
                <a class="right" href="">Xem Thêm</a>
                <div class="clear"></div>
            </div>
            <?php
            foreach ($san_pham as $item):?>
            <div class="col-md-6 col-lg-4 col-xl-3 product_item">
                <div class="pro_item_content">
                    <a href="<?php echo base_url()?>san-pham/<?php echo $item->SKU;?>.html" class="img_pro" title=""><img class="transition" src="<?php echo base_url()?>public/images/products/<?php echo $item->Images;?>" width="100%" /></a>
                
                    <a href="<?php echo base_url()?>san-pham/<?php echo $item->SKU;?>.html" title=""><?php echo $item->SKU;?></a>
                    <div class="detail_price">
                        <p>Gia: <span>5.300.350</span></p>
                        <a href="<?php echo base_url()?>san-pham/<?php echo $item->SKU;?>.html">
                            <div class="detai_click">Chi Tiet</div>
                        </a>
                    </div>
                </div>
            </div>
              <?php endforeach;?>
            
            
             
          </div>
      </div>
  </div>
</div>