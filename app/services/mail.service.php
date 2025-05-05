<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require_once __DIR__ . '/../../vendor/autoload.php';

function envoyer_mail_apprenant(string $login, string $password, string $nomComplet, string $matricule,string $lien): bool {
    $mail = new PHPMailer(true);

    try {
        // Configuration SMTP
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'abdoulayely148@gmail.com'; // Ton email
        $mail->Password = 'kjve rdze bblk mqif';       // Mot de passe d'application Gmail
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Paramètres de l'email
        $mail->setFrom('abdoulayely148@gmail.com', 'Sonatel Academy');
        $mail->addAddress($login, $nomComplet);

        $mail->isHTML(true);
        $mail->Subject = 'Bienvenue sur Sonatel Academy !';

        // Contenu du message avec style
        $mail->Body = '
<html>
<head>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f5f5f5;
      padding: 20px;
    }
    .container {
      background-color: #ffffff;
      padding: 30px;
      border-radius: 8px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      max-width: 600px;
      margin: auto;
    }
    h1 {
      color: #ff7900;
      text-align: center;
    }
    p {
      font-size: 16px;
      color: #333333;
    }
    .highlight {
      color: #00857c;
      font-weight: bold;
    }
    .button {
      display: inline-block;
      padding: 12px 24px;
      background-color: #009999;
      color: #fff;
      text-decoration: none;
      border-radius: 6px;
      margin-top: 20px;
      font-weight: bold;
    }
    .footer {
      margin-top: 30px;
      font-size: 14px;
      text-align: center;
      color: #888888;
    }
  </style>
</head>
<body>
  <div class="container">
    <h1>Bienvenue sur Sonatel Academy 👋</h1>

    <p>Bonjour <span class="highlight">' . htmlspecialchars($nomComplet) . '</span>,</p>

    <p>Votre compte a été créé avec succès. Voici vos informations :</p>

    <p><strong>Matricule :</strong> <span class="highlight">' . htmlspecialchars($matricule) . '</span></p>
    <p><strong>Email :</strong> <span class="highlight">' . htmlspecialchars($login) . '</span></p>
    <p><strong>Mot de passe :</strong> <span class="highlight">' . htmlspecialchars($password) . '</span></p>

    <p>Merci de vous connecter rapidement et de changer votre mot de passe après votre première connexion.</p>

    <p style="text-align:center;">
      <a class="button" href="' . $lien . '">Changer mon mot de passe</a>
    </p>

    <div class="footer">
      &copy; 2025 Sonatel Academy. Tous droits réservés.
    </div>
  </div>
</body>
</html>
';



        $mail->send();
        return true;
    } catch (Exception $e) {
        // Tu peux logger ici : file_put_contents('error_log.txt', $e->getMessage());
        return false;
    }
}
