<html lang="de">
<head>
    <title>Adresse</title>
</head>
<body>

<form action="formularAAction.php" method="POST">
    <ul>
        <li>
            <label for="f2">Postleitzahl:</label>
            <input type="text" id="f2" name="plz">
        </li>
        <li>
            <label for="f3">Stadt:</label>
            <input type="text" id="f3" name="stadt">
        </li>
        <li>
            <label for="f2">Straße:</label>
            <input type="text" id="f4" name="strasse">
        </li>
        <li>
            <label for="f2">Hausnummer:</label>
            <input type="text" id="f5" name="nr">
        </li>
    </ul>

    <button type="submit">Send your message</button>

</form>

<button onclick="window.location.href='/schule/index.php'">Zurueck</button>
</body>
</html>
