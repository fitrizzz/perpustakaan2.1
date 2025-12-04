<?php
    function semak($nama){
        include "conn.php";
        $sql = "SELECT nama_pengguna FROM pengguna WHERE nama_pengguna = '$nama'";
        $result = mysqli_query($conn,$sql);

        $sql2 = "SELECT staff_nama FROM staff WHERE staff_nama = '$nama'";
        $result2 = mysqli_query($conn,$sql2);

        $sql3 = "SELECT admin_nama FROM staff WHERE admin_nama = '$nama'";
        $result3 = mysqli_query($conn,$sql3);

        if(mysqli_fetch_assoc($result) OR
            mysqli_fetch_assoc($result2) OR 
            mysqli_fetch_assoc($result3)){
                
                return true;
            }else{  
                return false;
            }
    }
 
    if(isset($_POST["tambah"])){
        $nama = $_POST["nama"];
        $pass = $_POST["pass"];
        $email = $_POST["email"];
        
        if(semak($nama)){
            // echo "<script>alert('lol')</script>";
            // $loop = true;
            tambah_staff(true);
            
        }else{
            echo "<script>alert('hore')</script>";
            
        }
        
    }else{
    }
    

    function tambah_staff($loop = false){ ?>

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
            <script>

                <?php if( $loop ){?>
                    document.getElementById('tambah').show();
                <?php } ?>
            </script>

    <?php }
    
?>

