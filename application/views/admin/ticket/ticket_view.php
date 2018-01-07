<section class="content-header">
                <h1>
                    Ticket
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Ticket</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Ticket List</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Event Name</th>
                                            <th>Ticket Name</th>
                                            <th>Price</th>
                                            <th>Quantity</th>
                                            <th>Edit</th>
                                            <th>Remove</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($all_items as $item) : ?>
                                    <tr>
                                        <td><?=$item->id?></td>
                                        <td><?=$item->event_name?></td>
                                        <td><?=$item->ticket_name?></td>
                                        <td><?=$item->ticket_price?></td>
                                        <td><?=$item->no_of_tickets?></td>
                                        <td><a href="<?php echo site_url('ticket/edit/' . $item->id);?>">Edit</a>  </td>
                                        <td><a class="deleteItem" href="<?php echo site_url('ticket/doRemove/' . $item->id);?>">Remove</a>  </td>
                                    </tr>
                                    <?php endforeach; ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                        <th>Event Name</th>
                                        <th>Ticket Name</th>
                                        <th>Price</th>
                                        <th>Quantity</th>
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
                            <h3 class="box-title">Add new item</h3>
                        </div><!-- /.box-header -->
                        <br/>
                        <div class="alert alert-success alert-dismissable notification" style="display: none">
                            <i class="fa fa-check"></i>
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            <b>Notice!</b> <span class="msgsuccess">Successfully added new item</span>
                        </div>
                        <!-- form start -->
                        <form role="form" id="form" method="post" action="<?php echo site_url('ticket/doAdd');?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="event">Events</label>
                                    <select class="form-control" id="event"  name ="event">
                                        <?php foreach ($all_events as $event) : ?>

                                        <option value="<?=$event->id?>"><?=$event->event_name?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="item-name">Ticket name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Enter item name">
                                </div>
                                <div class="form-group">
                                    <label for="item-price">Price</label>
                                    <input type="text" class="form-control" name="price" id="price" placeholder="Enter item price">
                                </div>
                                <div class="form-group">
                                    <label for="item-quantity">Quantity</label>
                                    <input type="text" class="form-control" name="quantity" id="quantity" placeholder="Enter item quantity">
                                </div>

                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>

                    </div><!-- /.box -->




                </div><!--/.col (right) -->
            </div>   <!-- /.row -->
        </section><!-- /.content -->