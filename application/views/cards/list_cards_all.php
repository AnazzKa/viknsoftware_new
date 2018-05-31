<div class="row wrapper border-bottom white-bg page-heading">
    <strong><?php echo $this->session->userdata("msg") ?></strong>
</div>
<div class="wrapper wrapper-content animated fadeInRight">
    <div class="row">
        <?php
        $count = 0;
        foreach ($all_cards as $value) {
            $rowid = $value->card_id;
            $card_name = $value->card_name;
            $card_type = $value->card_type;
            $purchase_rate = $value->purchase_rate;
            $sales_rate = $value->sales_rate;
            $pics = $value->pics;
            $details = $value->details;
            $narration = $value->narration;
            $username = $value->username;
            $password = $value->password;
            $link = $value->link;
            $date = $value->date;
            ?>
            <div class="col-lg-3">
                <div class="file-box">
                    <div class="file">
                        <a data-toggle="modal" data-target="#myModal_<?php echo $rowid ?>"
                           href="#myModal_<?php echo $rowid ?>">
                            <span class="corner"></span>

                            <div class="image">
                                <img alt="image" class="img-responsive"
                                     src="<?php echo base_url; ?>cards/<?php echo $pics; ?>">
                            </div>
                            <div class="file-name">
                                <?php echo $card_name; ?>
                                <br/>
                                <small>Added: <?php echo $date; ?></small>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
            <div class="modal fade" id="myModal_<?php echo $rowid ?>" role="dialog">
                <div class="modal-dialog">
                    <!-- Modal content-->
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">Card Name :  <?php echo $card_name; ?></h4>
                        </div>
                        <div class="col-md-6" style="padding-top: 10px">
                            <img alt="image" width="100%" class="img-responsive"
                                 src="<?php echo base_url; ?>cards/<?php echo $pics; ?>">
                        </div>
                        <form action="<?php echo base_url; ?>purchase_card" role="form" method="post">
                            <div class="col-md-6" style="padding-top: 10px">
                                <label>Name : </label><label><?php echo $card_name; ?></label><br>
                                <label>Card Type : </label><label><?php echo $card_type; ?></label><br>
                                <label>Card Prize : </label><label>AED <?php echo $sales_rate ?></label><br>
                                <label>Details :</label><br>

                                <p><?php echo $details; ?></p>

                                <div class="col-md-8">
                                    <div class="input-group">
                                    <span class="input-group-btn">
                                        <button type="button" id="quantity-left-minus_<?php echo $rowid ?>"
                                                class="quantity-left-minus btn btn-danger btn-number" data-type="minus"
                                                data-field="">
                                            <span class="glyphicon glyphicon-minus"></span>
                                        </button>
                                    </span>
                                        <input type="text" id="quantity_<?php echo $rowid ?>" name="quantity"
                                               class="form-control input-number" value="1" min="1" max="100">
                                    <span class="input-group-btn">
                                        <button type="button" id="quantity-right-plus_<?php echo $rowid ?>"
                                                class="quantity-right-plus btn btn-success btn-number" data-type="plus"
                                                data-field="">
                                            <span class="glyphicon glyphicon-plus"></span>
                                        </button>
                                    </span>
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" name="card_id" value="<?php echo $rowid; ?>">
                            <input type="hidden" name="prize" value="<?php echo $sales_rate ?>">
                            <input type="hidden" name="agent_id" value="<?php echo $this->session->userdata('ID'); ?>">

                            <div class="modal-footer">
                                <button type="submit" class="btn btn-warning">Purchase</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
            <script src="<?php echo base_url ?>assets/template/js/jquery-3.1.1.min.js"></script>
            <script>
                $(document).ready(function () {
                    var quantitiy = 0;
                    $('#quantity-right-plus_<?php echo $rowid ?>').click(function (e) {
                        // Stop acting like a button
                        e.preventDefault();
                        // Get the field name
                        var quantity = parseInt($('#quantity_<?php echo $rowid ?>').val());
                        // If is not undefined
                        $('#quantity_<?php echo $rowid ?>').val(quantity + 1);
                        // Increment
                    });
                    $('#quantity-left-minus_<?php echo $rowid ?>').click(function (e) {
                        // Stop acting like a button
                        e.preventDefault();
                        // Get the field name
                        var quantity = parseInt($('#quantity_<?php echo $rowid ?>').val());
                        // If is not undefined
                        // Increment
                        if (quantity > 0) {
                            $('#quantity_<?php echo $rowid ?>').val(quantity - 1);
                        }
                    });
                });

            </script>
        <?php } ?>


    </div>


</div>



