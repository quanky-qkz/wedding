<section class="content-header">
                <h1>
                    Event
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="<?php echo site_url('admin/dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Event</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">
                <div class="row">
                    <div class="col-xs-12">


                        <div class="box">
                            <div class="box-header">
                                <h3 class="box-title">Event List</h3>
                            </div><!-- /.box-header -->
                            <div class="box-body table-responsive">
                                <table id="dataTable" class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Caption</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Venue</th>
                                            <th>Area</th>
                                            <th>Message</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Guest list</th>
                                        </tr>
                                    </thead>
                                    <tbody>

                                        <?php foreach ($all_event as $item) : ?>
                                    <tr>
                                        <td><?=$item->id?></td>
                                        <td><?=$item->event_name?></td>
                                        <td><?=$item->event_date?></td>
                                        <td><?=$item->event_time?></td>
                                        <td><?=$item->event_venue?></td>
                                        <td><?=$item->university_name?></td>
                                        <td><a href="<?php echo site_url('event/message/' . $item->id);?>">Send</a>  </td>
                                        <td><a href="<?php echo site_url('event/edit/' . $item->id);?>">Edit</a>  </td>
                                        <td><a class="deleteItem" href="<?php echo site_url('event/doRemove/' . $item->id);?>">Remove</a>  </td>
                                        <td><a target="_blank" href="<?php echo site_url('event/guestlist/' . $item->id);?>">View</a>  </td>
                                    </tr>
                                    <?php endforeach; ?>


                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>ID</th>
                                            <th>Caption</th>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Venue</th>
                                            <th>Area</th>
                                            <th>Message</th>
                                            <th>Edit</th>
                                            <th>Delete</th>
                                            <th>Guest list</th>
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
                        <div id="divUpload" style="display: none">
                              <form id="uploadLogoForm" enctype="multipart/form-data" action="<?php echo site_url('upload/doUploadLogo');?>" method="post" novalidate="novalidate">
                                  <p>
                                      <input type="file" name="file" id="fileUploadLogo" class="sf">
                                  </p>
                              </form>
                          </div>
                        <!-- form start -->
                        <form role="form" id="form" method="post" action="<?php echo site_url('event/doAdd');?>">
                            <div class="box-body">
                                <div class="form-group">
                                    <label for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Enter caption" >
                                </div>
                                <div class="form-group">
                                    <label for="item-logo">Event Logo</label>&nbsp;&nbsp;&nbsp;<span>*For optimal display, please upload your image 320 x 200 as a PNG</span>
                                    <div class="input-group">
                                      <div class="input-group-btn">
                                          <button type="button" class="btn btn-danger triggerUploadLogo">Choose file</button>
                                      </div><!-- /btn-group -->
                                      <input type="text" class="form-control" id="eventLogo" name="eventLogo" disabled >
                                      <input type="hidden" class="form-control" id="eventLogoName" name="eventLogoName"  >

                                    </div>
                                    <b class="uploading" style="display:none">Uploading...!</b>
                                        <img style="display:none" id="event_preview" class="event_preview" src="" width="150px" height="150px"/>
                                      <br/>
                                </div>
                                <div class="form-group">
                                    <label for="date">Date </label>
                                    <input type="text" class="form-control" name="date" id="date" placeholder="Enter Start Date" data-inputmask="'alias': 'yyyy-mm-dd'" data-mask="">
                                </div>
                                <div class="form-group">
                                    <label for="time">Start Time</label>
                                    <input type="time" class="form-control" id="time" name="time" placeholder="Enter start time" >
                                </div>
                                <div class="form-group">
                                    <label for="time">End Time</label>
                                    <input type="time" class="form-control" id="time-end" name="time-end" placeholder="Enter end time" >
                                </div>
                                <div class="form-group">
                                    <label for="venue">Venue</label>
                                    <input type="text" class="form-control" id="venue" name="venue" placeholder="Enter venue" >
                                </div>
                                <div class="form-group">
                                    <label for="postcode">Postcode</label>
                                    <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Enter postcode" >
                                </div>
                                <div class="form-group">
                                    <label for="venue_information">Venue information</label>
                                    <textarea class="form-control" id="venue_information" name="venue_information" rows="3" placeholder="Enter  venue_information..."></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="university">Area</label>
                                    <select class="form-control" id="university"  name ="university">
                                        <?php foreach ($all_uni as $uni) : ?>

                                        <option value="<?=$uni->id?>"><?=$uni->university?></option>
                                        <?php endforeach; ?>

                                    </select>
                                </div>


                                <input type="hidden" name="admin_id" id="admin_id" value="<?php echo $this->session->userdata('adminID'); ?>" />


                            </div><!-- /.box-body -->

                            <div class="box-footer">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                        <br/>
                        <div class="alert alert-success alert-dismissable notification" style="display: none">
                        <i class="fa fa-check"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Notice!</b> <span class="msg-success">Successfully added new event</span>
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
