<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bài Viết CATALOGUE</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Parent</th>
                        <th>Action</th>
                    </tr>
                    </tfoot>
                    <tbody>
                    <?php
                    foreach($data as $item){
                        ?>
                        <tr>
                            <td><?= $item->ID?></td>
                            <td><a class="p-2" href="chinh-sua-catalogue/<?= $item->ID?>"><?= $item->Name?></a></td>
                            <td><?= $item->Parent?></td>
                            <td>
                                <a class="p-2" href="chinh-sua-catalogue/<?= $item->ID?>"><i class="fas fa-edit"></i></a>
                                <a class="p-2 btn-xoa" href="javascript:" maso="<?= $item->ID; ?>" link="<?= base_url('admin/catalogue/xoa')?>" link_base="<?= 'admin/danh-sach-catalogue.html'; ?>" ><i class="fas fa-trash-alt"></i></a>

                            </td>
                        </tr>

                    <?php }?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>