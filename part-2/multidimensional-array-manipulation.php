<?php $title = "Multidimensional Array Manipulation"; include_once("./../templates/_pre.php"); ?>
<?php
    function getMultidimensionalArray(
        $cols=4,
        $rows=4,
        $number="<td class='number'><span>%s</span></td>",
        $sum="<td class='sum'><span>%s</span></td>",
        $empty="<td class='empty'><span>&nbsp;</span></td>",
        $numbers=[1, 100]
    ) {
        $arr = [];
        $generated = [];
        $ctotals = [];
        for($r = 1; $r <= $rows; $r++) {
            $iarr = [];
            $num = null;
            $rtotal = 0;
            for($c = 1; $c <= $cols; $c++) {
                if($c > count($ctotals)) array_push($ctotals, 0);
                while($num == null || in_array($num, $generated)) {
                    $num = rand($numbers[0], $numbers[1]);
                }
                $rtotal += $num;
                $ctotals[$c - 1] += $num;
                array_push($generated, $num);
                array_push($iarr, sprintf($number, $num));
            }
            array_push($iarr, sprintf($sum, $rtotal));
            array_push($arr, $iarr);
        }
        $iarr = array_map(
            function($e) use ($sum) {
                return sprintf($sum, $e);
            }, $ctotals
        );
        array_push($iarr, $empty);
        array_push($arr, $iarr);
        return $arr;
    }
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Multidimensional Array Manipulation";
        $img = "./../images/p2-2.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <table class="code">
        <tbody>
            <?php
                foreach(getMultidimensionalArray() as $e) {
                    $elem = join($e);
                    echo("<tr>$elem</tr>");
                }
            ?>
        </tbody>
    </table>
</div>
<?php include_once("./../templates/_post.php") ?>