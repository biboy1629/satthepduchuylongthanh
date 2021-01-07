

<div class="container-fluid">

    <?php echo "<p style='color: #aa1111'>".validation_errors()."</p>"; ?>

    <?php
    foreach($_SESSION['message'] as $item){
        echo $item;
    }

    ?>

    <form method="post" enctype="multipart/form-data" action="them-moi-catalogue.html">
        <div class="form-group">
            <label for="pwd">Loại CATALOGUE:</label>
            <select name="loai_cat" class="form-control" id="loai_cat">
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
                <option value="1">None</option>

            </select>
        </div>
        <div class="form-group">
            <label for="usr">Danh mục mới: <?php echo "<p style='color: #aa1111'>".validation_errors("Name")."</p>"; ?></label>
            <input type="text" class="form-control" name="Name" id="txt-danh-muc-moi" >
            <span id="show_err_danhmucmoi"></span>
        </div>




        <button type="submit" name="add_product" class="btn btn-success">Thêm Mới</button>
    </form>

</div>








