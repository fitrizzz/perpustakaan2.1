<?php
    session_start();
    include "s_bord.php";

    if(isset($_POST["tambah"])){
        $nama = $_POST["nama"];
        $pass = $_POST["pass"];
        $email = $_POST["email"];

        $sql = "SELECT nama_pengguna FROM pengguna WHERE nama_pengguna = '$nama'";
        $result = mysqli_query($conn,$sql);

        $sql2 = "SELECT staff_nama FROM staff WHERE staff_nama = '$nama'";
        $result2 = mysqli_query($conn,$sql2);

        $sql3 = "SELECT admin_nama FROM staff WHERE admin_nama = '$nama'";
        $result3 = mysqli_query($conn,$sql3);

        if( $row = mysqli_fetch_assoc($result) OR
            $row2 = mysqli_fetch_assoc($result2) OR 
            $row3 = mysqli_fetch_assoc($result3)){
                echo "<script>alert('Username telah ada sila guna yang lain')</script>";
            
            }else{
                $sql = "INSERT INTO staff VALUES ('','$pass','$nama','$email',NULL,NULL,NULL,NULL)";
                mysqli_query($conn,$sql);
            }
    }
?>
<html>
    <body>
        <div class="conten">
            <form action="s_tambah_staff.php" method="POST">
                <label for="nama">nama : </label>
                    <input type="text" name="nama" htmlspecialchars required>
    
                <label for="pass">password : </label>
                    <input type="text" name="pass" htmlspecialchars required>
    
                <label for="email">email : </label>
                    <input type="email" name="email" htmlspecialchars required>
    
                <button type="submit" name="tambah">TAMBAH</button>
            </form>
        </div>
    </body>
</html>