<div class="row wrapper border-bottom white-bg page-heading">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">


                <div class="ibox-content">
                    <?php
                    foreach ($account as $val) {
                        $id = $val->account_id;
                        ?>
                        <h5><?php echo $val->account_name; ?></h5>
                        <h5><?php echo $val->address; ?></h5>
                        <h5><?php echo $val->date; ?></h5>
                    <?php } ?>
                    <?php
                    foreach ($account_type as $val) {
                        ?>
                        <h5><?php echo $val->account_type; ?></h5>
                    <?php } ?>
                    <div class="">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Date</th>
                                <th>Particular</th>
                                <th>VCH Type</th>
                                <th>VCH No</th>
                                <th>Reff No</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Running Balance</th>
                            </tr>
                            </thead>
                            <tbody>

                            <?php
                            $count = 0;
                            foreach ($entries as $value) {
                                $count++;
                                $rowid = $value->receipts_id;
                                ?>
                                <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?>
                                    id="<?php echo $rowid; ?>">
                                    <td><?php echo $value->datetime ?></td>
                                    <td><?php echo $value->Narration ?></td>
                                    <td><?php echo "Receipts" ?></td>
                                    <td><?php echo $value->receipts_number ?></td>
                                    <td></td>
                                    <?php if ($value->received_into == $id) { ?>
                                        <td><?php echo ($value->amount) - ($value->discount) ?></td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>
                                    <?php if ($value->received_from == $id) { ?>
                                        <td><?php echo ($value->amount) - ($value->discount) ?></td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>
                                    <td></td>
                                </tr>
                            <?php } ?>

                            </tbody>
                            <tfoot>
                            <tr>
                                <th>Date</th>
                                <th>Particular</th>
                                <th>VCH Type</th>
                                <th>VCH No</th>
                                <th>Reff No</th>
                                <th>Debit</th>
                                <th>Credit</th>
                                <th>Running Balance</th>
                            </tr>
                            </tfoot>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

