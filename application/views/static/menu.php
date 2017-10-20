<body>
    <div id="wrapper">
    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="<?php echo base_url ?>assets/template/img/profile_small.jpg" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"><?php echo $this->session->userdata("NAME") ?></strong>
                             </span> <span class="text-muted text-xs block">Art Director <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="">Profile</a></li>
                            <li><a href="">Contacts</a></li>
                            <li><a href="">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        Vk+
                    </div>
                </li>
                
                <li class="active">
                    <a href=""><i class="fa fa-th-large"></i> 
                        <span class="nav-label">Accounts</span> <span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level">
                        <li><a href="">Cash Accounts</a></li>
                        <li class="active"><a href="">Agent</a></li>
                        <li><a href="">Customers</a></li>
                    </ul>
                </li>
                <li>
                    <a href="<?php echo base_url ?>account_type">
                        <i class="fa fa-diamond"></i> <span class="nav-label">Account Type</span>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url ?>create_account">
                        <i class="fa fa-diamond"></i> <span class="nav-label">Create Account</span>
                    </a>
                </li>
                 
            </ul>

        </div>
    </nav>