<?php
function formatCategories($data)
{
    $selectCategory = "";
    foreach ($data as $user) {
      $selectCategory .= "<option value='{$user['id_cat']}' name='{$user['id_cat']}'>{$user['name_cat']}</option>\n";
    }
    return $selectCategory;  
}
