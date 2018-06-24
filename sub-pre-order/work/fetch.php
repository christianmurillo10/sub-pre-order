<?php

$api_url = "http://localhost/sub-pre-order/api/api_handler.php?action=fetch_all";

$client = curl_init($api_url);

curl_setopt($client, CURLOPT_RETURNTRANSFER, true);

$response = curl_exec($client);

$result = json_decode($response);

$output = '';

if (count($result) > 0) {
    foreach ($result as $row) {
        $output .= '
        <tr>
            <td class="text-center">' . $row->date . '</td>
            <td class="text-center">' . $row->time . '</td>
            <td class="text-center">' . $row->fullname . '</td>
            <td class="text-center"><button type="button" name="view" class="btn btn-info btn-xs view" id="' . $row->id . '">View</button></td>
            <td class="text-center"><button type="button" name="edit" class="btn btn-warning btn-xs edit" id="' . $row->id . '">Edit</button></td>
            <td class="text-center"><button type="button" name="delete" class="btn btn-danger btn-xs delete" id="' . $row->id . '">Delete</button></td>
        </tr>
        ';
    }
} else {
    $output .= '
    <tr>
        <td colspan="5" class="text-center">No Data Found</td>
    </tr>
    ';
}

echo $output;
?>