
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <?=$item->event_name?>
                <small>Edit Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('ticket');?>"> Tickets</a></li>
                <li class="active">Edit Ticket</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-8 col-md-push-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> <?=$item->ticket_name?></h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <br/>
                    <div class="alert alert-success alert-dismissable notification" style="display: none">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Notice!</b> <span class="msgsuccess">Successfully edited item!</span>
                        <br> Click <a href="<?php echo site_url('ticket');?>">here</a> to view ticket list
                    </div>
                    <div class="alert alert-danger alert-dismissable notification" style="display: none">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Error!</b> <span class="msgsuccess">Please try again</span>
                    </div>
                    <form role="form" id="editForm" action="<?php echo site_url('ticket/doEdit/' . $item->id);?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="event">Events</label>
                                <select class="form-control" id="event"  name ="event">
                                    <?php foreach ($all_events as $event) : ?>

                                    <option <?php if ($event->id == $item->event_id) echo "selected"; ?> value="<?=$event->id?>"><?=$event->event_name?></option>
                                    <?php endforeach; ?>

                                </select>
                            </div>
                            <div class="form-group">
                                <label for="name">Ticket Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter new name" value="<?=$item->ticket_name?>">
                            </div>
                            <div class="form-group">
                                <label for="item-price">Price</label>
                                <input type="text" class="form-control" name="price" id="price" placeholder="Enter item price" value="<?=$item->ticket_price?>" >
                            </div>
                            <div class="form-group">
                                <label for="item-quantity">Quantity</label>
                                <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter item quantity" value="<?=$item->no_of_tickets?>" >
                            </div>

                                    <!-- <input type="hidden" name="itemID" value="<?=$item->id?>" /> -->

                        </div><!-- /.box-body -->

                        <div class="box-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </form>
                </div><!-- /.box -->
            </div><!--/.col (right) -->

        </section><!-- /.content