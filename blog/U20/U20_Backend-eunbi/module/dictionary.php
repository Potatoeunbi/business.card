<?php 

    $country_dic=[];
    $sport_dic=[];
    
    $sql ="SELECT country_id,country_name_kr from list_country";
    $result=$db->query($sql);
    while ($row = mysqli_fetch_array($result)) {
        $country_dic[$row["country_name_kr"]] = $row["country_id"];
    }
    $sql ="SELECT sports_id,sports_name_kr from list_sports";
    $result=$db->query($sql);

    
    while ($row = mysqli_fetch_array($result)) {

        $sport_dic[$row["sports_id"]] = $row["sports_name_kr"];

    }

    $month_dic=[
        "1" => 31,
        "2" => 28,
        "3" => 31,
        "4" => 30,
        "5" => 31,
        "6" => 30,
        "7" => 31,
        "8" => 31,
        "9" => 30,
        "10" => 31,
        "11" => 30,
        "12" => 31
    ];
?>