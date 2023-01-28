<?php $title = "Arrow Pattern"; include_once("./../templates/_pre.php"); ?>
<?php
    function getX(
        $size=9,
        $number="<span>%s</span><span>&nbsp;</span>",
        $empty="<span>&nbsp;</span><span>&nbsp;</span>"
    ) {
        $arr = [];
        if($size % 2 != 0) {
            $half = ($size - 1) / 2;
            for($r = -$half; $r <= $half; $r++) {
                $iarr = [];
                $n = ($half + 1) - abs($r);
                for($c = 1; $c <= $half + 1; $c++) {
                    if($c <= $n) {
                        array_push($iarr, sprintf($number, $n * $c));
                    } else array_push($iarr, $empty);
                }
                array_push($arr, $iarr);
            }
        }
        return $arr;
    }
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Arrow Pattern";
        $img = "./../images/p1-3.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <div class="code">
        <?php
            foreach(getX() as $e) {
                $elem = join($e);
                echo("<div>$elem</div>");
            }
        ?>
    </div>
</div>
<?php include_once("./../templates/_post.php") ?>