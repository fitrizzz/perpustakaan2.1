<?php
    session_start();
    include "s_bord.php";
    include "s_fungsi.php";
    $query = "";



    if(isset($_POST["cari"])){
        $nama = $_POST["nama"];
        $email = $_POST["email"];

        if($nama != NULL AND $email == NULL){
            $query = "WHERE staff_nama LIKE '%$nama%'";
    
        }elseif($nama == NULL AND $email != NULL){
            $query = "WHERE email LIKE '%$email%'";

        }elseif($nama == NULL AND $email == NULL){
            $query = "WHERE staff_nama LIKE '%$nama%' AND email LIKE '%$email%'";   
        }
    }
?>
<html>
    <body>
        <div class="conten">

            <form action="s_senarai_staff.php" method="post">
                <label for="nama">NAMA : </label>
                    <input type="text" name="nama">
                <label for="email">EMAIL : </label>
                    <input type="" name="email"> 
                <button type="submit" name="cari">CARI</button>
            </form>
            <br>
            <!-- <a href="s_tambah_staff.php">tambah staff</a> -->

            <button onclick="document.getElementById('tambah').show();">TAMBAH</button>
            <dialog id="tambah" >
                        <form action="s_senarai_staff.php" method="POST">
                            <label for="nama">nama : </label>
                                <input type="text" name="nama" htmlspecialchars required>
        
                            <label for="pass">password : </label>
                                <input type="text" name="pass" htmlspecialchars required>
        
                            <label for="email">email : </label>
                                <input type="email" name="email" htmlspecialchars required>
        
                                <button type="submit" name="tambah">TAMBAH</button>
                                <button onclick="document.getElementById('tambah').close();">X</button>
                        </form>
                    </dialog>
            


            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>nama</th>
                    <th>password</th>
                    <th>email</th>
                    <th>UPDATE</th>
                    <th>PADAM</th>
                </tr>
                <?php 
                    $sql = "SELECT staff_id,staff_nama,password,email FROM staff $query";
                    $result = mysqli_query($conn,$sql);
                    while($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <th><?=$row["staff_id"] ?></th>
                            <th><?=$row["staff_nama"] ?></th>
                            <th><?=$row["password"] ?></th>
                            <th><?=$row["email"] ?></th>
                            <th><a href="s_update_staff.php?staffid=<?=$row["staff_id"]?>">UPDATE</a></th>
                            <th><a href="s_padam_staff.php?staffid=<?=$row["staff_id"]?>">PADAM</a></th>
                        </tr>
                    <?php } ?>
            </table>
        </div>
        <script>
        <?php if( $loop ){?>
                    document.getElementById('tambah').show();
                <?php } ?>
        </script>
    </body>
</html>