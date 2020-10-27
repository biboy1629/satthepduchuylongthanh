<!doctype html>
<html class="no-js h-100" lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Shards Dashboard Lite - Free Bootstrap Admin Template – DesignRevision</title>
    <meta name="description" content="A high-quality &amp; free Bootstrap admin dashboard template pack that comes with lots of templates and components.">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        
    <link rel="stylesheet" href="<?php echo public_url();?>admin/css/bootstrap.min.css"  crossorigin="anonymous">
    <link rel="stylesheet" id="main-stylesheet" data-version="1.1.0" href="<?php echo public_url();?>admin/css/shards-dashboards.1.1.0.min.css">
    <link rel="stylesheet" href="<?php echo public_url();?>admin/css/extras.1.1.0.min.css">
    <script async defer src="<?php echo public_url();?>admin/js/buttons.js"></script>
  </head>
  <body class="h-100">
      
      <div class="main-content-container container-fluid px-4">
            <!-- Page Header -->
            <div class="page-header row no-gutters py-4 mb-3 border-bottom">
              <div class="col-12 col-sm-4 text-center text-sm-left mb-0">
                <span class="text-uppercase page-subtitle">Overview</span>
                <h3 class="page-title">Đăng Nhập Quản Trị Viên</h3>
              </div>
            </div>
            <!-- End Page Header -->
            
            <div class="row">
              <div class="col-lg-12 mb-12">
                <div class="card card-small mb-4">
                  <div class="card-header border-bottom">
                    <h6 class="m-0">Đăng Nhập</h6>
                  </div>
                  <ul class="list-group list-group-flush">
                    
                    <li class="list-group-item p-3">
                      <div class="row">
                        
                        <div class="col-sm-12 col-md-12">
                          
                            <form id="form" class="form" enctype="multipart/form-data" method="post" action="<?php echo admin_url('login.html')?>">
                                <div class="form-row">
                                  <div class="form-group col-md-12">
                                      <span class="text-muted d-block mb-2">Username:</span>
                                      <input type="text" class="form-control" id="validationServer01" onfocus="this.value=''"  required="" name="username">

                                  </div>

                                </div>
                                <div class="form-group">
                                    <span class="text-muted d-block mb-2">Password:</span>
                                    <input type="password" class="form-control" id="validationServer03" onfocus="this.value=''"  required="" name="password">

                                </div>
                                <div class="form-group text-center">
                                    <div class="form-group col-md-12">
                                        <input type="submit" class="btn btn-success" id="btn_login" value="Đăng Nhập" >
                                    </div>
                                </div>
                          </form>
                        </div>
                      </div>
                    </li>
                  </ul>
                </div>
              </div>
         
            </div>
          </div>
  </body>


