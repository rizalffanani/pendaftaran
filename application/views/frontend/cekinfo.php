<div class="card card-primary card-outline">
  <div class="card-body">

    <div class="row">
      <div class="col-md-7">
        <dl class="row">
          <dt class="col-sm-4">Status</dt>
          <dd class="col-sm-8"><?= $data->status?></dd>
          <dt class="col-sm-4">Bank Tujuan</dt>
          <dd class="col-sm-8">BNI</dd>
          <dt class="col-sm-4">Virtual Account</dt>
          <dd class="col-sm-8">342342342342</dd>
          <dt class="col-sm-4">Kode Daftar</dt>
          <dd class="col-sm-8"><?= $data->kode_daftar?></dd>
          <dt class="col-sm-4">Nama Lengkap</dt>
          <dd class="col-sm-8"><?= $data->nama_ketua?></dd>
          <dt class="col-sm-4">Total Pembayaran</dt>
          <dd class="col-sm-8">Rp.<?= rupiah($data->total_bayar)?></dd>
          <?php if($data->status=="lunas"){?>
          <dt class="col-sm-6">Daftar Online Anda Telah Disetujui</dt>
          <dd class="col-sm-6"></dd>
          <dt class="col-sm-6"><a href="<?= base_url() ?>front/download/<?= $data->kode_daftar?>" class="btn btn-info">Download 3 Lampiran Surat</a></dt>
          <?php }?>
        </dl>

      </div>
      <div class="col-md-2"></div>
      <div class="col-md-3">
        <?php if($data->status=="belum bayar"){?>
        <div class="alert alert-danger alert-dismissible" style="padding: 10px;">
          <br><br>
          <h2 class="text-center" style="text-transform: uppercase;">Belum Bayar</h2>
          <br><br>
        </div>    
        <?php }else{?>    
        <div class="alert alert-success alert-dismissible" style="padding: 10px;">
          <br><br>
          <h2 class="text-center" style="text-transform: uppercase;">Lunas</h2>
          <br><br>
        </div>
        <?php }?>
      </div>
    </div>
  </div>
  <!-- /.card-body -->
</div>
