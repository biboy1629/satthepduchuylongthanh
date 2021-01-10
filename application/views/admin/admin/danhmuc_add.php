

<div class="container-fluid">

    <?php echo "<p style='color: #aa1111'>".validation_errors()."</p>"; ?>

    <?php
    foreach($_SESSION['message'] as $item){
        echo $item;
    }

    ?>

    <form method="post" enctype="multipart/form-data" action="them-moi-catalogue.html">
        <!--        <div class="form-group">-->
        <!--            <label for="pwd">Loại Cha:</label>-->
        <!--            <select name="Parent" class="form-control catalog_parent">-->
        <!--                --><?php
        //                foreach ($loai_cha as $item){
        //                    echo '<option value="'.$item->ID.'">'.$item->Name.'</option>';
        //                }
        //                ?>
        <!---->
        <!--            </select>-->
        <!--        </div>-->
        <div class="form-group form-catalog-childs">
            <label for="pwd">List Danh Mục Con</label>
            <select name="parent" class="form-control">
                <option value="1">None</option>
                <?php
                foreach ($loai_cha as $item){
                    echo '<option value="'.$item->ID.'">'.$item->Name.'</option>';
                }
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="usr">Danh mục mới: <?php echo "<p style='color: #aa1111'>".validation_errors("Name")."</p>"; ?></label>
            <input type="text" class="form-control" name="Name" id="txt-danh-muc-moi" >
            <span id="show_err_danhmucmoi"></span>
        </div>
        <div class="form-group">
            <label for="exampleFormControlFile1">Chọn Hình Ảnh(*):</label>
            <input type="file" name="Hinh"  class="form-control-file" id="exampleFormControlFile1">
        </div>




        <button type="submit" name="add_product" class="btn btn-success">Thêm Mới</button>
    </form>

</div>








