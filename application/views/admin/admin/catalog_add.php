

<div class="container-fluid">

    <?php echo "<p style='color: #aa1111'>".validation_errors()."</p>"; ?>

    <?php
        foreach($_SESSION['message'] as $item){
            echo $item;
        }

    ?>

    <form method="post" enctype="multipart/form-data" action="them-moi-catalogue.html">
        <div class="form-group">
            <label for="usr">Tên Sản Phẩm(*): <?php echo "<p style='color: #aa1111'>".validation_errors("Name")."</p>"; ?></label>
            <input type="text" class="form-control" name="Name" id="usr" >
        </div>

        <div class="form-group">
            <label for="pwd">Loại Cha:</label>
            <select name="Parent" class="form-control">
                <?php
                    foreach ($loai_cha as $item){
                        echo '<option value="'.$item->ID.'">'.$item->Name.'</option>';
                    }
                ?>

            </select>
        </div>


        <button type="submit" name="add_product" class="btn btn-success">Thêm Mới</button>
    </form>

</div>








