
    <form action="<?php echo $action; ?>" method="post">
	    <div class="form-group">
            <label for="varchar">Nama Ketua <?php echo form_error('nama_ketua') ?></label>
            <input type="text" class="form-control" name="nama_ketua" id="nama_ketua" placeholder="Nama Ketua" value="<?php echo $nama_ketua; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Noid Ketua <?php echo form_error('noid_ketua') ?></label>
            <input type="text" class="form-control" name="noid_ketua" id="noid_ketua" placeholder="Noid Ketua" value="<?php echo $noid_ketua; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tujuan <?php echo form_error('tujuan') ?></label>
            <input type="text" class="form-control" name="tujuan" id="tujuan" placeholder="Tujuan" value="<?php echo $tujuan; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Tlp Ketua <?php echo form_error('tlp_ketua') ?></label>
            <input type="text" class="form-control" name="tlp_ketua" id="tlp_ketua" placeholder="Tlp Ketua" value="<?php echo $tlp_ketua; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Email <?php echo form_error('email') ?></label>
            <input type="text" class="form-control" name="email" id="email" placeholder="Email" value="<?php echo $email; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Berangkat <?php echo form_error('tgl_berangkat') ?></label>
            <input type="text" class="form-control" name="tgl_berangkat" id="tgl_berangkat" placeholder="Tgl Berangkat" value="<?php echo $tgl_berangkat; ?>" />
        </div>
	    <div class="form-group">
            <label for="date">Tgl Pulang <?php echo form_error('tgl_pulang') ?></label>
            <input type="text" class="form-control" name="tgl_pulang" id="tgl_pulang" placeholder="Tgl Pulang" value="<?php echo $tgl_pulang; ?>" />
        </div>
	    <div class="form-group">
            <label for="enum">Status <?php echo form_error('status') ?></label>
            <input type="text" class="form-control" name="status" id="status" placeholder="Status" value="<?php echo $status; ?>" />
        </div>
	    <div class="form-group">
            <label for="varchar">Total Bayar <?php echo form_error('total_bayar') ?></label>
            <input type="text" class="form-control" name="total_bayar" id="total_bayar" placeholder="Total Bayar" value="<?php echo $total_bayar; ?>" />
        </div>
	    <input type="hidden" name="kode_daftar" value="<?php echo $kode_daftar; ?>" /> 
	    <button type="submit" class="btn btn-primary"><?php echo $button ?></button> 
	    <a href="<?php echo site_url('pendaftaran') ?>" class="btn btn-default">Cancel</a>
	</form>