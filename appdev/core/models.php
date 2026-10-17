<?php
require_once 'dbConfig.php';

function insertApplication($pdo, $first, $last, $email, $phone, $university, $degree, $spec, $years, $position) {
    $sql = "INSERT INTO job_applications
            (first_name, last_name, email, phone, university, degree, specialization, years_experience, position_applied)
            VALUES (?,?,?,?,?,?,?,?,?)";
    return $pdo->prepare($sql)->execute([$first, $last, $email, $phone, $university, $degree, $spec, $years, $position]);
}

function getAllApplications($pdo) {
    return $pdo->query("SELECT * FROM job_applications ORDER BY date_added DESC")->fetchAll();
}

function getApplicationByID($pdo, $id) {
    $stmt = $pdo->prepare("SELECT * FROM job_applications WHERE application_id = ?");
    $stmt->execute([$id]);
    return $stmt->fetch();
}

function updateApplication($pdo, $id, $first, $last, $email, $phone, $university, $degree, $spec, $years, $position) {
    $sql = "UPDATE job_applications SET first_name=?, last_name=?, email=?, phone=?, university=?,
            degree=?, specialization=?, years_experience=?, position_applied=? WHERE application_id=?";
    return $pdo->prepare($sql)->execute([$first, $last, $email, $phone, $university, $degree, $spec, $years, $position, $id]);
}

function deleteApplication($pdo, $id) {
    return $pdo->prepare("DELETE FROM job_applications WHERE application_id = ?")->execute([$id]);
}
