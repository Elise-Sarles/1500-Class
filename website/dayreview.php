<?php 
// create short variable name
$document_root = $_SERVER['DOCUMENT_ROOT'];
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Day Review</title>
        <link href="webday.css" rel ="stylesheet"/>
    </head>
    <body>
        <h1>Day Log</h1>
        <h3>See how the pasted days have gone.</h3>


        <?php
            @$days = file("$document_root/../code/website/day.txt",);

            $daylog = array();
            $number_of_days = count($days);
            if($number_of_days == 0){
                echo " <p><strong>No Days logged. <br /> Please come back later.<?strong></p>";
            }

            echo "<table>\n";
            echo "<tr>
                    <th>Date</th>
                    <th>Value</th>
                    <th>Expression</th>
                    <th>Amount of Hugs</th>
                    <th>Description</th>
                <tr>";

            for($i = 0; $i < $number_of_days; $i++){
                $line = explode("\t", $days[$i]);

                echo "<tr>
                        <td>".$line[0]."</td>
                        <td>".$line[1]."</td>
                        <td>".$line[2]."</td>
                        <td>".$line[3]."</td>
                        <td>".$line[4]."</td>
                </tr>";
                $date = $line[0];
                $dayval = $line[1];
                $expression = $line[2];
                $hugnum = $line[3];
                $descr = $line[4];
                $day = array($date, $dayval, $expression, $hugnum, $descr);
                $daylog[$i] = $day;
            }

            function compare ($x ,$y){
                if ($x[2] == $y[2]){
                    return 0;
                } else if($x[2] < $y[2]) {
                    return -1;
                } else {
                    return 1;
                }
            }
            echo "</table>";

            echo "<br />";
            echo "<h2>Days but best first! </h2>";

            usort($daylog, 'compare');

            echo "<table>\n";
            echo "<tr>
                    <th>Date</th>
                    <th>Value</th>
                    <th>Expression</th>
                    <th>Amount of Hugs</th>
                    <th>Description</th>
                <tr>";

                for($row = 0; $row < count($daylog); $row++){

                    echo "<tr>";

                    for ($col = 0; $col < count($day); $col++){
                            echo "<td>".$daylog[$row] [$col]."</td>";
                    }

                    echo "</tr>";
                }

                echo "</table>";

        ?>

    </body>
</html>