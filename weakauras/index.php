<?php
// Directory where your txt files are stored
$dir = __DIR__ . "/weakauras";
$files = glob($dir . "/*.txt");

$auras = [];
foreach ($files as $file) {
    $filename = basename($file);
    $content = file_get_contents($file);
    $auras[] = [
        "name" => $filename,
        "string" => trim($content)
    ];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>WeakAura Strings</title>
  <script>
    function copyToClipboard(id) {
      const text = document.getElementById(id).innerText;
      navigator.clipboard.writeText(text).then(() => {
        alert("Copied to clipboard!");
      });
    }
  </script>
  <style>
    body {
      font-family: Arial, sans-serif;
      background: #1e1e2f;
      color: #eee;
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      padding: 20px;
    }
    .card {
      background: #2c2c3e;
      border-radius: 12px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.5);
      padding: 20px;
      margin: 10px;
      width: 400px;
      word-wrap: break-word;
    }
    .card h3 {
      margin-top: 0;
      color: #ffd700;
    }
    .copy-btn {
      background: #4cafef;
      border: none;
      padding: 10px 15px;
      border-radius: 8px;
      color: white;
      cursor: pointer;
      margin-top: 10px;
    }
    .copy-btn:hover {
      background: #3a9fd6;
    }
    pre {
      background: #1a1a2b;
      padding: 10px;
      border-radius: 8px;
      max-height: 200px;
      overflow-y: auto;
      white-space: pre-wrap;
    }
  </style>
</head>
<body>
  <?php foreach ($auras as $index => $aura): ?>
    <div class="card">
      <h3><?= htmlspecialchars($aura['name']) ?></h3>
      <pre id="aura<?= $index ?>"><?= htmlspecialchars($aura['string']) ?></pre>
      <button class="copy-btn" onclick="copyToClipboard('aura<?= $index ?>')">Copy</button>
    </div>
  <?php endforeach; ?>
</body>
</html>
