
<?php



$mysqli = new mysqli("localhost", "root", "", "test" );

$query = "SELECT * FROM bulsu_campuses ORDER BY campus_id ASC";
$querySelectCollege = "SELECT DISTINCT college, campus_key FROM bulsu_campus_courses";
$result3 = $mysqli -> query($querySelectCollege);

function GetExtCourses($campus_key)
{
    global $mysqli;
    $ext_course_query = "SELECT * FROM `bulsu_campus_courses` WHERE (campus_key = $campus_key) ORDER BY campus_key ASC";

    $return = "";
 $result3= $mysqli -> query($ext_course_query);{
       while ($ext_college = $result3->fetch_row())
       {
              $return .= "<li><span class=\"majors\">$ext_college[3]</span></li>";
              if($ext_college[3] ==2){

                     $result2 = $mysqli -> query($ext_course_query);
                     {
                 
                         while ($ext_majors = $result2->fetch_row())
                         {
                 
                             $ext_major_title = $ext_majors[2];
                     
                             $return .= "<li><span class=\"majors\">$ext_major_title</span></li>";
                         }
                     }
                 
                     return $return;
                    
              }
       }
 }

}

$result = $mysqli -> query($query);

while ($row = $result->fetch_assoc())
{
    $campus_id = $row['campus_id'];
    $campus_name = $row['campus_name'];
    $campus_address = "address complete";
    $campus_overview = "campus overview";

    if ($campus_overview != "")
    {
        $campus_overview = substr($campus_overview, 0, 320);

        $campus_overview = preg_replace('/\n(\s*\n)+/', '</p><p>', $campus_overview);
        $campus_overview = preg_replace('/\n/', '<br>', $campus_overview);
        $campus_overview .= "... <a href=\"#\"><strong>Read more</strong></a>";
    }

    echo "
            <div class=\"panel panel-default\">
                <div class=\"panel-body\">
                    <div class=\"media\">
                        <div class=\"media-left\">
                            <a href=\"#\">
                                <img class=\"media-object\" src=\"/resources/campuses-logo/$campus_name.png\" width=\"150\">
                            </a>
                        </div>

                        <div class=\"media-body\">
                            <h3 class=\"media-heading\">
                                <strong>
                                    <a href=\"#\">
                                        $campus_name Campus
                                    </a>
                                </strong>
                            </h3>
                            <h4>
                                <a href=\"#\">
                                    $campus_address
                                </a>
                            </h4>
                            <p>
                                $campus_overview
                            </p>
                            <ul class=\"list-unstyled college-majors\">
                                "
                                    . GetExtCourses($campus_id) .
                                "
                            </ul>

                            
                        </div>

                    </div>
                </div>
            </div>
        ";
}

$mysqli->close();


?>