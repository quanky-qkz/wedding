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
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($all_items as $item) : ?>
                                    <tr>
                                        <td><?=$item->id?></td>
                                        <td><?=$item->firstname?></td>
                                        <td><?=$item->surname?></td>
                                        <td><?=$item->email?></td>
                                        <td><a href="<?php echo site_url('user/change/' . $item->id);?>">Set password</a>  </td>
                                        <td><?=userStatus($item->status);?></td>
                                        <td><a href="<?php echo site_url('user/edit/' . $item->id);?>">Edit</a>  </td>
                                        <td><a class="deleteItem" href="<?php echo site_url('user/doRemove/' . $item->id);?>">Remove</a>  </td>

                                    <?php endforeach; ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                            <th>Firstname</th>
                                            <th>Surname</th>
                                            <th>Email</th>
                                            <th>Password</th>
                                            <th>Status</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
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




            </div>   <!-- /.row -->
        </section><!-- /.content -->