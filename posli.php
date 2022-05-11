<?php


    // Načítá pole z formuláře - name, email a message; odstraňuje bílé znaky; odstraňuje HTML

    $name = strip_tags(trim($_POST["name"]));

    $name = str_replace(array("\r","\n"),array(" "," "),$name);

    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);

    $zprava = trim($_POST["zprava"]);
    $spam = trim($_POST["spam"]);


    // Kontroluje data popř. přesměruje na chybovou adresu

    if (empty($name) OR empty($zprava) OR empty($spam) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {

        header("Location: https://rm-schody.cz/index.php?success=-1#form");

        exit;

    }


    // Nastavte si email, nakterý chcete, aby se vyplněný formulář odeslal - jakýkoli váš email

    $recipient = "Wickky@seznam.cz";


    // Nastavte předmět odeslaného emailu

    $subject = "Máte novou zprávu od: $name";


    // Obsah emailu, který se vám odešle

    $email_content = "Jméno: $name\n";

    $email_content .= "Email: $email\n\n";

    $email_content .= "Zpráva:\n$zprava\n";


    // Emailová hlavička

    $email_headers = "From: $name <$email>";


    // Odeslání emailu - dáme vše dohromady

    mail($recipient, $subject, $email_content, $email_headers);

   

    // Přesměrování na stránku, pokud vše proběhlo v pořádku

    header("Location:https://rm-schody.cz/index.php?success=1#form");


?>