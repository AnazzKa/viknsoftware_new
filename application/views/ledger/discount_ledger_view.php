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
                                <th>Reff Person</th>
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
                                $rowid = $value->tran_id;
                                $id = $ledger_id;
                                if ($value->ledger_dr != $id)
                                    $other_user=$this->Account_model->get_one_user($value->ledger_dr);
                                if ($value->ledger_cr != $id)
                                    $other_user=$this->Account_model->get_one_user($value->ledger_cr);
                                
                                if($value->ref_id==1)
                                    $va="Credit Sales";
                                if($value->ref_id==2)
                                    $va="Credit Purchase";
                                if($value->ref_id==3)
                                    $va="Receipt";
                                if($value->ref_id==4)
                                    $va="Payment";
                                ?>
                                <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?>
                                    id="<?php echo $rowid; ?>">
                                    <td><?php echo $value->entry_date ?></td>
                                    <td><?php echo "ff"; ?></td>
                                    <td><?php echo $va; ?></td>
                                    <td><?php echo $value->fin_year_id ?></td>
                                    <td><?php echo $other_user[0]->user_name; ?></td>
                                    <?php if ($value->ledger_dr == $id) { ?>
                                        <td><?php echo $value->amount ?></td>
                                    <?php } else { ?>
                                        <td></td>
                                    <?php } ?>
                                    <?php if ($value->ledger_cr == $id) { ?>
                                        <td><?php echo $value->amount ?></td>
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

