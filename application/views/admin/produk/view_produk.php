<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card border-left-primary py-1 shadow-sm">
                <div class="card-body">
                <div class="row">
                    <div class="col-sm-8">
                        <h5 class="card-title">Management Produk</h5>
                    </div>
                    <div class="col-sm-4">
                        <?php echo $this->session->flashdata('success'); ?>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-10">
                            <span class="card-title text-center">Tambah Produk</span>
                        </div>
                        <div class="col-sm-2">
                            <a href="<?= base_url() ?>tambahproduk" class="btn btn-sm btn-primary text-right">Tambah</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row pt-3">
        <div class="col-sm-12">
            <div class="card shadow-sm">
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <span class="card-title">Table Produk</span>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-bordered" id="tbl_produk">
                                <thead>
                                    <th>Kode Produk</th>
                                    <th>Nama Produk</th>
                                    <th>Stok</th>
                                    <th>Harga Produk</th>
                                    <th>Aksi</th>
                                </thead>
                                <tbody>
                                    <?php 
                                        foreach ($list_produk as $key => $value) {
                                    ?>
                                        <tr>
                                            <td><?= $value->product_kd ?></td>
                                            <td><?= $value->product_name ?></td>
                                            <td><?= $value->quantity ?></td>
                                            <td><?= $value->price ?></td>
                                            <td>
                                                <a href="<?= base_url() ?>perbaruiproduk/<?= $value->product_kd ?>" class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</a>
                                                <a href="<?= base_url() ?>hapusproduk/<?= $value->product_kd ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i> Hapus</a>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

