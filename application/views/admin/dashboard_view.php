<section class="content-header">
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>

            <!-- Main content -->
            <section class="content">

                <!-- Small boxes (Stat box) -->
                <div class="row">
                    <div class="col-lg-3 col-xs-6">
                        <!-- small box -->
                        <div class="small-box bg-aqua">
                            <div class="inner">
                                <h3>
                                 <?php echo $totalFAQCount; ?>

                            </h3>
                            <p>
                                FAQ
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-bag"></i>
                        </div>
                        <a href="<?php echo site_url('faq');?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3>
                                <?php echo $totalUniversityCount;?>
                            </h3>
                            <p>
                                Locations
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios7-briefcase-outline"></i>
                        </div>
                        <a href="<?php echo site_url('location');?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-yellow">
                        <div class="inner">
                            <h3>

                                <?php echo $totalUserCount; ?><sup style="font-size: 20px">&nbsp;<?php echo $totalStaffCount; ?>&nbsp;promoters</sup>
                            </h3>
                            <p>
                                User Registrations
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-person-add"></i>
                        </div>
                        <a href="<?php echo site_url('user');?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div><!-- ./col -->
                <div class="col-lg-3 col-xs-6">
                    <!-- small box -->
                    <div class="small-box bg-maroon">
                        <div class="inner">
                            <h3>
                                <?php echo $totalEventCount; ?>
                            </h3>
                            <p>
                                Active Events
                            </p>
                        </div>
                        <div class="icon">
                            <i class="ion ion-ios7-pricetag-outline"></i>
                        </div>
                        <a href="<?php echo site_url('event');?>" class="small-box-footer">
                            More info <i class="fa fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            </div><!-- /.row -->



            <!-- Main row -->


        </section><!-- /.content -->
