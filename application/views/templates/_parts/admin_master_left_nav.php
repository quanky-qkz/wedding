<aside class="left-side sidebar-offcanvas">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="pull-left image">
                <img src="<?php echo base_url();?>assets/avatar/<?php echo $this->session->userdata('adminAvatar');?>" class="img-circle" alt="User Image" />

            </div>
            <div class="pull-left info">
                <p>
                    Hello, <?php echo $this->session->userdata('adminName');?>
                </p>

            </div>
        </div>

        <ul class="sidebar-menu">
            <?php if ($this->session->userdata('adminType') == 2) : ?>
            <li class="active">
                <a href="<?php echo site_url('dashboard');?>" class="sb-dashboard">
                    <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('user');?>" class="sb-customer">
                    <i class="fa fa-user"></i> <span>Users</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('message/inbox');?>" class="sb-message">
                    <i class="fa fa-comments-o"></i> <span>Message-Inbox</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('message/sent');?>" class="sb-message">
                    <i class="fa fa-comments-o"></i> <span>Message-Sent</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('event');?>" class="sb-event">
                    <i class="fa fa-th"></i> <span>Event</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('ticket');?>" class="sb-ticket">
                    <i class="fa fa-tags"></i> <span>Ticket</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('faq');?>" class="sb-faq">
                    <i class="fa fa-qrcode"></i> <span>FAQ</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('location');?>" class="sb-university">
                    <i class="fa fa-tasks"></i> <span>Location</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('promoter');?>" class="sb-promoter">
                    <i class="fa fa-bookmark-o"></i> <span>Promoter</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('about');?>" class="sb-statistic">
                    <i class="fa fa-pencil"></i> <span>About</span>
                </a>
            </li>
            <?php endif; if ($this->session->userdata('adminType') == 1) : ?>
            <li>
                <a href="<?php echo site_url('message/inbox');?>" class="sb-message">
                    <i class="fa fa-comments-o"></i> <span>Message-Inbox</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('message/sent');?>" class="sb-message">
                    <i class="fa fa-comments-o"></i> <span>Message-Sent</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('event');?>" class="sb-event">
                    <i class="fa fa-th"></i> <span>Event</span>
                </a>
            </li>
            <li>
                <a href="<?php echo site_url('ticket');?>" class="sb-ticket">
                    <i class="fa fa-tags"></i> <span>Ticket</span>
                </a>
            </li>
            <?php endif;?>


        </ul>
    </section>
    <!-- /.sidebar -->
</aside>
