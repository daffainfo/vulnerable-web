<!DOCTYPE html>
<html>
<?php
    include('../config.php');

    $id = $_GET['id'];

	$sql = "SELECT * FROM news WHERE id = $id";
	$result = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_array($result)) {
        $judul = $row['judul'];
        $deskripsi = $row['deskripsi'];
    }
?>
<head>
    <meta charset="UTF-8" />
    <title>PT MENCARI CINTA SEJATI</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        body {
            height: 50%;
            background: url(../images/Background.jpg) fixed no-repeat center top;
        }

        .desc {
            color: white;
        }

        main,
        footer {
            color: white;
        }

        .list-group {
            padding-right: 300px;
            padding-left: 300px;
        }
        .publication-list {
            padding-right: 150px;
            padding-left: 150px;
        }

        h1,
        .nickname {
            color: #17D1AC;
        }

        p {
            font-size: large;
        }

        h1 {
            font-size: 4em;
        }

        .text {
            /* padding-top: 45px;
            padding-bottom: 250px; */
            margin-top: 150px;
        }

        .background-p {
            height: 50%
        }

    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-md navbar-dark">
        <div class="navbar-collapse collapse w-100 order-1 order-md-0 dual-collapse2">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="../"><h2>Home</h2></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href=""><h2>News</h2></a>
                </li>
            </ul>
        </div>
        <div class="mx-auto order-0">
            <a class="navbar-brand mx-auto" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target=".dual-collapse2">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        <div class="navbar-collapse collapse w-100 order-3 dual-collapse2">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link" href="../users"><h2>Log In</h2></a>
                </li>
            </ul>
        </div>
        </nav>
    </header>
    <div class="container">
        <h1 class="text-center mb-5"><?php echo $judul;?></h1>
        <h3 class="desc"><?php echo $deskripsi;?></h3>
    </div>
</body>

</html>