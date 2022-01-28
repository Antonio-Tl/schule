<html lang="de">
<head>
    <title>Schueler</title>
</head>
<body>

<form action="formularSAction.php" method="POST">
    <ul>
        <li>
            <label for="f2">Vorname:</label>
            <input type="text" id="f2" name="fnameS">
        </li>
        <li>
            <label for="f3">Nachname:</label>
            <input type="text" id="f3" name="lnameS">
        </li>
        <li>
            <label for="f4">Postleizahl:</label>
            <input type="text" id="f4" name="plz">
        </li>
        <li>
            <label for="f5">Stadt:</label>
            <input type="text" id="f5" name="stadt">
        </li>
        <li>
            <label for="f6">Straße:</label>
            <input type="text" id="f6" name="strasse">
        </li>
        <li>
            <label for="f7">Hausnummer:</label>
            <input type="text" id="f7" name="nr">
        </li>
    </ul>

    <button type="submit">Send your message</button>

</form>

<button onclick="window.location.href='/schule/index.php'">Zurueck</button>
</body>
</html>
