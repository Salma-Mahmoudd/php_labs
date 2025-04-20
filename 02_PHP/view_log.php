<?php
include 'config.php';
?>

<html>

<head>
    <title>Visit Log</title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>

    <?php if (file_exists(VISIT_LOG_FILE)):

        $lines = file(VISIT_LOG_FILE);
        $total = count($lines);
    ?>

        <h3>Visit Logs (<span> <?= $total ?> Visits</span>)</h3>
        <div class="logs-container">
            <?php foreach ($lines as $line):
                list($date, $ip, $email, $name) = explode(",", $line);
            ?>
                <div class="log-box">
                    <p><strong>IP Address:</strong> <?= $ip ?></p>
                    <p><strong>Name:</strong> <?= $name ?></p>
                    <p><strong>Email:</strong> <?= $email ?></p>
                    <p><strong>Visit Date:</strong> <?= $date ?></p>
                </div>
            <?php endforeach; ?>
        </div>

    <?php else: ?>
        <h3>No log file found.</h3>
    <?php endif; ?>

</body>

</html>