<?php
$json_file = file_get_contents('worldBounds.json');
$json_data = json_decode($json_file, true);


if (isset($_POST["data"])) {
    $data = json_decode($_POST["data"], true);
    // process the data
    $id = $data["id"];
    $date = $data["date"];
    $link = $data["link"];
    // echo "link: " . $data["link"] . ", Date: " . $data["date"] . ", Date: " . $data["id"];
}


foreach ($json_data['features'] as $key => $value) {
    if ($value['properties']['id'] == $id) {
        $json_data['features'][$key]['properties']['pictureLink'] = $link;
        $json_data['features'][$key]['properties']['date'] = $date;
        echo "Data Saved";
    }
}

file_put_contents('worldBounds.json', json_encode($json_data));
?>