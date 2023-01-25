<?php

include_once('link.php');

$dbLinkObj = new Link();

// Insert link
if (isset($_POST['action']) && $_POST['action'] == "insert") {
    $link = trim($_POST['url']);
    if (!empty($link))
        $dbLinkObj->insertRecord($link);
}

// Show all links
if (isset($_POST['action']) && $_POST['action'] == "view") {
    $output = "";
    $links = $dbLinkObj->displayRecords();
    if ($dbLinkObj->totalRowCount() > 0) {
        foreach ($links as $link) {
            $output .= "<tr style='width:100%' data-id='" . $link['id'] . "'>
                    <th scope='row' class='text-center' style='width:5%'>" . $link['id'] . "</th>
                    <td>" . $link['url'] . "</td>
                    <td style='width:15%'>
                        <a id='addClick' href='https://localhost/shortly/u?u_id=" . $link['u_id'] . "' target='_blank'>
                        https://localhost/shortly/u?u_id=" . $link['u_id'] . "
                        </a>
                    </td>
                    <td class='text-center' style='width:5%' data-click='" . $link['id'] . "'>" . $link['clicks'] . "</td>
                    <td class='text-center' style='width:8%'>" . date('d.m.Y', strtotime($link['created_at'])) . "</td>
                    <td class='text-center' style='width:8%'>
                        <i class='fa fa-trash delete' data-id='" . $link['id'] . "'></i>
                    </td></tr>";
        }
        echo $output;
    } else {
        $output .= "<h6>No links yet</h6>";
        echo $output;
    }
}

// Delete link
if (isset($_POST['action']) && $_POST['action'] == "delete") {
    $id = $_POST['id'];
    if (!empty($id))
        $dbLinkObj->deleteRecord($id);
}

// Update clicks counter
if (isset($_POST['action']) && $_POST['action'] == "update_clicks") {
    $output = "";
    $id = $_POST['id'];
    if (!empty($id)) {
        $link = $dbLinkObj->displayRecordClicks($id);
        $output .= "<td class='text-center' style='width:5%' data-click='" . $id . "'>" . $link[0] . "</td>";
    }
    echo $output;
}
