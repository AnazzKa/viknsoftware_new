<?php $User_type = $this->session->userdata("TYPE"); ?>
    <div class="wrapper wrapper-content">
        <div class="row">

<div class="col-md-12">
    <p><B>Dashboard</B></p>
</div>
            <div class="col-lg-3">
                <a  href="<?php echo base_url; ?>ledger_view?id=<?php echo $this->session->userdata("ID") ?>">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block m-t">Cash In Hand </button>
                    </div>
                </a>
            </div>


            <div class="col-lg-3">
                <a  href="<?php echo base_url; ?>customer">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block m-t">Customer </button>
                    </div>
                     </a>
                         </div>

            <?php
            if($User_type==2 && $this->session->userdata("parent_id")==1){
                ?>
                <div class="col-lg-3">
                    <a  href="<?php echo base_url ?>suppliers">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block m-t">Suppliers </button>
                        </div>

                    </a>
                </div>
                <?php
            }
            ?>
                 <?php
            if($User_type==2 && $this->session->userdata("parent_id")!=1){
                ?>
                <div class="col-lg-3">
                    <a  href="<?php echo base_url ?>suppliers_list">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block m-t">wallet </button>
                        </div>

                    </a>
                </div>
                <div class="col-lg-3">
                    <a  href="<?php echo base_url ?>wallet_card_sales">
                        <div class="form-group">
                            <button class="btn btn-primary btn-block m-t">Sales</button>
                        </div>

                    </a>
                </div>
            <?php
            }
            ?>
<?php
            if($User_type==2 && $this->session->userdata("parent_id")==1){
                ?>
    <div class="col-lg-3">
        <a  href="<?php echo base_url ?>supplier_cards">
            <div class="form-group">
                <button class="btn btn-primary btn-block m-t">Items </button>
            </div>

            </a>
            </div>
         <?php
            }
            ?>   
    <div class="col-lg-3">
        <div class="form-group">
            <button class="btn btn-primary btn-block m-t">Offers </button>
        </div>

            </div>


    <div class="col-lg-3">
    <div id="index" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>create_account">
                <div class="panel-body">
                    Create Account<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <?php if ($User_type == 1 || $User_type ==2) { ?>
            <a href="<?php echo base_url ?>add_cards_stock">
                <div class="panel-body">
                    Create Cards<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <?php } ?>
            <?php if ($User_type == 2) { ?>
            <a href="<?php echo base_url ?>wallet_payment">
                <div class="panel-body">
                    Wallet Payment<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <?php } ?>
            <?php if ($User_type == 2) { ?>
            <a href="<?php echo base_url ?>purchase_cards_list">
                <div class="panel-body">
                    Items<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <?php } ?>
            <a href="<?php echo base_url ?>receipts_add">
                <div class="panel-body">
                    Receipts<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>payments_add">
                <div class="panel-body">
                    Payment<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="">
                <div class="panel-body">
                    ADD Income<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="">
                <div class="panel-body">
                    ADD Expenses<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="">
                <div class="panel-body">
                    ADD Advertisement<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>

        </div>
    </div>
                <a data-toggle="collapse" data-target="#index" href="#index">
                <div class="ibox float-e-margins">
                      <button type="button" class="btn btn-info btn-circle btn-xl pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                </div>
                    </a>
            </div>







        </div>




    </div>


