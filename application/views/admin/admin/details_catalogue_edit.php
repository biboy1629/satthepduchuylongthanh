

<div class="container-fluid">

    <?php echo "<p style='color: #aa1111'>".validation_errors()."</p>"; ?>

    <?php

    foreach($_SESSION['message'] as $item){
        echo $item;
    }
    ?>
    <h1 class="h3 mb-2 text-gray-800">Cập nhật sản phẩm Catalogue</h1>
    <form method="post" enctype="multipart/form-data" action="chinh-sua-san-pham_catalogue/<?= $data->ID;?>">
        <div class="form-group">
            <label for="usr">Tên Loại con(*): <?php echo "<p style='color: #aa1111'>".validation_errors("Name")."</p>"; ?></label>
            <input type="text" class="form-control" name="Name" id="usr" value="<?= $data->Name;?>" >
        </div>

        <div class="form-group">
            <label for="pwd">Loại Cha:</label>
            <select name="loai_cat" class="form-control" id="loai_cat">
                <?php
                foreach ($loai_cat as $item){


                    if($loai_catalogue == $item->ID){
                        echo '<option selected value="'.$item->ID.'">'.$item->Name.'</option>';
                    }else{
                        echo '<option value="'.$item->ID.'">'.$item->Name.'</option>';
                    }

                }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="pwd">Loại Cha Cấp 2:</label>
            <select name="nhan_hieu" class="form-control" id="nhan_hieu">

                <?php

                foreach ($list_loai_cha as $item){

                    if($data->Parent == $item->ID){
                        echo '<option selected value="'.$item->ID.'">'.$item->Name.'</option>';
                    }else{
                        echo '<option value="'.$item->ID.'">'.$item->Name.'</option>';
                    }


                }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Chọn Hình Ảnh(*):</label>
            <input type="file" name="Hinh"  class="form-control-file" id="exampleFormControlFile1">
            <input type="text" hidden name="Hinh" value="<?= $data->Hinh; ?>"   />
            <img width="200px" src="<?= base_url('/uploads/catalogue/'.$data->Hinh);?>">
        </div>


        <button type="submit" name="edit_catalog" class="btn btn-success">Cập Nhật</button>
    </form>

</div>








