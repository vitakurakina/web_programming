<?php 
session_start();

$message = '';
$image_enabled = true;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['image_check']) && $_POST['image_check'] === '') {
        $image_enabled = false;
        $message = '<p class="error">Включите отображение изображений в браузере.</p>';
    } else {
        if (isset($_POST['answer']) && isset($_SESSION['captcha_code'])) {
            $user_answer = trim($_POST['answer']);
            $captcha_code = $_SESSION['captcha_code'];
            
            if ($user_answer === $captcha_code) {
                $message = '<p class="success">Символы с изображения введены корректно.</p>';
            } else {
                $message = '<p class="error">Символы с изображения введены некорректно. Попробуйте еще раз.</p>';
            }
            
            unset($_SESSION['captcha_code']);
        } else {
            $message = '<p class="error">Введите символы с изображения.</p>';
        }
    }
}
?>
<!DOCTYPE HTML>
<html>

<head>
  <meta charset="utf-8">
  <title>Регистрация</title>
</head>

<body>
  <h1>Регистрация</h1>
  <form action="" method="post">
    <div>
      <img src="noise-picture.php">
    </div>
    <div>
      <label>Введите строку</label>
      <input type="text" name="answer" size="6" required>
    </div>
    <input type="submit" value="Подтвердить">
  </form>
    <?php 
      if (!empty($message)) {
          echo $message;
      }
    ?>
</body>

</html>