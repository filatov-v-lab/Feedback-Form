<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Форма обратной связи — МосПолитех</title>
  <link rel="preconnect" href="https://fonts.googleapis.com" />
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
  <link href="https://fonts.googleapis.com/css2?family=Geologica:wght@300;400;500;600&family=Unbounded:wght@400;600;700&display=swap" rel="stylesheet" />
  <style>
    *, *::before, *::after { box-sizing: border-box; margin: 0; padding: 0; }

    :root {
      --black:   #0d0d0d;
      --dark:    #1c1c1c;
      --mid:     #555;
      --light:   #e8e8e8;
      --white:   #f9f9f9;
      --radius:  10px;
    }

    html, body {
      min-height: 100vh;
      background: var(--white);
      color: var(--black);
      font-family: 'Geologica', sans-serif;
      display: flex;
      flex-direction: column;
    }

    /* HEADER */
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

    .logo-wrap {
      display: flex;
      align-items: center;
      gap: 14px;
      text-decoration: none;
    }

    /* Updated to use <img> tag as requested */
    .logo-img { width: 54px; height: 54px; object-fit: contain; flex-shrink: 0; }

    .logo-text {
      display: flex;
      flex-direction: column;
      line-height: 1.15;
    }
    .logo-text span:first-child {
      font-family: 'Unbounded', sans-serif;
      font-size: 11px;
      font-weight: 700;
      letter-spacing: .06em;
      text-transform: uppercase;
      color: var(--black);
    }
    .logo-text span:last-child {
      font-size: 10px;
      color: var(--mid);
      letter-spacing: .04em;
    }

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

    /* MAIN */
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
      max-width: 580px;
      box-shadow: 0 8px 40px rgba(0,0,0,.06);
      animation: slideUp .5s ease both;
    }

    @keyframes slideUp {
      from { opacity: 0; transform: translateY(24px); }
      to   { opacity: 1; transform: translateY(0); }
    }

    .card-heading {
      font-family: 'Unbounded', sans-serif;
      font-size: 22px;
      font-weight: 700;
      color: var(--black);
      margin-bottom: 6px;
    }
    .card-sub {
      font-size: 13px;
      color: var(--mid);
      margin-bottom: 36px;
    }

    .field { margin-bottom: 22px; }

    label {
      display: block;
      font-size: 12px;
      font-weight: 500;
      letter-spacing: .05em;
      text-transform: uppercase;
      color: var(--mid);
      margin-bottom: 8px;
    }

    input[type="text"],
    input[type="email"],
    select,
    textarea {
      width: 100%;
      padding: 13px 16px;
      border: 1.5px solid var(--light);
      border-radius: var(--radius);
      background: var(--white);
      font-family: 'Geologica', sans-serif;
      font-size: 14px;
      color: var(--black);
      transition: border-color .2s, box-shadow .2s;
      outline: none;
      appearance: none;
    }
    input:focus, select:focus, textarea:focus {
      border-color: var(--black);
      box-shadow: 0 0 0 3px rgba(0,0,0,.07);
    }

    select {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='8' viewBox='0 0 12 8'%3E%3Cpath d='M1 1l5 5 5-5' stroke='%23555' stroke-width='1.5' fill='none' stroke-linecap='round'/%3E%3C/svg%3E");
      background-repeat: no-repeat;
      background-position: right 14px center;
      padding-right: 40px;
      cursor: pointer;
    }

    textarea { resize: vertical; min-height: 120px; }

    /* Checkboxes */
    .checkbox-group { display: flex; gap: 28px; flex-wrap: wrap; }
    .checkbox-item { display: flex; align-items: center; gap: 10px; cursor: pointer; user-select: none; }
    .checkbox-item input[type="checkbox"] {
      width: 20px; height: 20px;
      border: 1.5px solid var(--light);
      border-radius: 5px;
      background: var(--white);
      appearance: none;
      cursor: pointer;
      transition: background .15s, border-color .15s;
      flex-shrink: 0;
      position: relative;
    }
    .checkbox-item input[type="checkbox"]:checked {
      background: var(--black);
      border-color: var(--black);
    }
    .checkbox-item input[type="checkbox"]:checked::after {
      content: '';
      position: absolute;
      top: 3px; left: 6px;
      width: 5px; height: 9px;
      border: 2px solid #fff;
      border-top: none;
      border-left: none;
      transform: rotate(45deg);
    }
    .checkbox-item span { font-size: 14px; color: var(--dark); font-weight: 400; }

    /* Divider */
    .divider { border: none; border-top: 1.5px solid var(--light); margin: 30px 0; }

    /* Buttons & links */
    .btn-submit {
      width: 100%;
      padding: 15px;
      background: var(--black);
      color: #fff;
      border: none;
      border-radius: var(--radius);
      font-family: 'Unbounded', sans-serif;
      font-size: 13px;
      font-weight: 600;
      letter-spacing: .06em;
      text-transform: uppercase;
      cursor: pointer;
      transition: background .2s, transform .15s;
      margin-bottom: 16px;
    }
    .btn-submit:hover  { background: #333; }
    .btn-submit:active { transform: scale(.98); }

    .link-page2 {
      display: block;
      text-align: center;
      font-size: 13px;
      color: var(--mid);
      text-decoration: none;
      letter-spacing: .03em;
      transition: color .2s;
    }
    .link-page2:hover { color: var(--black); text-decoration: underline; }

    /* FOOTER */
    footer {
      border-top: 1.5px solid var(--light);
      padding: 18px 48px;
      display: flex;
      align-items: center;
      justify-content: center;
      background: #fff;
    }
    footer p {
      font-size: 11px;
      color: var(--mid);
      letter-spacing: .04em;
      text-transform: uppercase;
    }

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

  <span class="header-title">Feedback form</span>
  <div class="spacer"></div>
</header>

<main>
  <div class="card">
    <h1 class="card-heading">Обратная связь</h1>
    <p class="card-sub">Напишите нам — мы ответим как можно скорее</p>

    <form action="https://httpbin.org/post" method="POST">

      <div class="field">
        <label for="username">Имя пользователя</label>
        <input type="text" id="username" name="username"
               placeholder="Введите ваше имя" required />
      </div>

      <div class="field">
        <label for="email">E-mail</label>
        <input type="email" id="email" name="email"
               placeholder="example@mospolytech.ru" required />
      </div>

      <div class="field">
        <label for="appeal_type">Тип обращения</label>
        <select id="appeal_type" name="appeal_type" required>
          <option value="" disabled selected>Выберите тип...</option>
          <option value="complaint">Жалоба</option>
          <option value="suggestion">Предложение</option>
          <option value="gratitude">Благодарность</option>
        </select>
      </div>

      <div class="field">
        <label for="message">Текст обращения</label>
        <textarea id="message" name="message"
                  placeholder="Опишите ваше обращение подробно..." required></textarea>
      </div>

      <div class="field">
        <label>Вариант ответа</label>
        <div class="checkbox-group">
          <label class="checkbox-item">
            <!-- Fixed checkbox names to use array notation -->
            <input type="checkbox" name="reply_method[]" value="sms" />
            <span>СМС</span>
          </label>
          <label class="checkbox-item">
            <input type="checkbox" name="reply_method[]" value="email" />
            <span>E-mail</span>
          </label>
        </div>
      </div>

      <hr class="divider" />

      <button type="submit" class="btn-submit">Отправить</button>
      <a class="link-page2" href="page2.php">Перейти на страницу 2 →</a>

    </form>
  </div>
</main>

<footer>
  <p>Задание для самостоятельной работы «Feedback form»</p>
</footer>

</body>
</html>
