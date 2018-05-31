<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B>Wallet / SUPPLIER</B></p>
        </div>
        <?php
        $count = 0;
        foreach ($suppliers as $value) {
            $count++;
            $user_id=$value->user_id
            ?>
            <div class="col-lg-3">
                <a  href="<?php echo base_url ?>supplier_cards?id=<?php echo $user_id; ?>">
                    <div class="form-group">
                        <button class="btn btn-primary btn-block m-t"><?php echo $value->user_name ?>  </button>
                    </div>
                </a>
            </div>
        <?php } ?>



        <div class="col-lg-3">
            <div id="index" class="collapse out">
                <div class="panel panel-default">



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


