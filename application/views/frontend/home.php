<?php
    // MENGATUR SESSION SURAT MASUK
    if ($this->session->flashdata('message')) { ?>
        <div class="alert alert-warning alert-dismissible">
          <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
          <h5><i class="icon fas fa-exclamation-triangle"></i> Alert!</h5>
          <?= $this->session->flashdata('message') ?>
        </div>
        <?php
    }
?>
<div class="card card-primary card-outline">
  <div class="card-body text-center">
    <p class="card-text">
      <img src="<?php echo base_url() ?>filw/pemandangan.jpeg" style="width: 100%;">
    </p>
  </div>
</div><!-- /.card -->
<div class="col-lg-12">
  <div class="card" style="background: #000080;color: white;">
  <div class="row">
    <div class="col-lg-6">
      <div class="card-body">

        <p class="card-text">
          Some quick example
        </p>
        <p class="card-text">
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
          the bulk of the card's
        </p>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card-body">
        <a href="<?php echo base_url() ?>front/list" class="btn btn-primary float-right" style="margin-top: 15px;">Daftar</a>
      </div>
    </div>
  </div>
  </div>
</div>