<?php


function insert_into_table(string $table_name , array $fields_and_values){

    $field_string = "";
    $field_length = count($fields_and_values);
    $values_string = "";
    $counter = 0;
    foreach ($fields_and_values as $field => $value){
        $counter += 1;

        $field_string.= ($counter == $field_length)?  $field  : $field.",";
        $values_string.= ($counter == $field_length) ? "'$value'" : "'$value'".",";
    }

    $counter = 0;

$sql = "INSERT INTO {$table_name} ($field_string) VALUES ($values_string)";

    echo  $sql;
}

function update_multiple_fields (string $table_name , array  $fields_and_values , string $where_clause){

    $field_length = count($fields_and_values);
    $counter = 0;

    $sql = "UPDATE {$table_name} SET ";

    foreach ($fields_and_values as $field => $value){


        $sql.= ($field_length - $counter == 1 )?  "{$field} = '{$value}'"  : "{$field} = '{$value}',";

        $counter += 1;
    }

    echo $sql.= " WHERE $where_clause";



}


update_multiple_fields("users_table_name" , ["id" => "1", "fname" => "Kosi" , "lname" => "Eric" , "age" => 19] , "username={'Kosi'}");
//insert_into_table("users_table_name" , ["id" => "1", "fname" => "Kosi" , "lname" => "Eric" , "age" => 19]);
//update_multiple_fields("users_table_name" , ["id" , "fname" , "lname" , "age"] , ["1" , "Kosi" , "Eric" , 19] , "username={'Kosi'}");

?>