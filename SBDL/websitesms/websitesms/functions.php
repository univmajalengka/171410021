<?php

//koneksi ke database
//$conn = mysqli_connect("localhost", "root", "", "sms_gateway");
include 'koneksi.php';
//fungsi query
function query($query)
{
    global $con;
    $result = mysqli_query($con, $query);
    $rows = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $rows[] = $row;
    }
    return $rows;
}




//fungsi registrasi
function registrasi($data)
{
    global $con;

    $username = strtolower(stripslashes($data["username"]));
    $password = mysqli_real_escape_string($con, $data["password"]);
    $password2 = mysqli_real_escape_string($con, $data["password2"]);

    //cek username sudah ada atau belum
    $result = mysqli_query($con, "SELECT username FROM user WHERE username='$username'");
    if (mysqli_fetch_assoc($result)) {
        echo "<script>
                alert('username sudah terdaftar!');
            </script>";
        return false;
    }

    //cek konfirmasi password
    if ($password !== $password2) {
        echo "<script>
                alert('konfirmasi password tidak sesuai!');
            </script>";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    //tambah userbaru
    mysqli_query($con, "INSERT INTO user VALUES('','$username','$password')");

    return mysqli_affected_rows($con);
}


//fungsi login
function login($data)
{
    global $con;

    if (isset($_POST["login"])) {

        $username = $data["username"];
        $password = $data["password"];

        $result = mysqli_query($con, "SELECT * FROM user WHERE username='$username'");


        //cek username
        if (mysqli_num_rows($result) === 1) {

            //cek password
            $row = mysqli_fetch_assoc($result);
            if (password_verify($password,  $row["password"])) {

                //set session
                $_SESSION["username"] = $username;

                header("Location: index.php");
                exit;
            }
        }
        $_SESSION["error"] = "<script>
            alert('username / password salah');
        </script>";
        // $_SESSION["error"] = "<p style='color:red; font-style:italic;'>username / password salah</p>";
    }
    return mysqli_affected_rows($con);
}

    function hapus($id) {
        global $con;
        mysqli_query($con, "DELETE FROM pbk WHERE id = $id");
        return mysqli_affected_rows($con);

    }
    function hapusgroup($id) {
        global $con;
        mysqli_query($con, "DELETE FROM pbk_group WHERE id = $id");
        return mysqli_affected_rows($con);

    }
    function hapusused($id) {
        global $con;
        mysqli_query($con, "DELETE FROM sms_used WHERE id_sms_used = $id");
        return mysqli_affected_rows($con);

    }
    function hapusinbox($id) {
        global $con;
        mysqli_query($con, "DELETE FROM user_inbox WHERE id_inbox = $id");
        return mysqli_affected_rows($con);

    }
    function hapusoutbox($id) {
        global $con;
        mysqli_query($con, "DELETE FROM user_outbox WHERE id_outbox = $id");
        return mysqli_affected_rows($con);

    }
    function hapussett($id) {
        global $con;
        mysqli_query($con, "DELETE FROM user_setting WHERE id_user = $id");
        return mysqli_affected_rows($con);

    }


?>
