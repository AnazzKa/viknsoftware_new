<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right"> 

                <li>                   
                    <i class="fa fa-sign-out"></i> Dashboard
                </li>
                <li>
                    <a href="">
                        <i class="fa fa-user-circle-o"></i>  <?php echo $this->session->userdata("NAME") ?>
                    </a>
                </li>
            </ul>

        </nav>
    </div>
    <div class="row wrapper border-bottom white-bg page-heading">       
        <strong><?php echo $this->session->userdata("msg") ?></strong>                 
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ADD Account Type</h5>
                    </div>
                    
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>Account Type</label> 
                                    <input type="text" name="account_type" placeholder="Account Type" value="<?php if(isset($single_type_item)){echo $single_type_item[0]->account_type;} ?>" class="form-control">
                                    <input type="hidden" name="edit" value="<?php if(isset($edit)){ echo $edit; }?>" />
                                </div>
                                <div>
                                    <button name="<?php echo $btn; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
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
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                    <tr>
                                        <th>Roll No</th>
                                        <th>Type</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $count = 0;
                                    foreach ($all_type_item as $value) {
                                        $count++;
                                        $rowid = $value->account_type_id;
                                        $account_type = $value->account_type;
                                        ?>  
                                        <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?> id="<?php echo $rowid; ?>" >
                                            <td><?php echo $count ?></td>
                                            <td class="center"><?php echo $account_type; ?></td>
                                            <td class="center">
                                                <a onclick="return confirm('Are You Sure Want To Delete...')" href="<?php echo base_url ?>account_type?delete=<?php echo $rowid ?>"
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>account_type?edit=<?php echo $rowid ?>"
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
        </div>


    </div>

