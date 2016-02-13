<div id="message">
  <div align="center">
    <h1>
      <?php
// Initialize the session.
// If you are using session_name("something"), don't forget it now!
/*session_start();*/
$lasturl=$_SESSION["utolso_lap"];
// Unset all of the session variables.

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!

// Finally, destroy the session.
$_SESSION["uid"]=0;
unset ( $_SESSION["uid"] );
unset($_COOKIE['ckuser']);
setcookie('ckuser', NULL,time()-42000, '/', '.'.$domain);
//$_SESSION["utolso_lap"]=$homeurl;
  	header("Location:".$homeurl);
		$noerrorep=1;
?>

      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      You logged out.<br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      </h1>
  </div>
</div>