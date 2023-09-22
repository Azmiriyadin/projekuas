<!doctype html>
<html lang="en">
<title>M AZMI ZAMZAMI RIYADIN</title> 
<link rel="icon" href="a.png">
<head>
    <!doctype html>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
    </body>

</html>
<style>
    body {
        background-image: url("danau.jpg");
        background-size: cover;

    }

    .wrap {
        width: 300px;
        margin: auto;
        padding: 20px;
        background-color: white;
        border-radius: 10px;
        text-align: center;
        box-shadow: 0px 0px 15px 5px;
        margin-top: 100px;
        margin-bottom: 10px;
    }
</style>
<style>
    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        user-select: none
    }

    @media (min-width:768px) {
        .bd-placeholder-img-lg {
            font-size: 3.5rem
        }
    }
</style>
</head>

<body class="bg-default">
<?php
function tgl_indo($d){
	$bulan = array (
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $d);
	return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}?>
    <div class="container">
        <main>
            <div class="py-5 text-center">
                <img class="d-block mx-auto mb-4" src="a1.png" alt="" width="300" height="300">
            </div>
            <div class="row g-5">
                <div class="col-md-6 col-lg-6 order-md-last">
                    <h4 class="d-flex justify-content-between align-items-center mb-3">
                        <span class="text-dark">DATA MAHASISWA</span>
                        <span class="badge bg-primary rounded-pill"><?= mysqli_num_rows($data) ?></span>
                    </h4>
                    <ul class="list-group mb-3">
                        <?php while ($d = mysqli_fetch_array($data)) : ?>
                        <li class="list-group-item d-flex justify-content-between lh-sm"
                            style="background-color: <?= $d['jk'] == 'Laki-laki' ? '#16a085' : '#9b59b6' ?>; color: white;">
                            <div>
                                <h6 class="my-0"><?= $d['nama_depan'] ?> <?= $d['nama_belakang'] ?></h6>
                                <small><?= tgl_indo($d['tgl_lahir']) ?></small>
                            </div><span><a href="?status=kelola&nim=<?= $d['nim'] ?>"><i class="bi-gear"
                                        style="font-size: 2rem; color: white;"></i></a></span>
                        </li>
                        <?php endwhile ?>
                    </ul>
                </div>
                <div class="col-md-6 col-lg-6">
                    <h4 class="mb-3 dark">FORM EDIT DATA</h4>
                    <form method="POST">
                        <div class="row g-3">
                            <div class="col-md-5">
                                <label class="form-label text-dark">NIM</label>
                                <input type="text" class="form-control" name="txtnim" required maxlength="10"
                                    placeholder="ex: 12345" value="<?= $edit['nim'] ?? '' ?>">
                            </div>
                            <div class="col-md-7">
                                <label class="form-label text-dark">Tanggal Lahir</label>
                                <input type="date" class="form-control" name="txttgllahir" required value="<?= $edit['tgl_lahir'] ?? '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Nama Depan</label>
                                <input type="text" class="form-control" name="txtnamadepan" required
                                    placeholder="ex: Ahmad" value="<?= $edit['nama_depan'] ?? '' ?>">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label text-dark">Nama Belakang</label>
                                <input type="text" class="form-control" name="txtnamabelakang" required
                                    placeholder="ex: Suparjo" value="<?= $edit['nama_belakang'] ?? '' ?>">
                            </div>
                            <div class="col-md-12">
                                <label class="form-label text-dark">Jenis Kelamin</label>
                                <select class="form-control" name="cbojk" required>
                                    <option value="Laki-laki" <?= ($edit['jk'] ?? '') == 'Laki-laki' ? 'selected' : '' ?>>Laki-Laki</option>
                                    <option value="Perempuan" <?= ($edit['jk'] ?? '') == 'Perempuan' ? 'selected' : '' ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <br>
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success btn-lg"  >SIMPAN</button>
                            <button type="reset" class="btn btn-danger btn-lg"> BATAL</button>
                            <a href="index.php" class="btn btn-primary btn-lg"> REFRESH </a>
                            <?php if ($edit ?? '') : ?>
                                <button type="submit" class="btn btn-danger btn-lg" name="deletethis" value="iyo">HAPUS</button>
                            <?php endif ?>
                        </div>
                </div>
        </main>

        </footer>
    </div>

    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
    
    <footer class="my-5 pt-5 text-primary text-center h4">
                <p class="mb-1">&copy; MUHAMMAD AZMI ZAMZAMI RIYADIN</p>
</body>

</html>