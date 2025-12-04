<?php
    include "conn.php";
    $role =  $_SESSION["role"];
    
?>

<div class="sidebar">
                <?php
                    if($role == "staff"){
                        echo "<header>STAFF</header>";        
                    }elseif($role == "admin"){
                        echo "<header>ADMIN</header>";        
                    } ?>
                <label for=""></label>
                <ul>
                    <li><a href="s_home.php" >HOME</a></li>
                    <li><a href="s_pov.php">OVER VIEW</a></li>
                    <li><a href="s_senarai_pengguna.php" >urus pengguna</a></li>
                    <li><a href="s_senarai_buku.php">SENARAI BUcKU</a></li>
                    <?php if($role == "admin"){ ?>
                            <li><a href="s_senarai_staff.php">senarai staff</a></li>
                        <?php } ?>
                    <li><a href="s_senarai_full_rekot.php">RECORD BUKU</a></li>
                    <li><a href="s_senarai_buku_lambat.php">lambat hantar</a></li>
            
                    <li><a href="s_edit_profil.php" >EDIT PROFIL</a></li>
                    <li><a href="logout.php" >LOGOUT</a></li>
                </ul>
</div>