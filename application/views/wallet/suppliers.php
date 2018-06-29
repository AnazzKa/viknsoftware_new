<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B>Wallet / SUPPLIER</B></p>
        </div>
        <?php
        $count = 0;
        foreach ($suppliers as $value) {
                $dr=$this->Common_model->direct_query("SELECT COALESCE(SUM(`amount`),0) AS 'dr' FROM `vikn_transation` WHERE `ledger_dr`=".$value->account_id);
                $cr=$this->Common_model->direct_query("SELECT COALESCE(SUM(`amount`),0) AS 'cr' FROM `vikn_transation` WHERE `ledger_cr`=".$value->account_id);
            $count++;
            ?>
            <div class="col-lg-3">
                <a  href="<?php echo base_url; ?>ledger_view?id=<?php echo $value->account_id; ?>">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block m-t"><?php echo $value->user_name ?>
                              <br><label><?php echo "Cash "; echo $cr[0]->cr-$dr[0]->dr; ?></label>
                        </button>
                    </div>
                </a>
            </div>
        <?php } ?>



        <div class="col-lg-3">
            <div id="index" class="collapse out">
                <div class="panel panel-default">

<a href="<?php echo base_url ?>add_suppliers">
                <div class="panel-body">
                    Add Suppliers<i class="fa fa-chevron-right" style="float: right;"></i>
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


