<div class="container">
    <div id="register-container">
        <form action="/index.php?c=user&a=register" method="post">
            <div>
                <label for="mail">Adresse mail</label>
                <input type="email" id="mail" name="mail" minlength="5" maxlength="150" required>
            </div>

            <div class="double-input">
                <div>
                    <label for="firstname">Prénom: </label>
                    <input type="text" id="firstname" name="firstname" minlength="2" maxlength="150" required>
                </div>

                <div>
                    <label for="lastname">Nom: </label>
                    <input type="text" id="lastname" name="lastname" minlength="2" maxlength="150" required>
                </div>
            </div>


            <div class="double-input">
                <div>
                    <label for="password">Password: </label>
                    <input type="password" id="password" name="password" minlength="7" maxlength="70" required>
                </div>

                <div>
                    <label for="password-repeat">Répétez le mot de passe: </label>
                    <input type="password" id="password-repeat" name="password-repeat" minlength="7" maxlength="70" required>
                </div>
            </div>

            <div class="double-input">
                <div>
                    <label for="phone-number">Téléphone: </label>
                    <input type="tel" id="phone-number" name="phone-number" minlength="10" maxlength="10" required>
                </div>

                <div>
                    <label for="adress">Adresse: </label>
                    <input type="text" id="adress" name="adress" minlength="5" maxlength="150" required>
                </div>
            </div>


            <div class="double-input">
                <div>
                    <label for="city">Ville: </label>
                    <input type="text" id="city" name="city" minlength="5" maxlength="150" required>
                </div>

                <div>
                    <label for="postal-code">Code postal</label>
                    <input type="text" id="postal-code" name="postal-code" minlength="5" maxlength="55" required>
                </div>
            </div>

            <input class="submit-button" type="submit" name="submit" id="submit" value="S'inscrire">

        </form>
    </div>
</div>
