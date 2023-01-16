    
    <?php
        echo "<script>";

        echo "document.getElementById('coach_contry').options[".($row["coach_country_id"]-1)."].selected=true;";
        
        if($row["coach_gender"] == 'm')
            echo "document.getElementById('coach_gender').options[0].selected=true;";
        else echo "document.getElementById('coach_gender').options[1].selected=true;";

        if($row["coach_duty"] == 'h')
            echo "document.getElementById('coach_duty').options[0].selected=true;";
        else echo "document.getElementById('coach_duty').options[1].selected=true;";


        $sports_id= explode(',' , $row["coach_sports_id"]); //체크 박스
        foreach($sports_id as $id)
            echo "document.getElementsByName('coach_sports[]')[".($id-1)."].checked=true;";
        echo "</script>";
    ?>