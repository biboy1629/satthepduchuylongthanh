<link href="http://www.jqueryscript.net/css/jquerysctipttop.css" rel="stylesheet" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/reset.css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url()?>public/css/jquery-picZoomer.css">
<style type="text/css">
    .piclist{
        margin-top: 30px;
    }
    .piclist li{
        display: inline-block;
        width: 50px;
        height: 50px;
    }
    .piclist li img{
        width: 100%;
        height: auto;
    }

    /* custom style */
    .picZoomer-pic-wp,
    .picZoomer-zoom-wp{
        border: 1px solid #fff;
    }
    </style>
    <!--plugin comment-->
    <div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0" nonce="0ZQaxJxn"></script>

<!--end plugin comment-->
<div class="container marginleftright-content container-fluid">
    
  <div class="row">
      <div class="col-sm-5 col-lg-3">
          
        
        <div class="row slideanim">
          <div class="col-sm-12 margin_bottom gt_box">
            <h4 class="header-title">Về Chúng Tôi</h4>
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
<!--          <div class="col-sm-12 margin_bottom ttnb_box">-->
<!--            <h4 class="header-title">Tin Tức Nổi Bật</h4>-->
<!--            <div class="border-square">-->
<!--                <ul>-->
<!--                    <li>-->
<!--                        <a href="" >-->
<!--                            <img src="--><?php //echo base_url()?><!--public/images/tintuc/mini/1111e-7315.jpg" alt="Thiết kế showroom trưng bày cho khách hàng mới." />-->
<!--                            <p>Thiết kế showroom trưng bày cho khách hàng mới.</p>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="" >-->
<!--                            <img src="--><?php //echo base_url()?><!--public/images/tintuc/mini/1111e-7315.jpg" alt="Thiết kế showroom trưng bày cho khách hàng mới." />-->
<!--                            <p>Thiết kế showroom trưng bày cho khách hàng mới.</p>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                    <li>-->
<!--                        <a href="" >-->
<!--                            <img src="--><?php //echo base_url()?><!--public/images/tintuc/mini/1111e-7315.jpg" alt="Thiết kế showroom trưng bày cho khách hàng mới." />-->
<!--                            <p>Thiết kế showroom trưng bày cho khách hàng mới.</p>-->
<!--                        </a>-->
<!--                    </li>-->
<!--                </ul>-->
<!--            </div>-->
<!--            -->
<!--          </div>-->
        </div>
      </div>
      <div class="col-sm-7 col-lg-9">
          <div class="row">
            <ul class="breadcrumb">  
                    <li class="breadcrumb-item">
                            <a href="." itemprop="url" title="trang chủ"><i class="fas fa-home"></i></a>
                    </li>

                    <li class="breadcrumb-item">   
                        <a href="san-pham/" itemprop="url" title="Sản phẩm"><span itemprop="title">Sản phẩm</span></a>
                    </li>

                   
                    <li class="breadcrumb-item">
                            <a title="LKBC 09" itemprop="url" href="san-pham/<?php echo $san_pham->SKU;?>.html"><span itemprop="title"><?php echo $san_pham->Name;?></span></a>
                    </li>
            </ul>
            <div class="content_product">
                <div class="des-product col-md-12 col-lg-5">
                    <div class="picZoomer">
                        <img src="<?php echo base_url()?>uploads/sanpham/<?php echo $san_pham->Images;?>" height="320" width="320" alt="">
                    </div>

                    <ul class="piclist">
                        <?php foreach($list_thumb as $item):?>
                            <li><img src="<?php echo base_url()?>uploads/sanpham/thumbnail/<?php echo $item->Name;?>" alt=""></li>
                        <?php endforeach;?>
                        
                    </ul>
                </div>
                <ul class="des-product col-md-12 col-lg-7">
                    <h1><?php echo $san_pham->Name;?></h1>
                   
                    <li class="li_pr">
                        Mã: <span class="price"><?php echo $san_pham->SKU;?></span>
                    </li>
                    <li class="li_pr">
                        Giá: <span class="price">
                            <?= $san_pham->Price;?>
                        </span>
                    </li> 
                    <li class="li_pr">Hotline: <span class="price">0888.444.239</span></li>
                    
                </ul>
                <div class="clear"></div>
            </div>
            <div class="container_product">
                <div class="tab_wrapper">
                  <nav>
                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                      <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Thông Tin Sản Phẩm</a>
                      <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Đánh Giá</a>
                      
                    </div>
                  </nav>
                  <div class="tab-content" id="nav-tabContent">
                      <div class="tab-pane fade show active des_sapham" id="nav-home " role="tabpanel" aria-labelledby="nav-home-tab">
                          <?php echo $san_pham->Description;?>
                      </div>
                    <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                        
                        <div class="fb-comments" data-href="https://www.facebook.com/quoc.pham.5494360/docs/plugins/comments#configurator" data-numposts="5" data-width=""></div>
                    </div>
                    
                  </div>
                  <div class="clear"></div>
                  
                   
                </div>
            </div>
            <div class="clear"></div>
            <div class="col-sm-12 title-catalog">
                <h2 class="left">Sản Phẩm Cùng Loại</h2>
                <a class="right" href="">Xem Thêm</a>
                <div class="clear"></div>
            </div>
            
            <div class="col-sm2 col-md-6 col-lg-4 col-xl-3 product_item">
                <div class="pro_item_content">
                    <a class="img_pro" title=""><img class="transition" src="<?php echo base_url()?>public/images/products/lkbc04-1142.jpg" width="100%" /></a>
                
                    <a href="" title="">ABCE</a>
                    <div class="detail_price">
                        <p>Gia: <span>5.300.350</span></p>
                        <a href="">
                            <div class="detai_click">Chi Tiet</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm2 col-md-6 col-lg-4 col-xl-3 product_item">
                <div class="pro_item_content">
                    <a class="img_" title=""><img class="transition" src="<?php echo base_url()?>public/images/products/lkbc04-1142.jpg" /></a>
                
                    <a href="" title="">ABCE</a>
                    <div class="detail_price">
                        <p>Gia: <span>5.300.350</span></p>
                        <a href="">
                            <div class="detai_click">Chi Tiet</div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-sm2 col-md-6 col-lg-4 col-xl-3 product_item">
                <div class="pro_item_content">
                    <a class="img_" title=""><img class="transition" src="<?php echo base_url()?>public/images/products/lkbc04-1142.jpg" /></a>
                
                    <a href="" title="">ABCE</a>
                    <div class="detail_price">
                        <p>Gia: <span>5.300.350</span></p>
                        <a href="">
                            <div class="detai_click">Chi Tiet</div>
                        </a>
                    </div>
                </div>
                
            </div>
            <div class="col-sm2 col-md-6 col-lg-4 col-xl-3 product_item">
                <div class="pro_item_content">
                    <a class="img_" title=""><img class="transition" src="<?php echo base_url()?>public/images/products/lkbc04-1142.jpg"/></a>
                
                    <a href="" title="">ABCE</a>
                    <div class="detail_price">
                        <p>Gia: <span>5.300.350</span></p>
                        <a href="">
                            <div class="detai_click">Chi Tiet</div>
                        </a>
                    </div>
                </div>
            </div>
              <div class="col-sm2 col-md-6 col-lg-4 col-xl-3 product_item">
                <div class="pro_item_content">
                    <a class="transition" title="lkbc04-1142"><img class="transition" src="<?php echo base_url()?>public/images/products/lkbc04-1142.jpg" /></a>
                
                    <a href="" title="ABCE">ABCE</a>
                    <div class="detail_price">
                        <p>Gia: <span>5.300.350</span></p>
                        <a href="">
                            <div class="detai_click">Chi Tiet</div>
                        </a>
                    </div>
                </div>
            </div>
            
            
             
          </div>
      </div>
  </div>
</div>

