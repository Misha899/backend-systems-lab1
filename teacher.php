<?php
require 'db.php';

if (isset($_GET['teacher_id'])) {
    $teacherId = $_GET['teacher_id'];

    $sql = "SELECT lesson.week_day, lesson.lesson_number, lesson.disciple, lesson.type, lesson.auditorium 
            FROM lesson 
            JOIN lesson_teacher ON lesson.ID_Lesson = lesson_teacher.FID_Lesson1 
            WHERE lesson_teacher.FID_Teacher = :tid";
    
    // Тут використовуємо іменований маркер :tid замість знака питання (інший спосіб PDO)
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['tid' => $teacherId]);
    $schedule = $stmt->fetchAll();
}
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Розклад викладача</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        table { border-collapse: collapse; width: 100%; max-width: 600px; margin-top: 20px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: left; }
        th { background-color: #f4f4f4; }
    </style>
</head>
<body>
    <a href="index.php">← Назад</a>
    <h2>Розклад обраного викладача</h2>

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
        <p>Для цього викладача занять не знайдено.</p>
    <?php endif; ?>
</body>
</html>