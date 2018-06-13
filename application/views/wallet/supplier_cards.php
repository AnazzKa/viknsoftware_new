<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B>Wallet / SUPPLIER</B></p>
        </div>
        <?php
        $count = 0;
        //$parent_id=$_REQUEST['id'];
        foreach ($cards_type as $value) {
        $count++;
            $card_id=$value->card_type_id;
            if($card_id==5){
                $card_id=2;
            }
        ?>
        <div class="col-lg-3">
            <a  href="<?php echo base_url ?>supplier_wallet_cards?id=<?php echo $card_id; ?>&pid=">
                <div class="form-group">
                    <button class="btn btn-primary btn-block m-t"><?php echo $value->card_type ?>  </button>
                </div>
            </a>
    </div>
    <?php } ?>



<div class="col-lg-3">
    <div id="index" class="collapse out">
        <div class="panel panel-default">






            <!--            <a href="">-->
            <!--                <div class="panel-body">-->
            <!--                    ADD Advertisement<i class="fa fa-chevron-right" style="float: right;"></i>-->
            <!--                </div>-->
            <!--            </a>-->


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


