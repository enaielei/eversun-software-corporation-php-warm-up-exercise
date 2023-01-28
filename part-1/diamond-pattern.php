<?php $title = "Diamond Pattern"; include_once("./../templates/_pre.php"); ?>
<?php
    function getDiamond(
        $size=7,
        $edge="<span>*</span><span>&nbsp;</span>",
        $mid="<span>|</span><span>&nbsp;</span>",
        $empty="<span>&nbsp;</span><span>&nbsp;</span>"
    ) {
        $arr = [];
        if($size % 2 != 0) {
            $half = ($size - 1) / 2;
            for($r = -$half; $r <= $half; $r++) {
                $iarr = [];
                for($c = -$half; $c <= $half; $c++) {
                    if($c == 0) array_push($iarr, $mid);
                    else if(abs($r) + abs($c) == $half) array_push($iarr, $edge);
                    else array_push($iarr, $empty);
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
        $part = "Diamond Pattern";
        $img = "./../images/p1-1.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <div class="code">
        <?php
            foreach(getDiamond() as $e) {
                $elem = join($e);
                echo("<div>$elem</div>");
            }
        ?>
    </div>
</div>
<?php include_once("./../templates/_post.php") ?>