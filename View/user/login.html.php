<form action="/?c=user&a=login" method="post">
    <div class="container">
        <div id="login-container">
            <div>
                <label for="mail">Adresse-mail</label>
                <input type="email" name="mail" id="mail" minlength="5" maxlength="150" required>
            </div>

            <div>
                <label for="password">Mot de passe: </label>
                <input type="password" name="password" id="password" minlength="7" maxlength="70" required>
            </div>
            <input value="Se connecter" class="submit-button" type="submit" name="submit">
        </div>
    </div>
</form>