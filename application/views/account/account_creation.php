<div class="row wrapper border-bottom white-bg page-heading">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <div class="col-lg-7">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>Create New Account</h5>
                </div>

                <div class="ibox-content">
                    <div class="row">

                        <form role="form" method="post" action="">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>Account Name</label>
                                    <input type="text" name="account_name" required placeholder="Account Name"
                                           value="<?php
                                           if (isset($single_item)) {
                                               echo $single_item[0]->account_name;
                                           }
                                           ?>" class="form-control">
                                    <input type="hidden" name="edit" value="<?php
                                    if (isset($edit)) {
                                        echo $edit;
                                    }
                                    ?>"/>
                                </div>
                                <div class="form-group">
                                    <label>Select Account Type</label>
                                    <select required name="account_type" id="account_type" class="form-control"
                                            onchange="get_deatils()">
                                        <option value="">Please Select Account Type</option>
                                        <?php
                                        foreach ($all_type_item as $value) {
                                            ?>
                                            <option <?php if (isset($single_item)) {
                                                if ($single_item[0]->account_type == $value->account_type_id) {
                                                    ?> selected <?php
                                                }
                                            }
                                            ?>  value="<?php echo $value->account_type_id; ?>"><?php echo $value->account_type; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                                <div class="form-group" id="address" <?php if (!isset($single_item)) {
                                    echo "hidden";
                                } else {
                                    if ($single_item[0]->address == "") {
                                        echo "hidden";
                                    }
                                } ?> >
                                    <label>Address</label>
                                    <textarea name="address" id="txt_add" placeholder="Address"
                                              class="form-control"><?php
                                        if (isset($single_item)) {
                                            echo $single_item[0]->address;
                                        }
                                        ?> </textarea>
                                </div>
                                <div class="form-group" id="chk" <?php if (!isset($single_item)) {
                                    echo "hidden";
                                } else {
                                    if ($single_item[0]->address == "") {
                                        echo "hidden";
                                    }
                                } ?> >

                                   <?php if($this->session->userdata('ID')==1){ ?> <input type="checkbox" ><label> Card Creation Power </label> <?php } ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group" id="phone" <?php if (!isset($single_item)) {
                                    echo "hidden";
                                } else {
                                    if ($single_item[0]->phone == "") {
                                        echo "hidden";
                                    }
                                } ?> >
                                    <label>Phone</label>
                                    <input type="text" name="phone" id="txt_phn" placeholder="Phone" value="<?php
                                    if (isset($single_item)) {
                                        echo $single_item[0]->phone;
                                    }
                                    ?>" class="form-control"/>
                                </div>
                                <div class="form-group" id="email" <?php if (!isset($single_item)) {
                                    echo "hidden";
                                } else {
                                    if ($single_item[0]->email == "") {
                                        echo "hidden";
                                    }
                                } ?> >
                                    <label>Email</label>
                                    <input type="text" name="email" id="txt_ema" placeholder="Email" value="<?php
                                    if (isset($single_item)) {
                                        echo $single_item[0]->email;
                                    }
                                    ?>" class="form-control"/>
                                </div>
                                <div class="form-group" id="password" <?php if (!isset($single_item)) {
                                    echo "hidden";
                                } else {
                                    if ($single_item[0]->password == "") {
                                        echo "hidden";
                                    }
                                } ?> >
                                    <label>Password</label>
                                    <input type="text" name="password" id="txt_pas" placeholder="Password" value="<?php
                                    if (isset($single_item)) {
                                        echo $single_item[0]->password;
                                    }
                                    ?>" class="form-control"/>
                                </div>
                                <div class="form-group" id="commission" <?php if (!isset($single_item)) {
                                    echo "hidden";
                                } else {
                                    if ($single_item[0]->commission_per_card == "0.00") {
                                        echo "hidden";
                                    }
                                } ?> >
                                    <label>Commission Per Card</label>
                                    <input type="text" name="commission_per_card" id="txt_com" value="<?php
                                    if (isset($single_item)) {
                                        echo $single_item[0]->commission_per_card;
                                    }
                                    ?>" placeholder="Commission Per Card" class="form-control"/>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <button name="<?php echo $btn; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs"
                                        type="submit">
                                    <strong><?php echo $btn; ?></strong>
                                </button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-5">
            <div class="ibox float-e-margins">
                <div class="ibox-title">
                    <h5>List Account Type</h5>

                </div>
                <div class="ibox-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover dataTables-example">
                            <thead>
                            <tr>
                                <th>Roll No</th>
                                <th>Customer</th>
                                <th>Account Type</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            $count = 0;
                            foreach ($all_item as $value) {
                                $count++;
                                $rowid = $value->account_id;
                                $account_name = $value->account_name;
                                $account_type = $value->account_type;
                                ?>
                                <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?>
                                    id="<?php echo $rowid; ?>">
                                    <td><?php echo $count ?></td>
                                    <td><?php echo $account_name ?></td>
                                    <td class="center"><?php echo $account_type; ?></td>
                                    <td class="center">
                                        <a onclick="return confirm('Are You Sure Want To Delete...')"
                                           href="<?php echo base_url ?>create_account?delete=<?php echo $rowid ?>"
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>create_account?edit=<?php echo $rowid ?>"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                    </td>
                                </tr>
                            <?php } ?>
                            </tbody>

                        </table>
                    </div>

                </div>
            </div>


        </div>
        <div class="col-lg-3">
        <div id="index" class="collapse out">
            <div class="panel panel-default">
                <a href="<?php echo base_url ?>account_type">
                    <div class="panel-body">
                        Create Account Type<i class="fa fa-chevron-right" style="float: right;"></i>
                    </div>
                </a>
                <a href="<?php echo base_url ?>create_account">
                    <div class="panel-body">
                        View Accounts<i class="fa fa-chevron-right" style="float: right;"></i>
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

<script type="text/javascript">
    function get_deatils() {
        var val = $('#account_type option:selected').html();
        if (val == 'Agent' || val == 'Customer') {
            $('#address').show();
            $('#phone').show();
            $('#email').show();
            $('#password').show();
            $('#commission').show();
            $('#chk').show();
        }
        else if (val == 'Current Liability') {
            $('#address').show();
            $('#phone').show();
            $('#email').show();
            $('#password').hide();
            $('#commission').hide();
            $('#txt_com').val('');
        }
        else {
            $('#address').hide();
            $('#phone').hide();
            $('#email').hide();
            $('#password').hide();
            $('#commission').hide();
            $('#txt_com').val('');
            $('#txt_phn').val('');
            $('#txt_add').val('');
            $('#txt_ema').val('');
            $('#txt_pas').val('');
        }
    }
</script>