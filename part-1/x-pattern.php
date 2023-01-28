<?php $title = "X Pattern"; include_once("./../templates/_pre.php"); ?>
<?php
    function getX(
        $size=11,
        $skip=1,
        $number="<span>%s</span><span>&nbsp;</span>",
        $edge="<span>*</span><span>&nbsp;</span>",
        $empty="<span>&nbsp;</span><span>&nbsp;</span>"
    ) {
        $arr = [];
        if($size % 2 != 0) {
            $half = ($size - 1) / 2;
            for($r = -$half; $r <= $half; $r++) {
                $iarr = [];
                for($c = -$half; $c <= $half; $c++) {
                    if(abs($r) == abs($c)) {
                        if(($c % ($skip + 1)) == 0)
                            array_push($iarr, sprintf($number, abs($c) + 1));
                        else array_push($iarr, $edge);
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
        $part = "X Pattern";
        $img = "./../images/p1-2.png";
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