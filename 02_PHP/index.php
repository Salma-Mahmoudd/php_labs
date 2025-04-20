<?php
include 'config.php';

$name = htmlspecialchars($_POST["name"] ?? "");
$email = htmlspecialchars($_POST["email"] ?? "");
$message = htmlspecialchars($_POST["message"] ?? "");
$nameErr = $emailErr = $messageErr = "";
$formSuccess = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (empty($_POST["name"]) || strlen($_POST["name"]) > MAX_NAME_LENGTH) {
        $nameErr = ERROR_NAME;
    }

    if (empty($_POST["email"]) || !filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
        $emailErr = ERROR_EMAIL;
    }

    if (empty($_POST["message"]) || strlen($_POST["message"]) > MAX_MESSAGE_LENGTH) {
        $messageErr = ERROR_MESSAGE;
    }

    if (empty($nameErr) && empty($emailErr) && empty($messageErr)) {
        $formSuccess = true;

        $date = date("F j Y g:i a");
        $ip = $_SERVER['REMOTE_ADDR'];
        $logEntry = "$date,$ip,$email,$name\n";
        file_put_contents(VISIT_LOG_FILE, $logEntry, FILE_APPEND);
    }
}
?>
<html>

<head>
    <title> Contact Form </title>
    <link rel="stylesheet" type="text/css" href="style.css" />
</head>

<body>
    <?php if ($formSuccess) : ?>
        <div id="success_message">
            <h3>Thanks for Contacting Us</h3>
            <p><strong>Name:</strong> <?php echo $name; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Message:</strong> <?php echo $message; ?></p><br />
            <p><a href="index.php">Go back</a></p>
        </div>
    <?php else : ?>
        <h3> Contact Form </h3>
        <form id="contact_form" action="#" method="POST" enctype="multipart/form-data">

            <div class="row">
                <label class="required" for="name">Your name:</label><br />
                <input id="name" class="input" name="name" type="text" value="<?php echo $name; ?>" size="30" /><br />
                <span class="error"><?php echo $nameErr; ?></span>
            </div>
            <div class="row">
                <label class="required" for="email">Your email:</label><br />
                <input id="email" class="input" name="email" type="text" value="<?php echo $email; ?>" size="30" /><br />
                <span class="error"><?php echo $emailErr; ?></span>
            </div>
            <div class="row">
                <label class="required" for="message">Your message:</label><br />
                <textarea id="message" class="input" name="message" rows="7" cols="30"><?php echo $message; ?></textarea><br />
                <span class="error"><?php echo $messageErr; ?></span>
            </div>

            <input id="submit" name="submit" type="submit" value="Send email" />
            <input id="clear" name="clear" type="button" value="clear form" onclick="clearForm()" />

            <script>
                function clearForm() {
                    document.getElementById("name").value = "";
                    document.getElementById("email").value = "";
                    document.getElementById("message").value = "";
                }
            </script>
        </form>
    <?php endif; ?>
</body>

</html>