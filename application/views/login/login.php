<div class="col-md-12 register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="<?= base_url() ?>/assets/koneksiku01.png" width="100%">
                    </div>
                    <div class="col-md-9 register-right">
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade active show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3 class="register-heading">Login</h3>
                                <form method="post" action="<?= site_url('login/proses_login') ?>">
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="username" name="username" class="form-control" placeholder="Username">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" id="password" name="password" class="form-control" placeholder="Password">
                                        </div>
                                        <input type="submit" class="btnRegister cek-voucher" value="Cek Voucher">
                                    </div>

                                </div>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>

                
</div>	
