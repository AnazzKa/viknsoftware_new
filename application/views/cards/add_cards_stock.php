<div class="row wrapper border-bottom white-bg page-heading">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">

        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>ADD Cards</h5>
                </div>
            </div>
        </div>

        <form role="form" method="post" enctype="multipart/form-data" action="">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>


                            <div class="form-group">
                                <label>Customer</label>
                                <select name="card_type" class="form-control">
                                    <option>Please Select Customer</option>
                                    <?php
                                    $count = 0;
                                    foreach ($all_agents as $value) {
                                        $count++;
                                        $rowid = $value->agent_id;
                                        $agent_name = $value->agent_name;
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
                                <input type="text" name="import_card" placeholder="Total No Cards" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Narration</label>
                                <textarea placeholder="Narration" class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                            <button name="<?php echo $btn; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                                <strong><?php echo $btn; ?></strong>
                            </button>
                            </div>
                        </div>

                    </div>

                </div>


            </div>
        </form>
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




