<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/quill/1.3.6/quill.snow.css"> </head>
<div class="alert alert-warning  alert-warning fade <?php echo (isset($alert_message[0])? "show": " ");?>   mb-0" role="alert">    
    <i class="fa fa-info mx-2"></i>
    <strong>
        <?php echo $alert_message[0]; ?>
    </strong> 
</div>
<div class="alert alert-success  alert-success fade <?php echo (isset($alert_message[1])? "show": " ");?>   mb-0" role="alert">    
    <i class="fa fa-info mx-2"></i>
    <strong>
        <?php echo $alert_message[1]; ?>
    </strong> 
</div>
<div class="page-header row no-gutters py-4">
    <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
      <span class="text-uppercase page-subtitle">Blog Posts</span>
      <h3 class="page-title">Add New Post</h3>
    </div>
</div>
<form id="form" class="form" enctype="multipart/form-data" method="post" action="them-moi-user.html">
<div class="row">
    
        <div class="col-lg-9 col-md-12">
            <!-- Add New Post Form -->
            <div class="card card-small mb-3">
              <div class="card-body">
                  <div class="form-group">
                      <label for="sel1">Name:</label>
                      <input class="form-control form-control-lg mb-3 <?php echo (form_error('name') ? "is-invalid": "")?>" type="text" placeholder="" name="name" value="<?php echo set_value('name');?>">
                      <div class="invalid-feedback"><?php echo form_error('name');?></div>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Username:</label>
                      <input class="form-control form-control-lg mb-3 <?php echo (form_error('username') ? "is-invalid": "")?>" type="text" placeholder="" name="username" value="<?php echo set_value('username');?>">
                      <div class="invalid-feedback"><?php echo form_error('username');?></div>
                  </div>
                  <div class="form-group">
                      <label for="sel1">Password:</label>
                      <input class="form-control form-control-lg mb-3 <?php echo (form_error('password') ? "is-invalid": "")?>" type="password" placeholder="" name="password">
                      <div class="invalid-feedback"><?php echo form_error('password');?></div>
                      
                  </div>
                  <div class="form-group">
                      <label for="sel1">Nhập lại password:</label>
                      <input class="form-control form-control-lg mb-3 <?php echo (form_error('pre_password') ? "is-invalid": "")?>" type="password" placeholder="" name="pre_password">
                      <div class="invalid-feedback"><?php echo form_error('pre_password');?></div>
                  </div>
                  <div class="form-group">
                    <label for="sel1">Select Group:</label>
                    <select class="form-control <?php echo (form_error('admin_group_id') ? "is-invalid": "")?> " id="sel1" name="admin_group_id">
                        <option value="1">Admin</option>
                        <option value="2">Nhân Viên</option>
                        <option value="3">Khách Hàng</option>
                    </select>
                    <div class="invalid-feedback"><?php echo form_error('admin_group_id');?></div>
                  </div>
              </div>
            </div>
            <!-- / Add New Post Form -->
        </div>
        <div class="col-lg-3 col-md-12">
                <!-- Post Overview -->
                <div class="card card-small mb-3">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Actions</h6>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item p-3">
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">flag</i>
                          <strong class="mr-1">Status:</strong> Draft
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">visibility</i>
                          <strong class="mr-1">Visibility:</strong>
                          <strong class="text-success">Public</strong>
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex mb-2">
                          <i class="material-icons mr-1">calendar_today</i>
                          <strong class="mr-1">Schedule:</strong> Now
                          <a class="ml-auto" href="#">Edit</a>
                        </span>
                        <span class="d-flex">
                          <i class="material-icons mr-1">score</i>
                          <strong class="mr-1">Readability:</strong>
                          <strong class="text-warning">Ok</strong>
                        </span>
                      </li>
                      <li class="list-group-item d-flex px-3">
                          <button class="btn btn-sm btn-accent ml-auto" type="submit">
                          <i class="material-icons">file_copy</i>Lưu</button>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Post Overview -->
                <!-- Post Overview -->
                <div class="card card-small mb-3">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Categories</h6>
                  </div>
                  <div class="card-body p-0">
                    <ul class="list-group list-group-flush">
                      <li class="list-group-item px-3 pb-2">
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category1" checked="">
                          <label class="custom-control-label" for="category1">Uncategorized</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category2" checked="">
                          <label class="custom-control-label" for="category2">Design</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category3">
                          <label class="custom-control-label" for="category3">Development</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category4">
                          <label class="custom-control-label" for="category4">Writing</label>
                        </div>
                        <div class="custom-control custom-checkbox mb-1">
                          <input type="checkbox" class="custom-control-input" id="category5">
                          <label class="custom-control-label" for="category5">Books</label>
                        </div>
                      </li>
                      <li class="list-group-item d-flex px-3">
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="New category" aria-label="Add new category" aria-describedby="basic-addon2">
                          <div class="input-group-append">
                            <button class="btn btn-white px-2" type="button">
                              <i class="material-icons">add</i>
                            </button>
                          </div>
                        </div>
                      </li>
                    </ul>
                  </div>
                </div>
                <!-- / Post Overview -->
              </div>
    
        
  
    </div>
</form>
<script src="<?php echo public_url();?>admin/scripts/quill.min.js"></script>
<script src="<?php echo public_url();?>adminscripts/app/app-blog-new-post.1.1.0.js"></script>