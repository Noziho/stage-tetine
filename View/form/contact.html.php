<div class="container">
    <div id="contact-container">
        <form action="/?c=user&a=save-form" method="post">
            <div>
                <label for="name"></label>
                <input type="text" id="name" name="name" placeholder="nom" required>

                <label for="mail"></label>
                <input type="email" name="mail" id="mail" placeholder="Entrez votre mail">

                <label for="message"></label>
                <textarea name="message" id="message" cols="30" rows="10" maxlength="250" placeholder="Votre messsage" required></textarea>

                <button type="submit" name="submit">Envoyer</button>
            </div>
        </form>
    </div>
</div>

<?php
if (isset($_SESSION['mail'])) {
    if ($_SESSION['mail'] === "mail-success") {
        echo "Le mail est bien envoyé ";
    }
    else {
        echo "Erreur lors de l'envoi";
    }
}
$_SESSION['mail'] = null;
