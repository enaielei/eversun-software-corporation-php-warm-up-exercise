<?php $title = "Geometric Pattern"; include_once("./../templates/_pre.php"); ?>
<?php
    function getGeometric(
        $cols=5,
        $rows=6,
        $number="<span>%s</span><span>&nbsp;</span>"
    ) {
        $arr = [];;
        for($r = 1, $i = 2; $r <= $rows; $r++, $i++) {
            $iarr = [];
            for($c = 1, $n = 0, $n1 = 1, $n2 = 1; $c <= $cols; $c++) {
                if($c == 1) $n = $r;
                else if($c == 2) {
                    $n = $r * $i;
                    $n1 = $r;
                    $n2 = $n;
                } else {
                    $nn = ($n2 / $n1) * $n2;
                    $n1 = $n;
                    $n = $n2 = $nn;
                }
                array_push($iarr, sprintf($number, $n));
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
        $part = "Geometric Pattern";
        $img = "./../images/p1-4.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <div class="code">
        <?php
            foreach(getGeometric() as $e) {
                $elem = join($e);
                echo("<div>$elem</div>");
            }
        ?>
    </div>
</div>
<?php include_once("./../templates/_post.php") ?>