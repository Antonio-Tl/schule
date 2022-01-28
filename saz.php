<?php
require_once 'database.php';

$addressData = loadAllAddress();
$pupilData = loadPupil((int)$_GET['id']);



echo "Hier liegt Schüler ".$pupilData['fname'].' '.$pupilData['lname'].':'.'<br>';
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
    if(isset $_POST && !empty($_POST)) {
        if(isset($_POST['s_id'])){
       $_GET['id'] = $_POST['s_id'];
     }
        $pupilData = loadPupil((int)$_GET['id']);
        query('use schule');
        $sql = "SELECT CONCAT(AP.a_id,'-',AP.s_id) as id, S.fname, S.lname, A.plz, A.stadt, A.strasse, A.nr 
            from schule.adresse A
            JOIN adresse_schueler AP ON A.id = AP.a_id
            JOIN schule.schueler S ON S.id = AP.s_id
            WHERE S.deleted_at is NULL and A.deleted_at is null and AP.deleted_at is null and s_id = $_POST['s_id']";
        $result = query($sql);
        $row = '<tr> <td>###DELETEACTION###</td><td>###ID###</td><td>###FNAME###</td><td>###LNAME###</td><td>###POSTLEIZAHL###</td><td>###STADT###</td>
                 <td>###STRASSE###</td><td>###HAUSNUMMER###</td></tr>';
        foreach ($result as $dataRow) {
            echo str_replace(
                array(
                    '###DELETEACTION###',
                    '###ID###',
                    '###FNAME###',
                    '###LNAME###',
                    '###POSTLEIZAHL###',
                    '###STADT###',
                    '###STRASSE###',
                    '###HAUSNUMMER###',),
                array(
                    '<A href="ActionDeleteS.php?id=' . $dataRow['id'] . '">[X]</A>',
                    $dataRow['id'],
                    $dataRow['fname'],
                    $dataRow['lname'],
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


