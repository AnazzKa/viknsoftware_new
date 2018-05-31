
    <div class="row wrapper border-bottom white-bg page-heading">       
        <strong><?php echo $this->session->userdata("msg") ?></strong>                 
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ADD Cards Type Creation</h5>
                    </div>
                    
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>Card Type</label>
                                    <input type="text" name="card_type" placeholder="Card Type" value="<?php if(isset($single_type_item)){echo $single_type_item[0]->card_type;} ?>" class="form-control">
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
                        <h5>List Card Type</h5>

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
                                        $rowid = $value->card_type_id;
                                        $card_type = $value->card_type;
                                        ?>  
                                        <tr <?php if ($count % 2 == 0) { ?> class="gradeC" <?php } else { ?>class="gradeA"<?php } ?> id="<?php echo $rowid; ?>" >
                                            <td><?php echo $count ?></td>
                                            <td class="center"><?php echo $card_type; ?></td>
                                            <td class="center">
                                                <a onclick="return confirm('Are You Sure Want To Delete...')" href="<?php echo base_url ?>create_cards_type?delete=<?php echo $rowid ?>"
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>create_cards_type?edit=<?php echo $rowid ?>"
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a>
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
                    <a data-toggle="collapse" data-target="#index" href="#index">
                        <button type="button" class="btn btn-info btn-circle btn-xl pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                    </a>
                </div>
            </div>
        </div>


    </div>

