<?php $title = "Queue"; include_once("./../templates/_pre.php"); ?>
<?php
    function getTwoNumbers(
        $cols="cols",
        $rows="rows",
        $display="display",
        $letter="<td class='letter'><span>%s</span></td>",
        $letters="bcdfghjklmnpqrstvwxyz"
    ) {
        if(isset($_POST)) {
            if(array_key_exists($display, $_POST)) {
                if(array_key_exists($cols, $_POST)) {
                    $cols = (int) $_POST[$cols] ?? 0;
                }

                if(array_key_exists($rows, $_POST)) {
                    $rows = (int) $_POST[$rows] ?? 0;
                }
            }
        }

        if(is_string($cols)) $cols = 0;
        if(is_string($rows)) $rows = 0;

        $arr = [];
        for($r = 1; $r <= $rows; $r++) {
            $iarr = [];
            for($c = 1; $c <= $cols; $c++) {
                $idx = rand(0, strlen($letters) - 1);
                $lt = $letters[$idx];
                array_push($iarr, sprintf($letter, $lt));
            }
            array_push($arr, $iarr);
        }
        return $arr;
    }

    $twoNumbers = getTwoNumbers();
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Two Numbers";
        $img = "./../images/p2-5.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <form action="./two-numbers.php" method="post">
        <input type="number" name="cols" min="0">
        <span>x</span>
        <input type="number" name="rows" min="0">
        <button type="submit" name="display">Display</button>
    </form>
    <br>
    <table class="code">
        <tbody>
            <?php
                foreach($twoNumbers as $e) {
                    $elem = join($e);
                    echo("<tr>$elem</tr>");
                }
            ?>
        </tbody>
    </table>
</div>
<?php include_once("./../templates/_post.php") ?>