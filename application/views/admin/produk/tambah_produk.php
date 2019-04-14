<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-primary shadow-sm">
                <div class="card-body">
                    <h5>Tambah Produk</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="post" action="<?= base_url() ?>produk/coretambah">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inpt_kd_barang">Kode barang</label>
                                <input type="text" class="form-control" id="inpt_kd_barang" name="val_kd_barang" value="<?= set_value('val_kd_barang') ?>" placeholder="Masukkan Kode Barang">
                                <?php echo form_error('val_kd_barang') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inpt_nama_barang">Nama barang</label>
                                <input type="text" class="form-control" id="inpt_nama_barang" name="val_nama_barang" value="<?= set_value('val_nama_barang') ?>" placeholder="Masukkan Nama barang">
                                <?php echo form_error('val_nama_barang') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inpt_stok_barang">Stok barang</label>
                                <input type="text" class="form-control" id="inpt_stok_barang" name="val_stok_barang" value="<?= set_value('val_stok_barang') ?>" placeholder="Masukkan Stok barang">
                                <?php echo form_error('val_stok_barang') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inpt_harga_barang">Harga barang</label>
                                <input type="text" class="form-control" id="inpt_harga_barang" name="val_harga_barang" value="<?= set_value('val_harga_barang') ?>" placeholder="Masukkan harga barang">
                                <?php echo form_error('val_harga_barang') ?>
                            </div>
                        </div>
                    </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

