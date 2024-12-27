<div class="container">
    <div class="row">
        <div class="col s12">
            <div class="card-panel">
                <!-- alert -->
                <?php if ($this->session->flashdata('info')) { ?>
                    <div class="row" id="alert_box">
                        <div class="col s12 m12">
                            <div class="card green darken-1">
                                <div class="row">
                                    <div class="col s12 m10">
                                        <div class="card-content white-text center">
                                            <p><?php echo $this->session->flashdata('info') ?></p>
                                        </div>
                                    </div>
                                    <div class="col s12 m2">
                                        <i class="mdi-navigation-close icon_style" id="alert_close" ariahidden="true"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <!-- End Alert -->
                <h4 class="header2">Ubah Profil</h4>
                <div class="row ">
                    <form class="col s12" method="post" enctype="multipart/form-data"
                        action="<?php echo base_url(); ?>petugas/profil">
                        <div class="row">
                            <div class="input-field col s12 ">
                                <input type="text" value="<?= $petugas->nama ?>" name="nama"
                                    readonly>
                                <label class="active">Nama</label>
                            </div>
                        </div>

                        <div class="row">
                            <div class="input-field col s12">
                                <input type="email" value="<?= $petugas->email ?>" name="email"
                                    readonly>
                                <label class="active">Email</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <input type="password" name="password" required>
                                <label>Password</label>
                            </div>
                        </div>
                        <div class="row">
                            <div class="input-field col s12">
                                <button class="btn blue waves-effect waves-light right" type="submit"
                                    name="action">Ubah
                                    <i class="mdi-content-send right"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
</div>