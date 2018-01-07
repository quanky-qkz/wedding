<section class="content-header">
    <h1>
        Sent
        <small>Control panel</small>
    </h1>
    <ol class="breadcrumb">
        <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>

        <li class="active">New message</li>
    </ol>
</section>

<!-- Main content -->
<section class="content">
    <div class="row">
        <div class="col-xs-12">


            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">New message on event</h3>
                </div><!-- /.box-header -->
                <div class="box-body table-responsive">
                    <div class="row">
                        <div class="col-md-8">
                            <!-- general form elements -->
                            <div class="box box-primary">
                                <div class="box-header">
                                    <h3 class="box-title"><?php echo $event->event_name; ?></h3>
                                </div><!-- /.box-header -->
                                <br/>
                                <div class="alert alert-success alert-dismissable notification" style="display: none">
                                    <i class="fa fa-check"></i>
                                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                    <b>Notice!</b> <span class="msgsuccess">Your message has been sent!</span>
                                </div>
                                <!-- form start -->
                                <form role="form" id="form_send" method="post" action="<?php echo site_url('event/doSendMessage/' . $event->id);?>">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="receiver">User</label>
                                            <select class="form-control" id="receiver"  name ="receiver">
                                                <?php foreach ($all_user as $user) : ?>

                                                <option value="<?=$user->id?>"><?=$user->firstname?> <?=$user->surname?></option>
                                                <?php endforeach; ?>

                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="message">Message</label>
                                            <textarea class="form-control" id="message" name="message" rows="3" placeholder="Enter message..."></textarea>
                                        </div>
                                    </div><!-- /.box-body -->

                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-primary">Send</button>
                                    </div>
                                </form>

                            </div><!-- /.box -->



                        </div><!--/.col (right) -->
                    </div>   <!-- /.row -->
                </div><!-- /.box-body -->
            </div><!-- /.box -->
        </div>
    </div>


</section><!-- /.content -->