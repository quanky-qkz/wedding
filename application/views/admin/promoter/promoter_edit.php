
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <?=$item->email?>
                <small>Edit Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('promoter');?>"> Promoter</a></li>
                <li class="active">Edit promoter</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-8 col-md-push-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Edit promoter</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <br/>
                    <div id="divUpload" style="display: none">
                              <form id="uploadAvatarForm" enctype="multipart/form-data" action="<?php echo site_url('upload/doUploadAvatar');?>" method="post" novalidate="novalidate">
                                  <p>
                                      <input type="file" name="file" id="fileUploadAvatar" class="sf">
                                  </p>
                              </form>
                          </div>
                    <form role="form" id="editForm" action="<?php echo site_url('promoter/doEdit/' . $item->id);?>">
                        <div class="box-body">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter first name" value="<?=$item->firstname?>" />
                                </div>

                                <div class="form-group">
                                    <label for="lastname">Last name</label>
                                    <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Enter last name" value="<?=$item->surname?>" />
                                </div>

                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="<?=$item->email?>" />
                                </div>
                                <div class="form-group">
                                    <label for="item-logo">Profile Picture</label>
                                    <div class="input-group">
                                      <div class="input-group-btn">
                                          <button type="button" class="btn btn-danger triggerUploadLogo">Choose file</button>
                                      </div><!-- /btn-group -->
                                      <input type="text" class="form-control" id="profileAvatar" name="profileAvatar" disabled value="<?=$item->profile_pic?>" />
                                      <input type="hidden" class="form-control" id="profileAvatarName" name="profileAvatarName"   value="<?=$item->profile_pic?>" />

                                    </div>
                                    <b class="uploading" style="display:none">Uploading...!</b>
                                        <img <?php if ($item->profile_pic == ""):?> style="display:none" <?php endif;?> id="event_preview" class="event_preview" src="<?=$item->profile_pic?>" width="150px" height="150px"/>
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
                        <b>Notice!</b> <span class="msgsuccess">Successfully edited item!</span>
                        <br> Click <a href="<?php echo site_url('promoter');?>">here</a> to view promoter list
                    </div>
                    <div class="alert alert-danger alert-dismissable notification" style="display: none">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Error!</b> <span class="msgsuccess">Please try again</span>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (right) -->

        </section><!-- /.content