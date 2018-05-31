<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B>CUSTOMER</B></p>
        </div>
<?php
                            $count = 0;
                            foreach ($agent_full as $value) {
                                $count++;
?>

        <div class="col-lg-3">
            <a href="<?php echo base_url ?>agent_transactions?id=<?php echo $value->agent_id; ?>">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <span class="label label-success pull-right">
                            <i class="fa fa-users fa-2x" aria-hidden="true"></i>
                        </span>
                        <h5><?php echo $value->agent_name; ?></h5>
                    </div>
            </a>
        </div>
    </div>
<?php } ?>

    <div class="col-lg-3">
        <div id="index" class="collapse out">
            <div class="panel panel-default">

                <a href="<?php echo base_url ?>create_agent">
                    <div class="panel-body">
                        Create New Customer<i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>


            </div>
        </div>
        <a data-toggle="collapse" data-target="#index" href="#index">
            <div class="ibox float-e-margins">
                <button type="button" class="btn btn-info btn-circle btn-xl pull-right"><i
                        class="glyphicon glyphicon-plus"></i></button>
            </div>
        </a>
        <button type="button" onclick="history.go(-1);" class="btn btn-default btn-circle btn-xl pull-left"><i
                class="fa fa-arrow-left"></i></button>
    </div>


</div>


</div>


