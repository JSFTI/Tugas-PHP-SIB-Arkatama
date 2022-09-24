<?php
  session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tugas PHP</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet"> 
  <link href="/normalize.css" rel="stylesheet" />
  <link href="/style.css" rel="stylesheet" />
</head>
<body>
  <div class="container">
    <div class="shadow mx-auto mt-20 w-full md:w-3/5 lg:w-1/3 p-5 rounded">
      <form action="/loop.php" method="POST" class="flex flex-col gap-5">
        <div class="flex gap-2 flex-col">
          <label class="block text-gray-700" for="string">Masukkan String</label>
          <input
            id="string"
            class="w-full p-2 rounded shadow-sm focus:border-blue-600 focus:shadow-blue-600 transition-all outline-none"
            placeholder="Kata-Kata"
            type="text"
            name="string"
            value="<?= $_SESSION['string'] ?? '' ?>"
            required
          />
        </div>
        <div class="flex gap-2 flex-col">
          <label class="block text-gray-700" for="loops">Masukkan Pengulangan</label>
          <input
            id="loops"
            class="w-full p-2 rounded shadow-sm focus:border-blue-600 focus:shadow-blue-600 transition-all outline-none"
            type="number"
            name="loops"
            value="<?= $_SESSION['loops'] ?? '' ?>"
            required
          />
        </div>
        <div class="ml-auto">
          <button type="submit" class="btn">
            Tampilkan
          </button>
        </div>
      </form>
    </div>

    <div class="flex flex-col gap-3 mt-5">
      <?php for($i = 1; $i <= $_SESSION['loops']; $i++): ?>
        <div class="shadow mx-auto w-full md:w-3/5 lg:w-1/3 p-5 rounded">
          <?= "{$_SESSION['string']} $i" ?>
        </div>
      <?php endfor; ?>
    </div>

    <?php if(array_key_exists('loops', $_SESSION) && array_key_exists('string', $_SESSION)): ?>
      <div class="text-center mt-5">
        <?= $_SESSION['loops'] ?> merupakan bilangan <?= $_SESSION['loops'] % 2 === 0 ? 'genap' : 'ganjil' ?>
      </div>

      <form action="/loop.php" method="POST" class="text-center mt-5">
        <input type="hidden" name="reset" value="1" />
        <button class="bg-transparent border-none underline font-semibold cursor-pointer">Reset</button>
      </form>
    <?php endif; ?>
  </div>
</body>
</html>