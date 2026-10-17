<?php
require_once 'models.php';

function field($key) { return trim($_POST[$key] ?? ''); }

if (isset($_POST['insertBtn'])) {
    insertApplication($pdo, field('first_name'), field('last_name'), field('email'), field('phone'),
        field('university'), field('degree'), field('specialization'), (int)field('years_experience'), field('position_applied'));
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['updateBtn'])) {
    updateApplication($pdo, (int)$_POST['application_id'], field('first_name'), field('last_name'), field('email'), field('phone'),
        field('university'), field('degree'), field('specialization'), (int)field('years_experience'), field('position_applied'));
    header("Location: ../index.php");
    exit;
}

if (isset($_POST['deleteBtn'])) {
    deleteApplication($pdo, (int)$_POST['application_id']);
    header("Location: ../index.php");
    exit;
}
