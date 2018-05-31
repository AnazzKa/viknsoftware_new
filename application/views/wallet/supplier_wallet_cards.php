<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B><?php echo $cards[0]->card_type; ?></B></p>
        </div>


        <?php
        $count = 0;
        foreach ($cards as $value) {
        $count++;
        ?>
            <?php
            $stock=$this->Card_model->get_cards_stock($value->card_id,$this->session->userdata('account_id'));

            ?>
        <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
<label><?php echo $value->card_name; ?></label>
                        <img src="<?php echo base_url; ?>cards/<?php echo $value->pics; ?>"
                             style="width: 100%;height: 185px;">
<?php if($this->session->userdata('parent_id')==0 || $this->session->userdata('parent_id')==1){ ?>
                         <span class="label label-info pull-right"> Stock :
                            <?php if(!empty($stock)){ echo $stock; }else{echo 0; } ?>
                        </span>
                        <?php } ?>
                        <a href="<?php echo base_url; ?>wallet_card_details?id=<?php echo $value->card_id; ?>" >
                            <span class="label label-success ">
                            Details
                        </span></a>
                        <?php if($this->session->userdata('parent_id')!=1){ ?>
                        <a href="<?php echo base_url; ?>wallet_cards_buy?id=<?php echo $value->card_id; ?>" >
                        <span class="label label-danger pull-right">
                            BUY
                        </span>
                            </a>
                        <?php } ?>
                    </div>

        </div>
    </div>
    <?php   } ?>



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


