
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <?=$item->email?>
                <small>Edit Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('promoter');?>"> User</a></li>
                <li class="active">Edit user</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-8 col-md-push-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Change user password</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <br/>
                    <form role="form" id="changeForm" action="<?php echo site_url('promoter/doChangePassword/' . $item->id);?>">
                        <div class="box-body">
                                <div class="form-group">
                                    <label for="firstname">First name</label>
                                    <input type="text" class="form-control" name="firstname" id="firstname" placeholder="Enter first name" value="<?=$item->firstname?>" disabled/>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="Enter email" value="<?=$item->email?>" disabled />
                                </div>
                                <div class="form-group">
                                    <label for="password">New password</label>
                                    <input type="text" class="form-control" name="password" id="password" placeholder="Enter new password"  />
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
                        <b>Notice!</b> <span class="msgsuccess">Successfully changed password!</span>
                        <br> Click <a href="<?php echo site_url('user');?>">here</a> to view user list
                    </div>
                    <div class="alert alert-danger alert-dismissable notification" style="display: none">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Error!</b> <span class="msgsuccess">Please try again</span>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (right) -->

        </section><!-- /.content