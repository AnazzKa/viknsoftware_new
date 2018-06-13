<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-md-12">
            <p><B><?php echo $cards[0]->card_type; ?></B></p>
        </div>
        <?php
        $count = 0;
        foreach ($cards as $value) {
            $count++;
            ?>
            <div class="col-md-3">
                <div class="ibox float-e-margins">
                    <form action="" method="post">
                    <div class="ibox-title">
                        <label><?php echo $value->card_name; ?></label>
                       <br>
                        <div class="col-md-6" style="padding-top:6px"><p>Rate of Card </p></div>
                        <div class="col-md-6"><input id="rate" type="text" name="sales_rate" readonly value="<?php echo $value->sales_rate ?>" class="form-control"></div>
                        <p>Number Of Cards</p>
                        <div class="col-md-6">
                            <button type="button" onclick="count_less();" class="btn btn-danger btn-circle pull-left"><i class="glyphicon glyphicon-minus"></i></button>
                            <button type="button" onclick="count_add();" class="btn btn-info btn-circle pull-right"><i class="glyphicon glyphicon-plus"></i></button>
                        </div>
                        <div class="col-md-6"><input id="count" onkeyup="count_add();" name="quantity" type="text" value="1" class="form-control"></div>
                        <br>
                        <div style="padding-top: 10px;padding-bottom: 10px;">
                            <div class="col-md-6"> <p>Total Amount</p></div>
                            <div class="col-md-6"><input id="total" name="total" type="text" readonly value="<?php echo $value->sales_rate ?>" class="form-control"></div>
                        </div>
                        <br>
                        <div style="padding-top: 10px;padding-bottom: 10px;">
                        <select class="form-control" name="type_mode">
                            <option value="cash">Cash</option>
                        </select>
                         </div>
                        <div class="form-group">
                            <input type="submit" value="Save" name="save" class="form-control btn btn-primary">
                        </div>
                    </div>
</form>
                </div>
            </div>
        <?php } ?>


    </div>
</div>

<script>
    function count_less()
    {
        var rate=$('#rate').val();
        var count= $('#count').val();
        var cnt=count-1;
        if(cnt!=0){
        $('#count').val(cnt);
        var tot=rate*cnt;
        $('#total').val(tot);
        }
    }
    function count_add()
    {
        var rate=$('#rate').val();
        var count= parseInt($('#count').val());
        var cnt=count+1;
        $('#count').val(cnt);
        var tot=rate*cnt;
        $('#total').val(tot);
    }
</script>