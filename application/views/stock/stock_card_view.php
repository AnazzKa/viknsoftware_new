<div class="row wrapper border-bottom white-bg page-heading">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <div class="ibox-content">
                    <?php if(!empty($stocks)){ ?>
                    <h5><?php echo $stocks[0]->card_type; ?></h5>
                    <h5><?php echo $stocks[0]->card_name; ?></h5>
                    <div class="">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>#</th>
                                <th>Slno</th>
                                <th>Username</th>
                                <th>Password</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $count = 0;
                            foreach ($stocks as $value) {
                                $count++;
                                $rowid = $value->export_id;
                                ?>
                                <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?>
                                    id="<?php echo $rowid; ?>">
                                    <td><?php echo $count; ?></td>
                                    <td><?php echo $value->slno ?></td>
                                    <td><?php echo $value->user_id ?></td>
                                    <td><?php echo $value->password ?></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                           
                        </table>
                    </div>
<?php }else{ ?>
    <div><b>No Stock Found</b></div>
    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>

