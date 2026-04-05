<?php
require 'db.php';

if (isset($_GET['auditorium'])) {
    $auditorium = $_GET['auditorium'];

    $sql = "SELECT week_day, lesson_number, disciple, type 
            FROM lesson 
            WHERE auditorium = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$auditorium]);
    $schedule = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Розклад аудиторії</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 500px; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <a href="index.php">← Назад</a>
    <h2>Розклад для аудиторії: <?php echo htmlspecialchars($_GET['auditorium'] ?? ''); ?></h2>

    <?php if (!empty($schedule)): ?>
        <table>
            <tr>
                <th>День</th><th>Пара</th><th>Дисципліна</th><th>Тип</th>
            </tr>
            <?php foreach ($schedule as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['week_day']); ?></td>
                    <td><?php echo htmlspecialchars($row['lesson_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['disciple']); ?></td>
                    <td><?php echo htmlspecialchars($row['type']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Занять у цій аудиторії не знайдено.</p>
    <?php endif; ?>
</body>
</html>