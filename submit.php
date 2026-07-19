<?php
$secret = "6Lfs_lotAAAAAMs0sjLX_FAe048yx6w4PjrzpvJq";  // ←ここにあなたのシークレットキー
$response = $_POST["g-recaptcha-response"];
$remoteip = $_SERVER["REMOTE_ADDR"];

$verify = file_get_contents(
  "https://www.google.com/recaptcha/api/siteverify?secret={$secret}&response={$response}&remoteip={$remoteip}"
);
$result = json_decode($verify);

if ($result->success) {
    echo "OK: ロボットではありません";
} else {
    echo "NG: reCAPTCHA失敗";
}
?>
