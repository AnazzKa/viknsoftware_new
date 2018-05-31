<div id="page-wrapper" class="gray-bg">
    <div class="row border-bottom">
        <nav class="navbar navbar-static-top white-bg" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
            </div>
            <ul class="nav navbar-top-links navbar-right">

                <li>
                    <a href="<?php echo base_url ?>Dashboard">  <i class="fa fa-sign-out"></i> Dashboard </a>
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
            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Income View</h5>

                    </div>
                    <div class="ibox-content">

                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover dataTables-example" >
                                <thead>
                                <tr>
                                    <th>Income No</th>
                                    <th>Date</th>
                                    <th>Received Into</th>
                                    <th>Received From</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr class="gradeX">
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 4.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td class="center">4</td>
                                    <td class="center">X</td>
                                    <td class="center">X</td>
                                    <td class="center">X</td>
                                    <td class="center">
                                        <a onclick="return confirm('Are You Sure Want To Delete...')" href="<?php echo base_url ?>create_cards_type?delete="
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>create_cards_type?edit="
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                </tr>
                                <tr class="gradeC">
                                    <td>Trident</td>
                                    <td>Internet
                                        Explorer 5.0
                                    </td>
                                    <td>Win 95+</td>
                                    <td class="center">5</td>
                                    <td class="center">C</td>
                                    <td class="center">C</td>
                                    <td class="center">C</td>
                                    <td class="center">
                                        <a onclick="return confirm('Are You Sure Want To Delete...')" href="<?php echo base_url ?>create_cards_type?delete="
                                           class="btn btn-danger"><i class="fa fa-trash-o"></i></a>
                                        <a href="<?php echo base_url ?>create_cards_type?edit="
                                           class="btn btn-primary"><i class="fa fa-pencil"></i></a></td>
                                </tr>

                                </tbody>
                                <tfoot>
                                <tr>
                                    <th>Income No</th>
                                    <th>Date</th>
                                    <th>Received Into</th>
                                    <th>Received From</th>
                                    <th>Amount</th>
                                    <th>Discount</th>
                                    <th>Total</th>
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

