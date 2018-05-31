
    <div class="row wrapper border-bottom white-bg page-heading">
        <strong><?php echo $this->session->userdata("msg") ?></strong>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">

            <div class="col-lg-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>Agent Creation</h5>
                    </div>
                </div>
            </div>
            <form role="form" method="post" action="">
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <div class="form-group">
                                <label>Agent ID</label>
                                <input type="text" readonly name="agent_id" value="<?php if(isset($single_agent)){echo $single_agent[0]->agent_id_new;}else{ echo "Vkn".rand(1000,9999); } ?>" class="form-control">
                                <input type="hidden" name="edit" value="<?php if(isset($edit)){ echo $edit; }?>" />
                            </div>
                            <div class="form-group">
                                <label>Agent Name</label>
                                <input type="text" name="agent_name" value="<?php if(isset($single_agent)){echo $single_agent[0]->agent_name;} ?>" placeholder="Agent Name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <textarea placeholder="Address" name="address" class="form-control">
                                    <?php if(isset($single_agent)){echo $single_agent[0]->address;} ?>
                                    </textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="ibox float-e-margins">
                    <div class="ibox-content">
                        <div class="row">
                            <h3 class="m-t-none m-b"></h3>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="email"  value="<?php if(isset($single_agent)){echo $single_agent[0]->email;} ?>"  placeholder="Email"  class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text"  value="<?php if(isset($single_agent)){echo $single_agent[0]->phone;} ?>" placeholder="Phone" name="phone" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" value="<?php if(isset($single_agent)){echo $single_agent[0]->password;} ?>" placeholder="Password" name="password" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>


            </div>
            <div class="col-lg-6">
                <div>
                    <button name="<?php echo $btn; ?>" class="btn btn-sm btn-primary pull-right m-t-n-xs" type="submit">
                        <strong><?php echo $btn; ?></strong>
                    </button>
                </div>
            </div>
                </form>
        </div>


    </div>

