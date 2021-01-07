
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below. For more information about DataTables, please visit the <a target="_blank" href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th class="sorting_desc">ID</th>
                        <th>SKU</th>
                        <th>Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Giá</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>SKU</th>
                        <th>Tên</th>
                        <th>Hình Ảnh</th>
                        <th>Giá</th>
                        <th>Loại Sản Phẩm</th>
                        <th>Actions</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                        foreach ($data as $item){
//                            var_dump($item);die;
                    ?>
                    <tr>
                        <td><?= $item->ID;?></td>
                        <td><a class="p-2" href="sua-san-pham/<?= $item->ID;?>"><?= $item->SKU;?></a></td>
                        <td><?= $item->Name;?></td>
                        <td><?= $item->Images;?></td>
                        <td><?= $item->Price;?></td>
                        <td><?= $item->Loai_san_pham;?></td>
                        <td>
                            <a class="p-2" href="sua-san-pham/<?= $item->ID;?>"><i class="fas fa-edit"></i></a>
                            <a class="p-2 btn-xoa" href="javascript:" maso="<?= $item->ID; ?>" link="<?= base_url('admin/sanpham/xoa')?>" link_base="<?= 'admin/danh-sach-san-pham.html'; ?>" ><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    <?php }?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
