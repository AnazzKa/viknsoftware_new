<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B>Dashboard</B></p>
        </div>
        <?php
        foreach ($account_type as $value) {
        $account_type=$value->account_type;
        $account_type_id=$value->account_type_id;
        ?>
        <div class="col-lg-3">
            <a data-toggle="collapse" data-target="#<?php echo $account_type_id; ?>" href="#<?php echo $account_type_id; ?>">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">
                            <i class="fa fa-money fa-2x" aria-hidden="true"></i>
                        </span>
                        <h5><?php echo $account_type; ?></h5>
                    </div>
            </a>
            <div id="<?php echo $account_type_id; ?>" class="collapse out">
                <div class="panel panel-default">
                    <?php
                    $account['account']=$this->Account_model->get_single_account($account_type_id);
                    foreach ($account['account'] as $val) {
                        ?>
                        <div class="panel-body">
                            <a href="<?php echo base_url; ?>ledger_view?id=<?php echo $val->account_id; ?>"> <?php echo $val->account_name; ?><i class="fa fa-chevron-right" style="float: right;"></i></a>
                        </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>






<div class="col-lg-3">
    <div id="index" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>create_account">
                <div class="panel-body">
                    Create Account<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <?php if ($User_type == 1) { ?>
                <a href="<?php echo base_url ?>add_cards_stock">
                    <div class="panel-body">
                        Create Cards<i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
            <?php } ?>
            <?php if ($User_type == 2) { ?>
                <a href="<?php echo base_url ?>">
                    <div class="panel-body">
                        Download Cards<i class="fa fa-chevron-right" style="float: right;"></i>
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
            <a href="<?php echo base_url ?>">
                <div class="panel-body">
                    ADD Income<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>">
                <div class="panel-body">
                    ADD Expenses<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>">
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


