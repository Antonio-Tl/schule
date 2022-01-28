<?php
require_once 'database.php';

if(!isset($_GET['id']) && !isset($_POST['id'])){
    header('Location: index.php');
}

$courseData = loadAllCourses();

if(isset($_POST) && !empty($_POST)){
    if(isset($_POST['s_id'])){
        $_GET['id'] = $_POST['s_id'];
    }
    foreach($courseData as $course){
        $kId = $course['id'];
        if(isset($_POST['kid_'.$course['id']])){
            $sql = "replace into schule.kurse_schueler (k_id, s_id, deleted_at) values(".$kId.", ".(int)$_GET['id'].", null)";
            query($sql);
        } else {
            $sql = "replace into schule.kurse_schueler (k_id, s_id, deleted_at) values(".$kId.", ".(int)$_GET['id'].", NOW())";
            query($sql);
        }
    }
}



$pupilData = loadPupil((int)$_GET['id']);

$assignments = loadAssignments();

echo "Hier liegt Schüler ".$pupilData['fname'].' '.$pupilData['lname'].'<br>';


echo '<form method="POST">';
echo '<input type="hidden" name="s_id" value="'.$_GET['id'].'">';
foreach($courseData as $course){
    echo '<input type="checkbox" name="kid_'.$course['id'].'" '.
        (
            (
                isset($assignments[$_GET['id']])
                &&
                in_array(
                    $course['id'],
                    $assignments[$_GET['id']]
                )
            )?'checked':''
        ).
        '> '.$course['name'].($course['deleted_at']?' GELÖSCHT':'').'<br>';
}

// if($a) { echo "B"; } else { echo "C"; }
// echo (($a)?"B":"C");


echo '<input type="submit" value="Aktualisieren/Speichern">';

echo '</form>';


echo '<button onclick="window.location.href=\'/schule/listS.php\'">Zurueck</button>';




function loadAssignments(){
    $sql = "select * from schule.kurse_schueler where deleted_at is null";
    $result = array();
    $x = query($sql);

    foreach($x as $row){
        $result[$row['s_id']][]=$row['k_id'];
    }
    return $result;
}


function loadAllCourses(){
    $sql = "select * from schule.kurse";
    return query($sql);
}


function loadPupil($id){
    $sql = "select * from schule.schueler where id=".$id;
    return query($sql)[0];
}
