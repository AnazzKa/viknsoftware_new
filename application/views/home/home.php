<div class="wrapper wrapper-content">
    <div class="row">
        <?php
        $User_type = $this->session->userdata("TYPE");
        if ($User_type == 3){
        ?>
        <div class="col-lg-3">
            <a data-toggle="collapse" data-target="#agent" href="#agent">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right"></span>
                        <h5>Agent</h5>
                    </div>
            </a>

            <div id="agent" class="collapse out">
                <div class="panel panel-default">
                    <a href="<?php echo base_url ?>create_agent">
                        <div class="panel-body">
                            Agent Add <i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url ?>list_agent">
                        <div class="panel-body">
                            Agent View<i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <div class="col-lg-3">
        <a data-toggle="collapse" data-target="#accounts" href="#accounts">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right"></span>
                    <h5>Accounts</h5>
                </div>
        </a>

        <div id="accounts" class="collapse out">
            <div class="panel panel-default">
                <a href="<?php echo base_url ?>account_type">
                    <div class="panel-body">
                        Account Type <i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="<?php echo base_url ?>create_account">
                    <div class="panel-body">
                        Create Accounts<i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>

<?php if ($User_type == 1) { ?>
    <div class="col-lg-3">
        <a data-toggle="collapse" data-target="#cards" href="#cards">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <span class="label label-success pull-right"></span>
                    <h5>Cards</h5>
                </div>
        </a>

        <div id="cards" class="collapse out">
            <div class="panel panel-default">
                <a href="<?php echo base_url ?>create_cards_type">
                    <div class="panel-body">
                        Card Type<i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="<?php echo base_url ?>create_cards">
                    <div class="panel-body">
                        Items Add <i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="<?php echo base_url ?>add_cards_stock">
                    <div class="panel-body">
                        Cards Add<i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
            </div>
        </div>
    </div>
    </div>
<?php } ?>

<div class="col-lg-3">
    <a data-toggle="collapse" data-target="#items" href="#items">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Items</h5>
            </div>
    </a>

    <div id="items" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>list_cards">
                <div class="panel-body">
                    List View<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>

<?php if ($User_type == 2) { ?>
    <div class="col-lg-3">
        <div class="ibox float-e-margins">
            <a href="<?php echo base_url ?>list_cards_all">
                <div class="ibox-title">
                    <span class="label label-success pull-right"></span>
                    <h5>Download Cards</h5>
                </div>
            </a>
        </div>
    </div>
<?php } ?>
<div class="col-lg-3">
    <a data-toggle="collapse" data-target="#receipts" href="#receipts">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Receipts</h5>
            </div>
    </a>

    <div id="receipts" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>receipts_add">
                <div class="panel-body">
                    Receipts ADD <i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>receipts_list">
                <div class="panel-body">
                    Receipts View<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
<div class="col-lg-3">
    <a data-toggle="collapse" data-target="#Payments" href="#Payments">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Payments</h5>
            </div>
    </a>

    <div id="Payments" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>payments_add">
                <div class="panel-body">
                    Payments ADD <i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>payments_list">
                <div class="panel-body">
                    Payments View<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
<div class="col-lg-3">
    <a data-toggle="collapse" data-target="#Income" href="#Income">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Income</h5>
            </div>
    </a>

    <div id="Income" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>income_add">
                <div class="panel-body">
                    Income ADD <i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>income_list">
                <div class="panel-body">
                    Income View<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
<div class="col-lg-3">
    <a data-toggle="collapse" data-target="#Expenses" href="#Expenses">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Expenses</h5>
            </div>
    </a>

    <div id="Expenses" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>expenses_add">
                <div class="panel-body">
                    Expenses ADD <i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>expenses_list">
                <div class="panel-body">
                    Expenses View<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>
<div class="col-lg-3">
    <a data-toggle="collapse" data-target="#advertisement" href="#advertisement">
        <div class="ibox float-e-margins">
            <div class="ibox-title">
                <span class="label label-success pull-right"></span>
                <h5>Advertisement</h5>
            </div>
    </a>

    <div id="advertisement" class="collapse out">
        <div class="panel panel-default">
            <a href="<?php echo base_url ?>advertisement_add">
                <div class="panel-body">
                    Advertisement ADD <i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
            <a href="<?php echo base_url ?>advertisement_list">
                <div class="panel-body">
                    Advertisement View<i class="fa fa-chevron-right" style="float: right;"></i>
                </div>
            </a>
        </div>
    </div>
</div>
</div>

<div class="col-lg-3">
    <div class="ibox float-e-margins">
        <button type="button" class="btn btn-default btn-circle btn-xl pull-left"><i class="fa fa-arrow-left"></i>
        </button>
        <button type="button" class="btn btn-info btn-circle btn-xl pull-right"><i class="glyphicon glyphicon-plus"></i>
        </button>
    </div>
</div>


</div>


</div>


