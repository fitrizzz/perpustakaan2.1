<?php
session_start();
include "conn.php";
include "s_bord.php";
include "s_fungsi.php";
$query = "";
$loop = false;

if(isset($_POST["tambah_pengguna"])){
    $nama = $_POST["nama"];
    $pass = $_POST["pass"];
    $email = $_POST["email"];

    if(semak($nama)){
        echo"<script>alert('USER NAMA TELAH ADA SILA GUNA NAMA YANG LAIN');</script>";
        $loop = true;
    }else{
        $sql = "INSERT INTO pengguna VALUES('','$pass','$nama','$email')";
        mysqli_query($conn,$sql);
        echo"<script>alert('BERJAYA');</script>";
    }
}

if(isset($_POST["cari"])){
    $nama = $_POST["nama"];
    $email = $_POST["email"];

    if($nama != NULL AND $email == NULL){
        $query = "WHERE nama_pengguna LIKE '%$nama%'";

    }elseif($nama == NULL AND $email != NULL){
        $query = "WHERE email LIKE '%$email%'";

    }elseif($nama != NULL AND $email != NULL){
        $query = "WHERE nama_pengguna LIKE '%$nama%' AND
                    email LIKE '%$email%'";
    }
}
?>
<html>

<body>
    <div class="conten">
        <form action="s_senarai_pengguna.php" method="POST">
            <label for="nama">nama : </label><input type="text" name="nama">
            <label for="email">email : </label><input type="text" name="email">
            <button type="submit" name="cari">cari</button>
        </form>
        <br>
        <h2>JADUAL PENGGUNA</h2>

        <button onclick="document.getElementById('lala').show()">TAMBAH PENGGUNA</button>

        <dialog id = "lala">
                <form action="s_senarai_pengguna.php" method="post">            
                    <label for="nama">NAMA : </label>
                        <input type="text" name="nama" required>
                    <label for="pass">PASSWORD :</label>
                        <input type="text" name="pass" required>
                    <label for="email"></label>
                        <input type="text" name="email" required>
                    <button type="submit" name="tambah_pengguna">TAMBAH</button>
                </form>
                <button onclick="document.getElementById('lala').close()">X</button>
        </dialog>

        <table border="5px">
            <tr>
                <th>id</th>
                <th>nama</th>
                <th>password</th>
                <th>email</th>
                <th>UPDATE</th>
                <th>PADAM</th>
            </tr>
            <?php
            $sql = "SELECT * FROM pengguna $query";
            $result = mysqli_query($conn, $sql);

            while ($row = mysqli_fetch_assoc($result)) {
                $id = $row["pengguna_id"];
                $nama = $row["nama_pengguna"];
                $pass = $row["password"];
                $email = $row["email"];
 
                echo "<tr>
                            <th>$id</th>
                            <th>$nama</th> 
                            <th>$pass</th> 
                            <th>$email</th>
                            
                            <th><a href='s_update_pengguna.php?pid=$id'>update</a></th>
                            <th><a href='s_padam_pengguna.php?pid=$id'>padam</a></th>
                        </tr>";
            }
            ?>
        </table>
    </div>
    <script>
        let gg = document.getElementById("lala");

        if(<?= $loop ?>){
            gg.show();
        }
        
    </script>
</body>

</html>