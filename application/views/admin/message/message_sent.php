<section class="content-header">
    <h1>
        Sent
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">Message Sent</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Sent messages</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <table id="dataTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Receiver</th>
                                <th>Email</th>
                                <th>Message</th>
                                <th>Event name</th>
                                <th>Time</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>

                        <?php
                        foreach ($all_inbox as $item) : ?>

                            <tr>
                                <td><?=$item->id?></td>
                                <td><?=$item->firstname?></td>
                                <td><?=$item->email?></td>
                                <td><?=$item->message?></td>
                                <td><?=$item->eventname?></td>
                                <td><?=$item->created?></td>
                                <td><a class="deleteItem" href="<?php echo site_url('message/doRemove/' . $item->id);?>">Remove</a>  </td>
                            </tr>
                          <?php endforeach;?>


                    </tbody>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>User</th>
                            <th>Email</th>
                            <th>Message</th>
                            <th>Event name</th>
                            <th>Time</th>
                            <th>Action</th>
                        </tr>
                    </tfoot>
                </table>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
    </div>
</div>


        </section><!-- /.content -->