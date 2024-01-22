<?php
include("../class/user.php");
include("../sql/SQL_API.php");

session_start();
if (!isset($_SESSION["user"])) header('location:session_login.php');
$user = $_SESSION['user'];
?>
<img src='data:<?php echo $user->setIconType(); ?>;base64,<?php echo base64_encode($user->setIconData()); ?>' /><br>
Hello,
<?php
echo $user->getname() . "<br>";
echo $user->getaccount() . "<br>";
echo $user->getpassword() . "<br>";
echo "<hr>";
?>
<button><a href="session_logout.php">logout</a></button>