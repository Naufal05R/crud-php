<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tabel PHP Saya</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
</head>
<body style="background-image: url(abstract-bg.jpg); background-size: cover; background-attachment: fixed; background-repeat: no-repeat; background-position: center;">
    <div class="container my-5">
   
        <h2 class="text-warning">Data Siswa</h2>
        <br>
        <table class="table">
            <thead> 
                <tr class="text-light">
                    <th class="bg-success bg-opacity-25 text-light">ID</th>
                    <th class="bg-success bg-opacity-25 text-light">Nama</th>
                    <th class="bg-success bg-opacity-25 text-light">Email</th>
                    <th class="bg-success bg-opacity-25 text-light">No. Telephone</th>
                    <th class="bg-success bg-opacity-25 text-light">Alamat</th>
                    <th class="bg-success bg-opacity-25 text-light">Waktu Pembuatan</th>
                    <th class="bg-success bg-opacity-25 text-light">Modifikasi</th>
                </tr>
            </thead>
            <tbody class="text-body">
                <?php
                $servername = "localhost:3307";
                $username = "root";
                $password = "";
                $database = "myshop";

                // Create connection
                $connection = new mysqli($servername, $username, $password, $database);

                // Check connection
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                // read all row from database table 
                $sql = "SELECT * FROM clients";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                // Read data of each row
                while($row = $result->fetch_assoc()) { 
                    echo "
                    <tr>
                    <td class='text-light'>$row[id]</td>
                    <td class='text-light'>$row[name]</td>
                    <td class='text-light'>$row[email]</td>
                    <td class='text-light'>$row[phone]</td>
                    <td class='text-light'>$row[address]</td>
                    <td class='text-light'>$row[created_at]</td>
                    <td class='text-light'>
                        <a class='btn btn-primary btn-sm' href='/CRUD/edit.php?id=$row[id]'>Edit</a>
                        <a class='btn border border-danger btn-sm text-danger' href='/CRUD/delete.php?id=$row[id]'>Delete</a>
                    </td>
                </tr>
                    ";
                }

                ?>

                
            </tbody>
        </table>
        <a class="btn btn-outline-success d-flex border-5 rounded-5 mt-5 justify-content-center col-md-4 mx-auto fw-bold" href="/CRUD/create.php" role="button">Data Baru</a>
    </div>
</body>
</html>