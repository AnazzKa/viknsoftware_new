<?php
if($this->session->userdata('USER_NAME')){
// do something when exist
}else{
    header('Location:' . base_url . 'logout');
}
?>
<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">

            <ul class="nav navbar-top-links navbar-right">
                <li>
                    <a href="<?php echo base_url ?>Dashboard">  Dashboard </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>  <?php echo $this->session->userdata("USER_NAME")." Panal"; ?>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url; ?>logout">
                        <i class="fa fa-sign-out"></i>
                    </a>
                </li>
                <li>
                    <a href="<?php echo base_url; ?>other_accounts">
                        <i class="fa fa-bars"></i>
                    </a>
                </li>
            </ul>

        </nav>
    </div>