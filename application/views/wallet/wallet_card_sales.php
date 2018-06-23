<?php $User_type = $this->session->userdata("TYPE"); ?>
<?php $ID = $this->session->userdata("ID"); ?>
<div class="wrapper wrapper-content">
    <div class="row">
      <div class="col-md-12">
            <p><B><?php //echo $cards[0]->card_type; ?></B></p>
        </div>
        <?php
        $count = 0;
        foreach ($owner_cards as $value) {
            $card_new_id=$value->card_new_id;
        $count++;
        $cards=$data['owner_cards']=$this->Common_model->direct_query("SELECT * FROM vikn_cards_new n INNER JOIN vikn_cards c ON c.card_id=n.card_item_id WHERE n.cards_new_id=$card_new_id");
            $stock=$this->Common_model->direct_query("SELECT COUNT(*)AS 'count' FROM `vikn_cards_export` WHERE `card_new_id`=$card_new_id AND `sale`=0 AND `owen_user_id`=$ID");
            if($stock[0]->count>0){
            ?>
        <div class="col-lg-3">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
<label><?php echo $cards[0]->card_name; ?></label>
                        <img src="<?php echo base_url; ?>cards/<?php echo $cards[0]->pics; ?>"
                            style="width: 100%;height: 185px;">
                         <span class="label label-info pull-right"> Stock :
                            <?php if(!empty($stock)){ echo $stock[0]->count; }else{echo 0; } ?>
                        </span>
                        <a href="<?php echo base_url; ?>wallet_card_details?id=<?php echo $cards[0]->card_id; ?>" >
                            <span class="label label-success ">
                            Details
                        </span></a>
                        <a href="<?php echo base_url; ?>wallet_cards_sales?id=<?php echo $cards[0]->card_id; ?>&uid=<?php echo $ID; ?>" >
                        <span class="label label-danger pull-right">
                            Sales
                        </span>
                            </a>
                    </div>
        </div>
    </div>
    <?php  } } ?>
</div>
</div>