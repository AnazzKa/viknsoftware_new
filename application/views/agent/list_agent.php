
    <div class="row wrapper border-bottom white-bg page-heading">
        <strong><?php echo $this->session->userdata("msg") ?></strong>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Agent View</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Slno</th>
                                    <th>Agent ID</th>
                                    <th>Agent Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $count = 0;
                                foreach ($all_agent as $value) {
                                $count++;
                                $rowid = $value->agent_id;
                                $agent_id_new = $value->agent_id_new;
                                $agent_name = $value->agent_name;
                                $address = $value->address;
                                $email = $value->email;
                                $phone = $value->phone;
                                $password	 = $value->password	;
                                ?>
                                <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?> id="<?php echo $rowid; ?>">
                                    <td class="center"><?php echo $count ?></td>
                                    <td class="center"><?php echo $agent_id_new ?></td>
                                    <td class="center"><?php echo $agent_name ?></td>
                                    <td class="center"><?php echo $address ?></td>
                                    <td class="center"><?php echo $email ?></td>
                                    <td class="center"><?php echo $phone ?></td>
                                    <td class="center"><?php echo $password	 ?></td>
                                    <td class="center">
                                        <a onclick="return confirm('Are You Sure Want To Delete...')" href="<?php echo base_url ?>list_agent?delete=<?php echo $rowid ?>"
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>create_agent?edit=<?php echo $rowid ?>"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
                                    </td>
                                </tr>
                                <?php } ?>


                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Slno</th>
                                    <th>Agent ID</th>
                                    <th>Agent Name</th>
                                    <th>Address</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Password</th>
                                    <th>Action</th>
                                </tr>
                                </tfoot>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

