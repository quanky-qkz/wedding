
            <!-- Content Header (Page header) -->
            <section class="content-header">
                <h1>
                <?=$item->event_name?>
                <small>Edit Control panel</small>
            </h1>
            <ol class="breadcrumb">
                <li><a href="<?php echo site_url('dashboard');?>"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="<?php echo site_url('event');?>"> Event</a></li>
                <li class="active">Edit Event</li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="col-md-8 col-md-push-2">
                <!-- general form elements -->
                <div class="box box-primary">
                    <div class="box-header">
                        <h3 class="box-title"> Edit Event</h3>
                    </div><!-- /.box-header -->
                    <!-- form start -->
                    <br/>
                    <div id="divUpload" style="display: none">
                        <form id="uploadLogoForm" enctype="multipart/form-data" action="<?php echo site_url('upload/doUploadLogo');?>" method="post" novalidate="novalidate">
                          <p>
                              <input type="file" name="file" id="fileUploadLogo" class="sf">
                          </p>
                        </form>
                    </div>
                    <form role="form" id="editForm" action="<?php echo site_url('event/doEdit/' . $item->id);?>">
                        <div class="box-body">
                            <div class="form-group">
                                <label for="name">Name</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Enter new name" value="<?=$item->event_name?>">
                            </div>
                            <div class="form-group">
                                <label for="item-logo">Event Logo</label>
                                <div class="input-group">
                                  <div class="input-group-btn">
                                      <button type="button" class="btn btn-danger triggerUploadLogo">Choose file</button>
                                  </div><!-- /btn-group -->
                                  <input type="text" class="form-control" id="eventLogo" name="eventLogo" value="<?=$item->event_pic?>" disabled />
                                  <input type="hidden" class="form-control" id="eventLogoName" name="eventLogoName" value="<?=$item->event_pic?>" />

                                </div>
                                <b class="uploading" style="display:none">Uploading...!</b>
                                <img <?php if ($item->event_pic == ""):?> style="display:none" <?php endif;?> id="event_preview" class="event_preview" src="<?=$item->event_pic?>" width="150px" height="150px"/>
                                  <br/>
                            </div>
                            <div class="form-group">
                                <label for="date">Date</label>
                                <input type="text" class="form-control" id="date" name="date" placeholder="Enter new date" value="<?=$item->event_date?>">
                            </div>
                            <div class="form-group">
                                <label for="time">Time</label>
                                <input type="time" class="form-control" id="time" name="time" placeholder="Enter new start time" value="<?=$item->event_start_time?>">
                            </div>
                            <div class="form-group">
                                <label for="time">End Time</label>
                                <input type="time" class="form-control" id="time-end" name="time-end" placeholder="Enter new end time" value="<?=$item->event_end_time?>">
                            </div>
                            <div class="form-group">
                                <label for="venue">Venue</label>
                                <input type="text" class="form-control" id="venue" name="venue" placeholder="Enter new venue" value="<?=$item->event_venue?>">
                            </div>
                            <div class="form-group">
                                <label for="postcode">Postcode</label>
                                <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Enter new postcode" value="<?=$item->postcode?>">
                            </div>
                            <div class="form-group">
                                <label for="venue_information">Venue information</label>
                                <textarea class="form-control" id="question" name="venue_information" rows="2" placeholder="Enter venue_information..."><?=$item->venue_information?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="university">Area</label>
                                <select class="form-control" id="university"  name ="university">
                                    <?php foreach ($all_uni as $uni) : ?>

                                    <option <?php if ($uni->id == $item->university) echo "selected"; ?> value="<?=$uni->id?>"><?=$uni->university?></option>
                                    <?php endforeach; ?>

                                </select>
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
                        <b>Notice!</b> <span class="msgsuccess">Successfully edit item!</span>
                        <br> Click <a href="<?php echo site_url('event');?>">here</a> to view event list
                    </div>
                    <div class="alert alert-danger alert-dismissable notification" style="display: none">
                        <i class="fa fa-ban"></i>
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                        <b>Error!</b> <span class="msgsuccess">Please try again</span>
                    </div>
                </div><!-- /.box -->
            </div><!--/.col (right) -->

        </section><!-- /.content
