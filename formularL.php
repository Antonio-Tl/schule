<html lang="de">
<head>
    <title>Schueler</title>
</head>
<body>

<form action="formularLAction.php" method="POST">
    <ul>
        <li>
            <label for="f2">Vorname:</label>
            <input type="text" id="f2" name="fnameL">
        </li>
        <li>
            <label for="f3">Nachname:</label>
            <input type="text" id="f3" name="lnameL">
        </li>
    </ul>

    <button type="submit">Send your message</button>

</form>
<button onclick="window.location.href='/schule/index.php'">Zurueck</button>
</body>
</html>