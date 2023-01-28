<?php $title = "Random Character"; include_once("./../templates/_pre.php"); ?>
<?php
    function getRandomCharacter(
        $cols=5,
        $rows=4,
        $odd="<td class='odd'><span>%s</span></td>",
        $even="<td class='even'><span>%s</span></td>",
        $letters="abcdefghijk"
    ) {
        $arr = [];
        for($r = 1; $r <= $rows; $r++) {
            $iarr = [];
            for($c = 1; $c <= $cols; $c++) {
                $idx = rand(0, strlen($letters) - 1);
                $letter = $letters[$idx];
                $fmt = $idx % 2 == 0 ? $even : $odd;
                array_push($iarr, sprintf($fmt, $letter));
            }
            array_push($arr, $iarr);
        }
        return $arr;
    }
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Random Character";
        $img = "./../images/p2-1.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <table class="code">
        <tbody>
            <?php
                foreach(getRandomCharacter() as $e) {
                    $elem = join($e);
                    echo("<tr>$elem</tr>");
                }
            ?>
        </tbody>
    </table>
</div>
<?php include_once("./../templates/_post.php") ?>