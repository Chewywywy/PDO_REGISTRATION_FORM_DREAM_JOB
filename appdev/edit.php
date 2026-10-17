<?php
require_once 'core/models.php';
$a = getApplicationByID($pdo, (int)($_GET['id'] ?? 0));
if (!$a) { die("Application not found."); }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Application</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f9; }
    form { background: #fff; padding: 20px; max-width: 420px; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,.15); }
    input, select { width: 100%; padding: 7px; box-sizing: border-box; }
    button { background: #12355b; color: #fff; border: 0; padding: 9px 16px; border-radius: 4px; cursor: pointer; }
  </style>
</head>
<body>
  <h1>Edit Application #<?= $a['application_id'] ?></h1>
  <form action="core/handleForms.php" method="POST">
    <input type="hidden" name="application_id" value="<?= $a['application_id'] ?>">
    <?php include 'core/formFields.php'; ?>
    <button type="submit" name="updateBtn">Update</button>
    <a href="index.php">Cancel</a>
  </form>
</body>
</html>
