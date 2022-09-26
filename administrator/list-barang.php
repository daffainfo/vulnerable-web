<?php
    // session_start();

    include('../config.php');

    if($_SESSION["status_login_admin"] != "true") {
        header("Location: index.php?redirect=dashboard.php&pesan=belum_login");
    }

	$sql = "SELECT id,nama_barang,kuantitas FROM daftar_barang";
	$result = mysqli_query($conn, $sql);
?>

<h1 class="h3 mb-2 text-gray-800">Table Barang</h1>
<div class="my-2"></div>

<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nama Barang</th>
                        <th>Jumlah Stock</th>
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
                            echo "<td>".$row['nama_barang']."</td>";
                            echo "<td>".htmlspecialchars($row['kuantitas'], ENT_QUOTES)."</td>";    
                            echo "<td><a href='edit-barang.php?id=$row[id]' class='btn btn-primary btn-sm'><span class='text'>Edit</span></a>";
                            echo " <a href='delete-barang.php?id=$row[id]' class='btn btn-danger btn-sm'><span class='text'>Delete</span></a>";
                        }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>