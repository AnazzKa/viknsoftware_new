    <div class="row wrapper border-bottom white-bg page-heading">
        <strong><?php echo $this->session->userdata("msg") ?></strong>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>ADD Payments</h5>
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
                                <label>Payment No:</label>
                                <input type="text" class="form-control" value="<?php  echo rand(1000,10000); ?>" name="payment_no">

                            </div>
                            <div class="form-group">
                                <label>Date :</label>
                                <input type="date" name="date" value="" required class="form-control" />

                            </div>
                            <div class="form-group col-md-6">
                                <label>Payment Into</label>
                                <select name="payment_into"  class="form-control">
                                    <option>Please Select Account Type</option>
                                    <?php
                                    $data['agent']=$this->Account_model->get_single_user('S');
                                    foreach ($data['agent'] as $value) {
                                        ?>
                                        <option value="<?php echo $value->account_id ?>"><?php echo $value->user_name ?></option>
                                    <?php } ?>
                                    <?php
                                    $data['agent']=$this->Account_model->get_single_user('F');
                                    foreach ($data['agent'] as $value) {
                                        ?>
                                        <option value="<?php echo $value->account_id ?>"><?php echo $value->user_name ?></option>
                                    <?php } ?>
                                    
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Payment From</label>
                                <select name="payment_from"  class="form-control">
                                    <?php
                                    $data['agent']=$this->Account_model->get_single_user('O');
                                    $count = 0;
                                    foreach ($data['agent'] as $value) {
                                        $count++;
                                        ?>
                                        <option value="<?php echo $value->account_id ?>"><?php echo $value->user_name ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="form-group col-md-6">
                                <label>Amount</label>
                                <input type="text" name="amount" id="amount" placeholder="Amount" value="" class="form-control">
                            </div>
                            <div class="form-group col-md-6">
                                <label>Receive Discount</label>
                                <input type="text" name="discount" onkeyup="get_total(this.value);" placeholder="Receive Discount Amount" value="" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Total</label>
                                <label>Rs: <span id="total"></span></label></b>

                            </div>
                            <div class="form-group">
                                <label>Narration</label>
                                <textarea placeholder="Narration" name="Narration" value="" class="form-control"></textarea>
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