<?php
    // session_start();

    include('../config.php');

    if($_SESSION["status_login_admin"] != "true") {
        header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
    }

	$sql = "SELECT * FROM news";
	$result = mysqli_query($conn, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Table Berita</h1>
<a href="tambah-news.php" class="btn btn-success btn-icon-split">
    <span class="icon text-white-50">
        <i class="fas fa-plus"></i>
    </span>
    <span class="text">Tambah Berita</span>
</a>
<div class="my-2"></div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Judul Berita</th>
                        <th>Deskripsi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Stock</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    <?php  
                        while($row = mysqli_fetch_array($result)) {
                            echo "<tr>";
                            echo "<td>".$row['id']."</td>";
                            echo "<td>".htmlspecialchars($row['judul'], ENT_QUOTES)."</td>";
                            echo "<td>".htmlspecialchars($row['deskripsi'], ENT_QUOTES)."</td>";    
                            echo "<td><a href='edit-news.php?id=$row[id]' class='btn btn-primary btn-sm'><span class='text'>Edit</span></a>";
                            echo " <a href='delete-news.php?id=$row[id]' class='btn btn-danger btn-sm'><span class='text'>Delete</span></a>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>