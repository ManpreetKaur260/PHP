<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Taula de multiplicar</title>
    </head>
    <body>
        <table style="border: solid black 1px">
            <thead>
                <tr>
                    <th></th>
                    <?php
                    for ($i = 0; $i <= 10; $i++) {
                        echo "<th>$i</th>";
                    }
                    echo "</tr>";
                    ?>
            </thead>
            <tbody>
                <tr></tr>
                <?php
                for ($j = 0; $j <= 10; $j++) {
                    echo "<tr><td>Taula del $j </td>";

                    for ($k = 0; $k <= 10; $k++) {
                        echo "<td>" . $j * $k . "</td>";
                    }

                    echo '</tr>';
                }
                ?>
            </tbody>   
        </table>

    </body>
</html>
