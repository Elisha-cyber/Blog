<?php

function emptyInputSignup($name, $email, $username, $pwd, $pwdRepeat): bool
{

    if (empty($name) || empty($email) || empty($username) || empty($pwd) || empty($pwdRepeat)){
        $result=true;
    }
    else{
        $result=false;
    }

    return $result;
}

function invalidUid($username): bool
{

    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $result=true;
    }
    else{

        $result=false;
    }
    return $result;
}

function invalidEmail($email): bool
{

    if (!filter_var($email,FILTER_VALIDATE_EMAIL)){
        $result=true;
    }
    else{
        $result =false;
    }
    return $result;
}

function pwdMatch($pwd, $pwdRepeat): bool
{
    if ($pwd!==$pwdRepeat){
        $result =true;
    }
    else{
        $result =false;
    }
    return $result;
}

/**
 * @param $conn
 * @param $username
 * @param $email
 * @return array|false|string[]|void|null
 */
function uidExists($conn, $username, $email)
{
$sql ="SELECT * FROM users WHERE usersUid=? OR usersEmail=?;";
$stmt =mysqli_stmt_init($conn);

if (!mysqli_stmt_prepare($stmt,$sql)){
    header("location: ../signup.php?error=stmtfailed");
    exit();
}
mysqli_stmt_bind_param($stmt, "ss",$username, $email);
mysqli_stmt_execute($stmt);

$resultData= mysqli_stmt_get_result($stmt);
    if ($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }else{
        return false;
    }

    mysqli_stmt_close($stmt);

}

function createUser($conn, $name, $email, $username, $pwd)
{
    $sql ="INSERT INTO users(usersName,usersEmail,usersUid,usersPwd) VALUES(?,?,?,?);";
    $stmt =mysqli_stmt_init($conn);

    if (!mysqli_stmt_prepare($stmt,$sql)){
        header("location: ../signup.php?error=stmtfailed");
        exit();
    }
    $hashedPwd =password_hash($pwd,PASSWORD_DEFAULT);
    mysqli_stmt_bind_param($stmt,"ssss",$name, $email, $username, $hashedPwd);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    $userCreated = userCreated($conn, $name,$email , $username, $pwd);
    session_start();
    $_SESSION["userid"] = $userCreated["usersId"];
    $_SESSION["username"] = $userCreated["usersName"];
    $_SESSION["useremail"] = $userCreated["usersEmail"];
    $_SESSION["useruid"] = $userCreated["usersUid"];
    $_SESSION["userpwd"] = $userCreated["usersPwd"];
    header("location: ../index.php?error=none");//angalia kwa undani
    exit();

}
function emptyInputLogin($username, $pwd): bool
{
    if (empty($username) || empty($pwd)){
        $result =true;
    }
    else{
        $result =false;
    }
    return $result;
}
function loginUser($conn, $username, $pwd)
{
    $uidExists = uidExists($conn, $username, $username);

    if ($uidExists === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    }

    $pwdHashed = $uidExists["usersPwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);
    if ($checkPwd === false) {
        header("location: ../login.php?error=wronglogin");
        exit();
    } else if ($checkPwd === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["usersId"];
        $_SESSION["useruid"] = $uidExists["usersUid"];
        header("location: ../index.php");
        exit();
    }
}

