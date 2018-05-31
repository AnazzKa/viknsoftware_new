<div class="row wrapper border-bottom white-bg page-heading">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Items View</h5>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>SlNo</th>
                                <th>Card Name</th>
                                <th>Card Type</th>
                                <th>Purchase Rate</th>
                                <th>Sales Rate</th>
                                <th>Pics</th>
                                <th>Details</th>
                                <th>Narration</th>
                                <th>Username</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_cards as $value) {
                                $count++;
                                $rowid = $value->card_id;
                                $card_name = $value->card_name;
                                $card_type = $value->card_type;
                                $purchase_rate = $value->purchase_rate;
                                $sales_rate = $value->sales_rate;
                                $pics = $value->pics;
                                $details = $value->details;
                                $narration = $value->narration;
                                $username = $value->username;
                                $password = $value->password;
                                $link = $value->link;
                                ?>
                                <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?>
                                    id="<?php echo $rowid; ?>">
                                    <td><?php echo $count ?></td>
                                    <td class="center"><?php echo $card_name; ?></td>
                                    <td class="center"><?php echo $card_type; ?></td>
                                    <td class="center"><?php echo $purchase_rate; ?></td>
                                    <td class="center"><?php echo $sales_rate; ?></td>
                                    <td class="center"><img src="<?php echo base_url; ?>cards/<?php echo $pics; ?>"
                                                            height="50" width="50"></td>
                                    <td class="center"><?php echo $details; ?></td>
                                    <td class="center"><?php echo $narration; ?></td>
                                    <td class="center"><?php echo $username; ?></td>
                                    <!--                <td class="center">--><?php //echo $password; ?><!--</td>-->
                                    <td class="center"><?php echo $link; ?></td>
                                    <td class="center">
                                        <a onclick="return confirm('Are You Sure Want To Delete...')"
                                           href="<?php echo base_url ?>list_cards?delete=<?php echo $rowid ?>"
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>create_cards?edit=<?php echo $rowid ?>"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                        <span class="btn btn-info"><i class="fa fa-eye"></i></span>
                                    </td>

                                </tr>
                            <?php } ?>
                            </tbody>


                            </tbody>
                            <tfoot>
                            <tr>
                                <th>SlNo</th>
                                <th>Card Name</th>
                                <th>Card Type</th>
                                <th>Purchase Rate</th>
                                <th>Sales Rate</th>
                                <th>Pics</th>
                                <th>Details</th>
                                <th>Narration</th>
                                <th>Username</th>
                                <!--        <th>Password</th>-->
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-lg-3">
            <div id="index" class="collapse out">
                <div class="panel panel-default">
                    <a href="<?php echo base_url ?>add_cards_stock">
                        <div class="panel-body">
                            Create Cards<i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url ?>create_cards">
                        <div class="panel-body">
                            Create Item<i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>
                    <a href="<?php echo base_url ?>list_cards">
                        <div class="panel-body">
                            Item View<i class="fa fa-chevron-right" style="float: right;"></i>
                        </div>
                    </a>
                </div>
            </div>

            <div class="ibox float-e-margins">
                <button type="button" onclick="history.go(-1);" class="btn btn-default btn-circle btn-xl pull-left"><i class="fa fa-arrow-left"></i></button>
<!--                <a data-toggle="collapse" data-target="#index" href="#index">-->
                    <button type="button" class="btn btn-info btn-circle btn-xl pull-right"><i class="glyphicon glyphicon-plus"></i></button>
<!--                </a>-->
            </div>
        </div>
    </div>
</div>

