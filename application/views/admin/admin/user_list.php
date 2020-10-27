<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Danh Sach ADMIN</span>
      <h3 class="page-title">Danh Sách User</h3>
    </div>
    <div class="col-12 col-sm-8 text-center text-sm-right mb-0">
        <a href="<?php echo admin_url('them-moi-user.html')?>" class="btn btn-accent">Thêm Mới</a>
    </div>
</div>
<div class="row">
              <div class="col">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h5 class="m-0">Danh sách user</h5>
                  </div>
                  <div class="card-body p-0 pb-3 text-center">
                    <table class="table mb-0">
                      <thead class="bg-light">
                        <tr>
                            <th scope="col" class="border-0">
                                 <fieldset>
                            <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="fcd">
                              <label class="custom-control-label" for="fcd"></label>
                            </div>
                            
                            
                          </fieldset>
                            </th>
                          <th scope="col" class="border-0">#</th>
                          <th scope="col" class="border-0">Username</th>
                          <th scope="col" class="border-0">Name</th>
                          <th scope="col" class="border-0">Action</th>
                          
                        </tr>
                      </thead>
                      <tbody>
                          <?php 
                          $i = 1;
                            foreach($data as $row):
                                
                                ?>
                        <tr>
                          <td>
                             <fieldset>
                            <div class="custom-control custom-checkbox mb-1">
                              <input type="checkbox" class="custom-control-input" id="<?php echo $row->ID;?>">
                              <label class="custom-control-label" for="<?php echo $row->ID;?>"></label>
                            </div>
                            
                          </fieldset>
                          </td>
                          <td><?php echo $i;?></td>
                          <td><?php echo $row->username;?></td>
                          <td><?php echo $row->name;?></td>
                          <td>
                              <button type="submit" class="btn btn-success">Sửa</button>
                              <button type="submit" class="btn btn-warning">Xóa</button>
                          </td>
                        </tr>
                        <?php $i++; endforeach;?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>