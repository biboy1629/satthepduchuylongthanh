<?php
    $url = explode('/' ,current_url());
    $last = end($url);
    $CI =& get_instance();
    $CI->load->model('loaisanpham_model');
?>
<!--end slider1-->
<div class="container marginleftright-content container-fluid">

    <div class="row">




        <div class="col-sm-12">
            <div class="row">

                <div class="col-sm-12 title-catalog">
                    <h2 class="left">CATALOGUE</h2>

                    <div class="clear"></div>
                </div>
                <?php
//                var_dump($list_catalog);
                foreach ($list_catalog as $item){
                    // get slug parent
                    $slug = $CI->loaisanpham_model->getSlug($item->Parent);
                ?>

                    <div class="col-sm-3 product_item">
                        <div class="pro_item_content">
                            <a href="catalogue/<?= $slug->Slug.'/'.$item->Slug.'.html';?>" class="transition" title="<?= $item->Name;?>"><img class="transition" src="<?php echo base_url()?>uploads/catalogue/<?= $item->Hinh;?>" width="100%" /></a>

                            <a class="catalog-name" href="catalogue/<?= $slug->Slug.'/'.$item->Slug.'.html';?>" title="<?= $item->Name;?>"><?= $item->Name?></a>
                            <div class="catalog-title">
                                <a>
                                    Chiết Khấu: Liên Hệ
                                </a>

                            </div>
                        </div>
                    </div>
                <?php }?>
            </div>
        </div>
    </div>
</div>