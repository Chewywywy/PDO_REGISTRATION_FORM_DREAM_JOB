<?php
// Shared form inputs. $a = existing record (array) or empty array.
$a = $a ?? [];
function v($a, $k) { return htmlspecialchars($a[$k] ?? ''); }
?>
<p><label>First Name<br><input type="text" name="first_name" value="<?= v($a,'first_name') ?>" required></label></p>
<p><label>Last Name<br><input type="text" name="last_name" value="<?= v($a,'last_name') ?>" required></label></p>
<p><label>Email<br><input type="email" name="email" value="<?= v($a,'email') ?>" required></label></p>
<p><label>Phone<br><input type="text" name="phone" value="<?= v($a,'phone') ?>" required></label></p>
<p><label>University<br><input type="text" name="university" value="<?= v($a,'university') ?>" required></label></p>
<p><label>Degree<br><input type="text" name="degree" placeholder="BS Aerospace Engineering" value="<?= v($a,'degree') ?>" required></label></p>
<p><label>Specialization<br>
  <select name="specialization" required>
    <?php foreach (["Aerodynamics","Propulsion","Avionics","Structures","Flight Dynamics & Control","Spacecraft Systems"] as $s): ?>
      <option <?= ($a['specialization'] ?? '') === $s ? 'selected' : '' ?>><?= $s ?></option>
    <?php endforeach; ?>
  </select></label></p>
<p><label>Years of Experience<br><input type="number" min="0" name="years_experience" value="<?= v($a,'years_experience') ?: 0 ?>" required></label></p>
<p><label>Position Applied For<br>
  <select name="position_applied" required>
    <?php foreach (["Aerospace Engineer","Flight Test Engineer","Propulsion Engineer","Avionics Engineer","Systems Engineer"] as $p): ?>
      <option <?= ($a['position_applied'] ?? '') === $p ? 'selected' : '' ?>><?= $p ?></option>
    <?php endforeach; ?>
  </select></label></p>
