<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">

                <li>
                    <a href="<?php echo base_url ?>Dashboard">  <i class="fa fa-sign-out"></i> Dashboard </a>
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>  <?php echo $this->session->userdata("NAME") ?>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">
        <strong><?php echo $this->session->userdata("msg") ?></strong>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ADD Income</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>

                            <div class="form-group">
                                <label>Income No:</label>
                                <label>152025</label>

                            </div>
                            <div class="form-group">
                                <label>Date :</label>
                                <label>2017/10/31</label>

                            </div>
                            <div class="form-group col-md-6">
                                <label>Received Into</label>
                                <select name="card_type"  class="form-control">
                                    <option>Please Select Account Type</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Received From</label>
                                <select name="card_type"  class="form-control">
                                    <option>Please Select Account Type</option>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="text" name="" placeholder="Amount" value="" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Discount</label>
                                <input type="text" name="" placeholder="Amount" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <label>Rs: 1500</label>

                            </div>
                            <div class="form-group">
                                <label>Narration</label>
                                <textarea placeholder="Narration" value="" class="form-control"></textarea>
                            </div>
                            <div>
                                <button name="<?php echo $btn; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                    <strong><?php echo $btn; ?></strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


        </div>


    </div>

