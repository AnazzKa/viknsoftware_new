<?php $User_type = $this->session->userdata("TYPE"); ?>
<div class="wrapper wrapper-content">
    <div class="row">

        <div class="col-md-12">
            <p><B>Wallet / SUPPLIER</B></p>
        </div>
        <?php
        $count = 0;
        foreach ($suppliers as $value) {
        ?>
        <div class="col-lg-3">
            <a  href="<?php echo base_url ?>supplier_cards?id=<?php echo $value->user_id; ?>">
                <div class="form-group">
                    <button class="btn btn-primary btn-block m-t"><?php echo $value->user_name ?>  </button>
                </div>
            </a>
    </div>
    <?php } ?>

</div>
</div>


