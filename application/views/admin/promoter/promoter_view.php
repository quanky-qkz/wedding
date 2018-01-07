<section class="content-header">
                <h1>
                    User
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">User</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">User List</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="dataTable2" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($all_items as $item) : ?>
                                    <tr>
                                        <td><?=$item->id?></td>
                                        <td><?=$item->firstname?></td>
                                        <td><?=$item->surname?></td>
                                        <td><?=$item->email?></td>
                                        <td><a href="<?php echo site_url('promoter/change/' . $item->id);?>">Set password</a>  </td>
                                        <td><a href="<?php echo site_url('promoter/edit/' . $item->id);?>">Edit</a>  </td>
                                        <td><a class="deleteItem" href="<?php echo site_url('promoter/doRemove/' . $item->id);?>">Remove</a>  </td>
                                    </tr>
                                    <?php endforeach; ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div><!-- /.box-body -->
                    </div><!-- /.box -->
                </div>
            </div>

            <div class="row">
                <!-- left column -->

                <!-- right column -->



                <div class="col-md-8">
                    <!-- general form elements -->
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title">Add new promoter</h3>
                        </div><!-- /.box-header -->
                        <br/>
                        <div id="divUpload" style="display: none">
                              <form id="uploadAvatarForm" enctype="multipart/form-data" action="<?php echo site_url('upload/doUploadAvatar');?>" method="post" novalidate="novalidate">
                                  <p>
                                      <input type="file" name="file" id="fileUploadAvatar" class="sf">
                                  </p>
                              </form>
                          </div>
                        <!-- form start -->
                        <form role="form" id="form" method="post" action="<?php echo site_url('promoter/doAdd');?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter first name">
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter last name">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter password">
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email">
                                </div>
                                <div class="form-group">
                                    <label for="item-logo">Profile Picture</label>
                                    <div class="input-group">
                                      <div class="input-group-btn">
                                          <button type="button" class="btn btn-danger triggerUploadLogo">Choose file</button>
                                      </div><!-- /btn-group -->
                                      <input type="text" class="form-control" id="profileAvatar" name="profileAvatar" disabled >
                                      <input type="hidden" class="form-control" id="profileAvatarName" name="profileAvatarName"  >

                                    </div>
                                    <b class="uploading" style="display:none">Uploading...!</b>
                                        <img style="display:none" id="event_preview" class="event_preview" src="" width="150px" height="150px"/>
                                      <br/>
                                </div>


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <br/>
                        <div class="alert alert-success alert-dismissable notification" style="display: none">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Notice!</b> <span class="msg-success">Successfully added new promoter</span>
                        </div>
                        <div class="alert alert-danger alert-dismissable notification" style="display: none">
                            <i class="fa fa-ban"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Error!</b> <span class="msg-error">Please try again</span>
                        </div>

                    </div><!-- /.box -->



                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->