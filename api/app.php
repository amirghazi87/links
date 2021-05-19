<?php
require_once "config.php";

class API
{
    function Select(){
        $db = new Connect();
        $users = array();
        $data = $db->prepare("SELECT * FROM links ORDER BY id;");
        $data->execute();
        while($outPutData = $data->fetch(PDO::FETCH_ASSOC)){
            $users[$outPutData['id']] = array(
                'id'   => $outPutData['id'],
                'name' => $outPutData['name'],
                'link'  => $outPutData['link'],
                'description'  => $outPutData['description'],
                'color'  => $outPutData['color'],
            );
        }

        return json_encode($users);
    }
}

$users = new API();
header("Content-Type: application/json");
echo $users->Select();
?>