    <div class="row wrapper border-bottom white-bg page-heading">
        <strong><?php echo $this->session->userdata("msg") ?></strong>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ADD Customer</h5>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <form action="" role="form" method="post" >
                            <div class="form-group">
                                <label>Full Name:</label>
                                <input type="text" class="form-control" value="" name="full_name">
                            </div>
                            <div class="form-group">
                                <label>Phone:</label>
                                <input type="number" class="form-control" value="" name="phone_number">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea placeholder="Addresss" name="address" value="" class="form-control"></textarea>
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


        </div>


    </div>

    <script>
        function get_total(dis)
        {
            var amount=$('#amount').val();
            var tot=amount-dis;
            $('#total').text(tot);
        }
    </script>