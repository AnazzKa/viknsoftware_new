<div class="row wrapper border-bottom white-bg page-heading" xmlns="http://www.w3.org/1999/html">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="well">
            <ul class="nav nav-tabs">
                <li class="active"><a href="#home" data-toggle="tab">ADD Card</a></li>
                <li><a href="#profile" data-toggle="tab">ADD Items</a></li>
            </ul>
        <div id="myTabContent" class="tab-content">
            <div class="tab-pane active in" id="home">
                <form role="form" method="post" enctype="multipart/form-data" action="">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <div class="form-group">
                                <label>Customer</label>
                                <select name="customer_id" class="form-control">
                                    <option>Please Select Customer</option>
                                    <?php
                                    $count = 0;
                                    foreach ($all_accounts as $value) {
                                        $count++;
                                        $rowid = $value->account_id;
                                        $agent_name = $value->user_name;
                                        ?>
                                        <option
                                            value="<?php echo $rowid ?>"><?php echo $agent_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Item</label>
                                <select name="card_type" class="form-control">
                                    <option>Please Select Item</option>
                                    <?php
                                    $count = 0;
                                    foreach ($all_cards as $value) {
                                        $count++;
                                        $rowid = $value->card_id;
                                        $card_name = $value->card_name;
                                        ?>
                                        <option
                                            value="<?php echo $rowid ?>"><?php echo $card_name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Import Card</label>
                                <input type="file" name="import_card" placeholder="Purchase Rate" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total No Cards</label>
                                <input type="text" name="" placeholder="Total No Cards" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Narration</label>
                                <textarea placeholder="Narration" name="Narration" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <button name="save_card" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                    <strong><?php echo $btn; ?></strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                    </form>
            </div>
            <div class="tab-pane fade" id="profile">
                <form action="" method="post" enctype="multipart/form-data">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <div class="form-group">
                                <label>Card Name</label>
                                <input type="text" name="card_name" placeholder="Card Name"
                                       value="<?php if (isset($single_item)) {
                                           echo $single_item[0]->card_name;
                                       } ?>" class="form-control">
                                <input type="hidden" name="edit" value="<?php if (isset($edit)) {
                                    echo $edit;
                                } ?>"/>
                            </div>
                            <div class="form-group">
                                <label>Card Type</label>
                                <select name="card_type" class="form-control">
                                    <option>Please Select Card Type</option>
                                    <?php
                                    $count = 0;
                                    foreach ($all_type_item as $value) {
                                        $count++;
                                        $rowid = $value->card_type_id;
                                        $card_type = $value->card_type;
                                        ?>
                                        <option <?php if (isset($single_item)) {
                                            if ($single_item[0]->card_type_id == $value->card_type_id) {
                                                echo "selected";
                                            }
                                        } ?>
                                            value="<?php echo $rowid ?>"><?php echo $card_type; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Purchase Rate</label>
                                <input type="text" name="purchase_rate" placeholder="Purchase Rate"
                                       value="<?php if (isset($single_item)) {
                                           echo $single_item[0]->purchase_rate;
                                       } ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Sales Rate</label>
                                <input type="text" name="sales_rate" placeholder="Sales Rate"
                                       value="<?php if (isset($single_item)) {
                                           echo $single_item[0]->sales_rate;
                                       } ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Add Pics</label>
                                <input type="file" name="pics" class="form-control">
                                <?php if (isset($single_item)) { ?> <img
                                    src="<?php echo base_url; ?>cards/<?php echo $single_item[0]->pics; ?>" height="100"
                                    width="100"> <?php } ?>
                            </div>
                            <div class="form-group">
                                <label>Details</label>
                                <textarea placeholder="Details" name="details" value="" class="form-control">
                                    <?php if (isset($single_item)) {
                                        echo $single_item[0]->details;
                                    } ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Narration</label>
                                <textarea placeholder="Narration" name="narration" value="" class="form-control">
                                    <?php if (isset($single_item)) {
                                        echo $single_item[0]->narration;
                                    } ?>
                                </textarea>
                            </div>
                            <div class="form-group">
                                <label>Link</label>
                                <input type="text" name="link" placeholder="Link"
                                       value="<?php if (isset($single_item)) {
                                           echo $single_item[0]->link;
                                       } ?>" class="form-control">
                            </div>
                            <div class="form-group">
                                <button name="save_item" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                    <strong><?php echo $btn; ?></strong>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                </form>
            </div>
        </div>
        </div>


        <div class="col-lg-3">
            <div id="index" class="collapse out">
                <div class="panel panel-default">
                    <a href="<?php echo base_url ?>create_cards">
                        <div class="panel-body">
                            Create Card<i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url ?>create_cards_type">
                        <div class="panel-body">
                            Create Card Type<i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="ibox float-e-margins">
                <button type="button" onclick="history.go(-1);" class="btn btn-default btn-circle btn-xl pull-left"><i class="fa fa-arrow-left"></i></button>
                <a data-toggle="collapse" data-target="#index" href="#index">
                    <button type="button" class="btn btn-info btn-circle btn-xl pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                </a>
            </div>
        </div>

    </div>

</div>




