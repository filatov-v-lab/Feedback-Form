<?php
// PHP logic to get headers
$protocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host     = $_SERVER['HTTP_HOST'] ?? 'localhost';
$url      = $protocol . '://' . $host . $_SERVER['REQUEST_URI'];
$headers = get_headers($url, 1);
$output = '';
if ($headers && is_array($headers)) {
    foreach ($headers as $key => $value) {
        if (is_array($value)) {
            foreach ($value as $v) {
                $output .= (is_string($key) ? "$key: " : '') . $v . "\n";
            }
        } else {
            $output .= (is_string($key) ? "$key: " : '') . $value . "\n";
        }
    }
} else {
    $output = "Не удалось получить заголовки. Проверьте доступность сервера.";
}
?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Заголовки ответа — МосПолитех</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600&family=Unbounded:wght@400;600;700&family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }
    :root {
      --black:  #0d0d0d;
      --dark:   #1c1c1c;
      --mid:    #555;
      --light:  #e8e8e8;
      --white:  #f9f9f9;
      --radius: 10px;
    }
    html, body {
      min-height: 100vh;
      background: var(--white);
      color: var(--black);
      font-family: 'Geologica', sans-serif;
      display: flex;
      flex-direction: column;
    }
    header {
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 20px 48px;
      border-bottom: 1.5px solid var(--light);
      background: #fff;
      position: sticky;
      top: 0;
      z-index: 100;
    }
    .logo-wrap { display: flex; align-items: center; gap: 14px; text-decoration: none; }
    .logo-img { width: 54px; height: 54px; object-fit: contain; flex-shrink: 0; }
    .logo-text { display: flex; flex-direction: column; line-height: 1.15; }
    .logo-text span:first-child {
      font-family: 'Unbounded', sans-serif;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--black);
    }
    .logo-text span:last-child { font-size: 10px; color: var(--mid); letter-spacing: .04em; }
    .header-title {
      font-family: 'Unbounded', sans-serif;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .05em;
      text-transform: uppercase;
      color: var(--dark);
      text-align: center;
      position: absolute;
      left: 50%;
      transform: translateX(-50%);
    }
    header .spacer { width: 168px; }
    main {
      flex: 1;
      display: flex;
      align-items: flex-start;
      justify-content: center;
      padding: 60px 24px;
    }
    .card {
      background: #fff;
      border: 1.5px solid var(--light);
      border-radius: 18px;
      padding: 52px 56px;
      width: 100%;
      max-width: 680px;
      box-shadow: 0 8px 40px rgba(0,0,0,.06);
    }
    .card-heading {
      font-family: 'Unbounded', sans-serif;
      font-size: 22px;
      font-weight: 700;
      color: var(--black);
      margin-bottom: 6px;
    }
    .url-tag {
      display: inline-block;
      background: var(--black);
      color: #fff;
      font-family: 'JetBrains Mono', monospace;
      font-size: 11px;
      padding: 4px 10px;
      border-radius: 5px;
      margin-bottom: 28px;
      word-break: break-all;
    }
    textarea {
      width: 100%;
      min-height: 360px;
      padding: 18px 20px;
      border: 1.5px solid var(--light);
      border-radius: var(--radius);
      background: #0d0d0d;
      color: #c8f7c5;
      font-family: 'JetBrains Mono', monospace;
      font-size: 13px;
      line-height: 1.7;
      resize: vertical;
      outline: none;
    }
    .btn-back {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      padding: 13px 28px;
      background: var(--black);
      color: #fff;
      border: none;
      border-radius: var(--radius);
      font-family: 'Unbounded', sans-serif;
      font-size: 12px;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
      text-decoration: none;
      cursor: pointer;
    }
    footer {
      border-top: 1.5px solid var(--light);
      padding: 18px 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
    }
    footer p { font-size: 11px; color: var(--mid); letter-spacing: .04em; text-transform: uppercase; }
    @media (max-width: 640px) {
      header { padding: 16px 20px; }
      .header-title { display: none; }
      .card { padding: 32px 24px; }
      header .spacer { display: none; }
    }
  </style>
</head>
<body>
<header>
  <a class="logo-wrap" href="index.php">
    <img class="logo-img" src="logo.png" alt="Московский Политех">
    <div class="logo-text">
      <span>Московский</span>
      <span>Политех</span>
    </div>
  </a>
  <span class="header-title">Заголовки ответа</span>
  <div class="spacer"></div>
</header>
<main>
  <div class="card">
    <h1 class="card-heading">get_headers()</h1>
    <p style="font-size: 13px; color: var(--mid); margin-bottom: 8px;">Заголовки HTTP-ответа, полученные с адреса:</p>
    <span class="url-tag"><?= htmlspecialchars($url) ?></span>
    <textarea readonly><?= htmlspecialchars($output) ?></textarea>
    <div style="margin-top: 30px;"><a class="btn-back" href="index.php">← Вернуться к форме</a></div>
  </div>
</main>
<footer>
  <p>Задание для самостоятельной работы «Feedback form»</p>
</footer>
</body>
</html>
