

<div class="container-fluid">

    <?php echo "<p style='color: #aa1111'>".validation_errors()."</p>"; ?>

    <?php
    foreach($_SESSION['message'] as $item){
        echo $item;
    }

    ?>
    <h1 class="h3 mb-2 text-gray-800">Thêm mới sản phẩm CATALOGUE</h1>
    <form method="post" enctype="multipart/form-data" action="them-moi-san-pham_catalogue.html">
        <div class="form-group">
            <label for="pwd">Loại CATALOGUE:</label>
            <select name="loai_cat" class="form-control loai_cat_add" id="loai_cat">
                <?php
                foreach ($loai_cat as $item){
                    echo '<option value="'.$item->ID.'">'.$item->Name.'</option>';
                }
                ?>

            </select>
        </div>
        <div class="form-group">
            <label for="pwd">Thương Hiệu:</label>
            <select name="nhan_hieu" class="form-control" id="nhan_hieu">


            </select>
        </div>
        <div class="form-group">
            <label for="usr">Tên Sản phẩm Catalogue mới: <?php echo "<p style='color: #aa1111'>".validation_errors("Name")."</p>"; ?></label>
            <input type="text" class="form-control" name="Name" id="txt-danh-muc-moi" >
            <span id="show_err_danhmucmoi"></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Hình ảnh Catalogue(*):</label>
            <input type="file" name="Hinh"  class="form-control-file" id="exampleFormControlFile1">
        </div>




        <button type="submit" name="add_product" class="btn btn-success">Thêm Mới</button>
    </form>

</div>








