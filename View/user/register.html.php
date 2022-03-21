<form action="/index.php?c=user&a=register" method="post">
    <label for="mail">Adresse mail</label>
    <input type="email" id="mail" name="mail" minlength="5" maxlength="150" required>

    <label for="password">Password: </label>
    <input type="password" id="password" name= "password" minlength="7" maxlength="70" required>

    <label for="password-repeat">Répétez le mot de passe: </label>
    <input type="password" id="password-repeat" name="password-repeat" minlength="7" maxlength="70" required>

    <input type="submit" name="submit" id="submit">

</form>