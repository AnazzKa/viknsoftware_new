
    <div class="row wrapper border-bottom white-bg page-heading">
        <strong><?php echo $this->session->userdata("msg") ?></strong>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-7">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ADD GPS Direction</h5>
                    </div>

                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <form role="form" method="post" action="">
                                <div class="form-group">
                                    <label>GPS Direction</label>
                                    <input type="text" name="" placeholder="GPS Direction" value="" class="form-control">
                                    <input type="hidden" name="edit" value="" />
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
                        <h5>List GPS Direction</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Roll No</th>
                                    <th>GPS Direction</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>

                                    <tr class="gradeA"" >
                                        <td>52</td>
                                        <td class="center">ds</td>
                                        <td class="center">
                                            <a onclick="return confirm('Are You Sure Want To Delete...')" href=""
                                               class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                            <a href="<?php echo base_url ?>account_type?edit="
                                               class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                        </td>
                                    </tr>

                                </tbody>

                            </table>
                        </div>

                    </div>
                </div>





            </div>
        </div>


    </div>

