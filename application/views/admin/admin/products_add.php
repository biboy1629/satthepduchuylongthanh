
<script src="<?php echo base_url("public/ckeditor")?>/ckeditor.js"></script>
<script src="<?php echo base_url("public/ckfinder")?>/ckfinder.js"></script>
<div class="container-fluid">

    <?php echo "<p style='color: #aa1111'>".validation_errors()."</p>"; ?>

    <?php
        foreach($_SESSION['message'] as $item){
            echo $item;
        }

    ?>

    <form method="post" enctype="multipart/form-data" action="them-moi-san-pham.html">
        <div class="form-group">
            <label for="usr">Tên Sản Phẩm(*): <?php echo "<p style='color: #aa1111'>".validation_errors("Name")."</p>"; ?></label>
            <input type="text" class="form-control" name="Name" id="usr" >
        </div>
        <div class="form-group">
            <label for="usr">Mã Sản Phẩm(*): <?php echo "<p style='color: #aa1111'>".validation_errors("SKU")."</p>"; ?></label>
            <input type="text" class="form-control" name="SKU" id="usr" >
        </div>
        <div class="form-group">
            <label for="pwd">Category(*):</label>
            <select name="Loai_san_pham"  class="form-control col-md-3" id="danh_muc">
                <?php
                foreach ($loai_san_pham as $item){

                    echo "<option value=".$item->ID.">".$item->Name."</option>";
               };?>
            </select>


        </div>
        <div class="form-group sle_con" style="display: none;">
            <label style="color: #aa1111" for="pwd">Category con(*):</label>
            <select name="Loai_san_pham_con"  class="form-control col-md-3" id="danh_muc_con" >

            </select>
        </div>

        <div class="form-group">
            <label for="pwd">Loại Giá(*):</label>
            <select name="selec_gia"  class="form-control col-md-3" id="selec_gia">
                <option value="1">Giá Cụ Thể</option>
                <option value="2">Giá Liên Hệ</option>
            </select>

        </div>
        <div class="form-group">
            <label for="pwd">Price:</label>
            <input type="text" name="Price" class="form-control" id="gia_cu_the" placeholder="0.00">
        </div>
        <div class="form-group">
            <label for="comment">Mô Tả:</label>
            <textarea class="form-control" rows="5" name="Description" id="comment"></textarea>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Chọn Hình Ảnh(*):</label>
            <input type="file" name="Images"  class="form-control-file" id="exampleFormControlFile1">
        </div>
        <button type="submit" name="add_product" class="btn btn-success">Thêm Mới</button>
    </form>

</div>


<script>
    var editor = CKEDITOR.replace( 'Description', {
        // filebrowserBrowseUrl:'public/ckfinder/ckfinder.html',
        // filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
        filebrowserWindowWidth: '1000',
        filebrowserWindowHeight: '700'
    } );
    CKFinder.setupCKEditor(editor);


</script>





