<?php
require 'db.php';

if (isset($_GET['group_id'])) {
    $groupId = $_GET['group_id'];

    $sql = "SELECT lesson.week_day, lesson.lesson_number, lesson.disciple, lesson.type, lesson.auditorium 
            FROM lesson 
            JOIN lesson_groups ON lesson.ID_Lesson = lesson_groups.FID_Lesson2 
            WHERE lesson_groups.FID_Groups = ?";
    
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$groupId]);
    $schedule = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Розклад групи</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
        .back-link { display: inline-block; margin-bottom: 20px; }
    </style>
</head>
<body>
    <a href="index.php" class="back-link">← Назад до вибору</a>
    <h2>Розклад для обраної групи</h2>

    <?php if (!empty($schedule)): ?>
        <table>
            <tr>
                <th>День</th><th>Пара</th><th>Дисципліна</th><th>Тип</th><th>Аудиторія</th>
            </tr>
            <?php foreach ($schedule as $row): ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['week_day']); ?></td>
                    <td><?php echo htmlspecialchars($row['lesson_number']); ?></td>
                    <td><?php echo htmlspecialchars($row['disciple']); ?></td>
                    <td><?php echo htmlspecialchars($row['type']); ?></td>
                    <td><?php echo htmlspecialchars($row['auditorium']); ?></td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Для цієї групи занять не знайдено.</p>
    <?php endif; ?>
</body>
</html>