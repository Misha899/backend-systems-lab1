<?php
require 'db.php'; 

$groups = $pdo->query("SELECT * FROM `groups`")->fetchAll();
$teachers = $pdo->query("SELECT * FROM teacher")->fetchAll();
$auditoriums = $pdo->query("SELECT DISTINCT auditorium FROM lesson")->fetchAll();
?>

<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <title>Розклад занять - PDO</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        form { margin-bottom: 20px; padding: 15px; border: 1px solid #ccc; max-width: 400px; }
        select, button { margin-top: 10px; padding: 5px; width: 100%; }
        label { font-weight: bold; }
    </style>
</head>
<body>
    <h2>Розклад занять (Варіант 1)</h2>

    <form action="group.php" method="GET">
        <label>Оберіть групу:</label><br>
        <select name="group_id" required>
            <?php foreach ($groups as $group): ?>
                <option value="<?php echo htmlspecialchars($group['ID_Groups']); ?>">
                    <?php echo htmlspecialchars($group['title']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Показати розклад</button>
    </form>

    <form action="teacher.php" method="GET">
        <label>Оберіть викладача:</label><br>
        <select name="teacher_id" required>
            <?php foreach ($teachers as $teacher): ?>
                <option value="<?php echo htmlspecialchars($teacher['ID_Teacher']); ?>">
                    <?php echo htmlspecialchars($teacher['name']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Показати розклад</button>
    </form>

    <form action="auditorium.php" method="GET">
        <label>Оберіть аудиторію:</label><br>
        <select name="auditorium" required>
            <?php foreach ($auditoriums as $aud): ?>
                <option value="<?php echo htmlspecialchars($aud['auditorium']); ?>">
                    <?php echo htmlspecialchars($aud['auditorium']); ?>
                </option>
            <?php endforeach; ?>
        </select>
        <button type="submit">Показати розклад</button>
    </form>

</body>
</html>