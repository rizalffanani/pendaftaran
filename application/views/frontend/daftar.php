<form action="<?php echo base_url() ?>front/kirim" method="post" class="card card-primary card-outline">
  <div class="card-header">
    <h3 class="card-title">
      Diisi oleh Ketua
    </h3>
  </div>
  <!-- /.card-header -->
  <div class="card-body">
    <div class="form-group">
      <label for="namaketua">Nama Ketua</label>
      <input type="text" name="namaketua" id="namaketua" class="form-control"  placeholder="Nama Ketua" required>
    </div>
    <div class="form-group">
      <label for="jenisids">Jenis Identitas</label>
      <select name="jenisids" id="jenisids" class="form-control" required>
        <option>Pilih</option>
        <option value="KK">KK</option>
        <option value="KTM">KTM</option>
        <option value="KTP">KTP</option>
        <option value="PASSPORT">PASSPORT</option>
      </select>
    </div>
    <div class="form-group">
      <label for="noidentitas">No Identitas (KK/KTP/KTM/PASSPORT)</label>
      <input type="number" name="noidentitas" id="noidentitas" class="form-control"  placeholder="No Identitas" required>
    </div>
    <div class="form-group">
      <label for="tujuan">Pilih Tujuan</label>
      <select name="tujuan" id="tujuan" class="form-control" required>
        <option>Pilih No Identitas</option>
        <option value="Tujuan1">Tujuan 1</option>
        <option value="Tujuan2">Tujuan 2</option>
      </select>
    </div>
    <div class="form-group">
      <label for="tlp">No Telepon</label>
      <input type="number" name="tlp" id="tlp" class="form-control"  placeholder="No Telepon" required>
    </div>
    <div class="form-group">
      <label for="alamat">Alamat Lengkap</label>
      <textarea name="alamat" id="alamat" class="form-control" required></textarea>
    </div>
    <div class="form-group">
      <label for="email">Email</label>
      <input type="email" name="email" id="email" class="form-control"  placeholder="Email" required>
    </div>
    <div class="form-group">
      <label for="tglberangkat">Tanggal Berangkat</label>
      <input type="date" name="tglberangkat" id="tglberangkat" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="tglpulang">Tanggal Pulang</label>
      <input type="date" name="tglpulang" id="tglpulang" class="form-control" required>
    </div>
    <div class="row">
      <div class="col-sm-6">
        <div class="form-group">
            <label for="tglpulang">Anggota Regu</label>
        </div>
      </div> 
      <div class="col-sm-6">
        <a onclick="tambah()" style="color: white" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah Anggota</a>
      </div>
    </div>
    <table class="table table-bordered">
        <thead>                  
          <tr>
            <th>Nama</th>
            <th>No Telp</th>
            <th>Jenis Identitas</th>
            <th>No Identitas</th>
            <th>Jenis Kelamin</th>
            <th style="width: 40px"></th>
          </tr>
        </thead>
        <tbody id="table">
          <tr id="tr1">
              <td>
                  <input type="text" class="form-control" name="namaanggota[]" id="namaanggota1" placeholder="Nama Anggota" required/>
              </td>
              <td>
                  <input type="number" class="form-control" name="tlpanggota[]" id="tlpanggota1" placeholder="No Telp" min="0"  mk1="1"  required/>
              </td>
              <td>
                  <select name="jenisid[]" id="jenisid1" class="form-control" required>
                    <option>Jenis Identitas</option>
                    <option value="KK">KK</option>
                    <option value="KTM">KTM</option>
                    <option value="KTP">KTP</option>
                    <option value="PASSPORT">PASSPORT</option>
                  </select>
              </td>
              <td>
                  <input type="number" class="form-control" name="noid[]" id="noid1" placeholder="No Identitas" min="0" required/>
              </td>
              <td>
                <div class="row">
                  <div class="col-lg-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin[0]" value="L" required>
                      <label class="form-check-label">L</label>
                    </div>
                  </div>
                  <div class="col-lg-6">
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="jeniskelamin[0]" value="P">
                      <label class="form-check-label">P</label>
                    </div>
                  </div>
                </div>
              </td>
              <td></td>
          </tr>
        </tbody>
    </table>
  </div>

  <div class="card-footer text-center">
    <button type="submit" class="btn btn-info float-right">Kirim Formulir</button>
  </div>
  <!-- /.card-body -->
</form>
<script type="text/javascript">
  function tambah() {
    let lastRow = table.rows[table.rows.length-1];
    let lastCell = lastRow.cells[lastRow.cells.length-5];
    var myarr = lastCell.innerHTML.split("mk");
    var myarrs = myarr[1].split("=");
    var hitung = (parseInt(myarrs[0])+1);
    if (hitung<11) {
      var newRow=document.getElementById('table').insertRow();
      newRow.id = "tr"+hitung;
      $.ajax({
          type:"POST",
          url:"<?=site_url('front/tabel');?>", 
          data : {a:hitung},  
          success: function(data){   
              newRow.innerHTML=data;
          }  
      });
    }
  }
  function hapus(a) {
      var row = a.parentNode.parentNode;
    row.parentNode.removeChild(row);
  }
</script>