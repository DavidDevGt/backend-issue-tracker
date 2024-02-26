<?php
$issue = $data['issue'];
?>

<!DOCTYPE html>
<html>
<head>
    <title>Incidencia Resuelta</title>
</head>
<body>
    <h1>¡Incidencia Resuelta!</h1>
    <p>La incidencia <strong><?php echo htmlspecialchars($issue->getTitle()); ?></strong> ha sido resuelta.</p>
    <p>Descripción: <?php echo nl2br(htmlspecialchars($issue->getDescription())); ?></p>
</body>
</html>
