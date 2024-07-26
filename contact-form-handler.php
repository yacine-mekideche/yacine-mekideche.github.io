<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collecter les données du formulaire
    $name = htmlspecialchars(trim($_POST["name"]));
    $email = htmlspecialchars(trim($_POST["email"]));
    $subject = htmlspecialchars(trim($_POST["subject"]));
    $message = htmlspecialchars(trim($_POST["message"]));

    // Définir l'adresse e-mail de destination
    $to = "yacinemekideche@gmail.com";

    // Définir l'objet de l'e-mail
    $email_subject = "Nouveau message de $name: $subject";

    // Définir le contenu de l'e-mail
    $email_body = "Vous avez reçu un nouveau message de votre formulaire de contact.\n\n".
                  "Nom: $name\n".
                  "E-mail: $email\n".
                  "Sujet: $subject\n\n".
                  "Message:\n$message\n";

    // Définir les en-têtes de l'e-mail
    $headers = "From: $email\n";
    $headers .= "Reply-To: $email";

    // Envoyer l'e-mail
    if (mail($to, $email_subject, $email_body, $headers)) {
        // Rediriger vers une page de remerciement
        header("Location: merci.html");
    } else {
        echo "Erreur: le message n'a pas pu être envoyé.";
    }
} else {
    echo "Erreur: méthode de requête invalide.";
}
?>
