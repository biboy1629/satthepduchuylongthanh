
<!--end slider1-->
<div class="container marginleftright-content container-fluid">
    
  <div class="row">
      
            
      
      <div class="col-sm-3">
          
        
        <div class="row slideanim">
          <div class="col-sm-12 margin_bottom">
            <h4 class="header-title">Về Chúng Tôi</h4>
            <p class="border-square">Lorem ipsum dolor sit amet..</p>
          </div>
          <div class="col-sm-12 margin_bottom">
            <h4 class="header-title">Hổ Trợ Trực Tuyến</h4>
            <p class="border-square">Lorem ipsum dolor sit amet..</p>
          </div>
          <div class="col-sm-12 margin_bottom">
            <h4 class="header-title">Tin Tức Nổi Bật</h4>
            <p class="border-square">Lorem ipsum dolor sit amet..</p>
          </div>
        </div>
      </div>
      <div class="col-sm-9">
          <div class="row">
            <div class="col-sm-12 title-catalog">
                <h2 class="left">Sản Phẩm</h2>
                <a class="right" href="">Xem Thêm</a>
                <div class="clear"></div>
            </div>
          </div>
          <?php
          foreach ($san_pham as $item):?>
            <div class="col-sm-3 product_item">
                <div class="pro_item_content">
                    <a href="<?php echo base_url()?>san-pham/<?php echo $item->SKU;?>.html" class="img_pro" title=""><img src="<?php echo base_url()?>uploads/sanpham/<?php echo $item->Images;?>"></a>

                    <a href="<?php echo base_url()?>san-pham/<?php echo $item->SKU;?>.html" title=""><?php echo $item->SKU;?></a>
                    <div class="detail_price">
                        <p>Gia: <span><?php echo $item->Price;?></span></p>
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