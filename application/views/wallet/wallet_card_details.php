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

            <div class="col-lg-3">

                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <label><?php echo $value->card_name; ?></label>
                        <img src="<?php echo base_url; ?>cards/<?php echo $value->pics; ?>"
                             style="width: 100%;height: 185px;">

                        <p>Card Name : <?php echo $value->card_name ?></p>
                        <p>Purchase Rate : <?php echo $value->purchase_rate ?></p>
                        <p>Sales Rate : <?php echo $value->sales_rate ?></p>
                        <p>Details : <?php echo $value->details ?></p>
                        <p>Narration : <?php echo $value->narration ?></p>
                        <p>Link : <?php echo $value->link ?></p>
                    </div>

                </div>
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


