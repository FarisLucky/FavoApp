<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-primary shadow-sm">
                <div class="card-body">
                    <h5>Edit Produk</h5>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form method="post" action="<?= base_url() ?>produk/coreperbarui">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inpt_kd_barang">Kode barang</label>
                                <input type="text" class="form-control" id="<?= $select_barang[0]['product_kd'] ?>" name="edit_kd_barang" value="<?= $select_barang[0]['product_kd'] ?>" required placeholder="Masukkan Kode Barang" READONLY>
                                <?php echo form_error('val_kd_barang') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="form-group">
                                <label for="inpt_nama_barang">Nama barang</label>
                                <input type="text" class="form-control" id="inpt_nama_barang" name="edit_nama_barang" value="<?= $select_barang[0]['product_name'] ?>" placeholder="Masukkan Nama barang" required>
                                <?php echo form_error('val_nama_barang') ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inpt_stok_barang">Stok barang</label>
                                <input type="number" class="form-control" id="inpt_stok_barang" name="edit_stok_barang" value="<?= $select_barang[0]['quantity'] ?>" placeholder="Masukkan Stok barang" required>
                                <?php echo form_error('val_stok_barang') ?>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="inpt_harga_barang">Harga barang</label>
                                <input type="number" class="form-control" id="inpt_harga_barang" name="edit_harga_barang" value="<?= $select_barang[0]['price'] ?>" placeholder="Masukkan harga barang" required>
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

