<?php
    session_start();
    error_reporting(E_ALL^E_NOTICE^E_DEPRECATED);
    $koneksi = mysqli_connect('localhost','root','','informatika');

    $username=$_POST['username'];
    $password=$_POST['password'];
    $submit=$_POST['submit'];

    if($submit){
        $sql="select * from user where Username='$username' and Password='$password'";
        $query=mysqli_query($koneksi,$sql);
        $row=mysqli_fetch_array($query);
        if($row['username']!=""){
            $_SESSION['username']=$row['username'];
            $_SESSION['status']=$row['status'];
            echo "<script>
                        alert('Anda Berhasil Login Sebagai $row[username]');
                        document.location='hasillogin.php';
                  </script>
                ";
        }else{
            echo "<script>
                    alert('Gagal Login');
                    document.location='percobaan3.php';
                  </script>";
        }
    }
?>
<form method='POST' action='percobaan3.php'>
    <p align='center'>
        Username : <input type="text" name="username" id="username"><br>
        Password : <input type="password" name="password" id="password">
        <input type="submit" value="submit" name="submit">
    </p>
</form>