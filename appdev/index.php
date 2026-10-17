<?php require_once 'core/models.php'; $apps = getAllApplications($pdo); ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Aerospace Engineer Job Application</title>
  <style>
    body { font-family: Arial, sans-serif; margin: 30px; background: #f4f6f9; }
    h1, h2 { color: #12355b; }
    form.card { background: #fff; padding: 20px; max-width: 420px; border-radius: 8px; box-shadow: 0 1px 4px rgba(0,0,0,.15); }
    input, select { width: 100%; padding: 7px; box-sizing: border-box; }
    button { background: #12355b; color: #fff; border: 0; padding: 9px 16px; border-radius: 4px; cursor: pointer; }
    button.del { background: #b3261e; }
    table { border-collapse: collapse; width: 100%; background: #fff; margin-top: 10px; }
    th, td { border: 1px solid #ccc; padding: 8px; text-align: left; font-size: 14px; }
    th { background: #12355b; color: #fff; }
    a.btn { background: #2e7d32; color: #fff; padding: 6px 12px; border-radius: 4px; text-decoration: none; }
  </style>
</head>
<body>
  <h1>Aerospace Engineer Job Application</h1>

  <form class="card" action="core/handleForms.php" method="POST">
    <h2>Apply Now</h2>
    <?php $a = []; include 'core/formFields.php'; ?>
    <button type="submit" name="insertBtn">Submit Application</button>
  </form>

  <h2>Submitted Applications</h2>
  <table>
    <tr>
      <th>ID</th><th>Name</th><th>Email</th><th>Phone</th><th>University</th><th>Degree</th>
      <th>Specialization</th><th>Yrs Exp.</th><th>Position</th><th>Date Added</th><th>Actions</th>
    </tr>
    <?php foreach ($apps as $r): ?>
    <tr>
      <td><?= $r['application_id'] ?></td>
      <td><?= htmlspecialchars($r['first_name'] . ' ' . $r['last_name']) ?></td>
      <td><?= htmlspecialchars($r['email']) ?></td>
      <td><?= htmlspecialchars($r['phone']) ?></td>
      <td><?= htmlspecialchars($r['university']) ?></td>
      <td><?= htmlspecialchars($r['degree']) ?></td>
      <td><?= htmlspecialchars($r['specialization']) ?></td>
      <td><?= $r['years_experience'] ?></td>
      <td><?= htmlspecialchars($r['position_applied']) ?></td>
      <td><?= $r['date_added'] ?></td>
      <td>
        <a class="btn" href="edit.php?id=<?= $r['application_id'] ?>">Edit</a>
        <form action="core/handleForms.php" method="POST" style="display:inline" onsubmit="return confirm('Delete this application?');">
          <input type="hidden" name="application_id" value="<?= $r['application_id'] ?>">
          <button class="del" type="submit" name="deleteBtn">Delete</button>
        </form>
      </td>
    </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>
