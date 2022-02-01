<?php
require_once 'database.php';

$addressData = loadAllAddress();
$pupilData = loadPupil((int)$_GET['id']);


echo "Hier liegt Schüler " . $pupilData['fname'] . ' ' . $pupilData['lname'] . ':' . '<br>';
?>


    <table>
        <tr>
            <th>Löschen</th>
            <th>ID</th>
            <th>Vorname</th>
            <th>Nachname</th>
            <th>Postleizahl</th>
            <th>Stadt</th>
            <th>Straße</th>
            <th>Hausnummer</th>
        </tr>
        <?php

        $pupilData = loadPupil((int)$_GET['id']);
        query('use schule');
        $sql = "SELECT A.* FROM adresse A JOIN schueler S ON S.address_id = A.id WHERE S.id = " . $_GET['id'];
        $result = query($sql);
        $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###POSTLEIZAHL###</td><td>###STADT###</td>
                 <td>###STRASSE###</td><td>###HAUSNUMMER###</td></tr>';
        foreach ($result as $dataRow) {
            echo str_replace(
                array(
                    '###DELETEACTION###',
                    '###ID###',
                    '###POSTLEIZAHL###',
                    '###STADT###',
                    '###STRASSE###',
                    '###HAUSNUMMER###',),
                array(
                    '<A href="ActionDeleteA.php?id=' . $dataRow['id'] . '">[X]</A>',
                    $dataRow['id'],
                    $dataRow['plz'],
                    $dataRow['stadt'],
                    $dataRow['strasse'],
                    $dataRow['nr'],
                ),
                $row
            );
        }
        ?>
    </table>


<?php
function loadAllAddress()
{
    $sql = "select * from schule.adresse";
    return query($sql);
}


function loadPupil($id)
{
    $sql = "select * from schule.schueler where id=" . $id;
    return query($sql)[0];
}


