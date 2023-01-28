<?php $title = "Fix the Code"; include_once("./../templates/_pre.php"); ?>
<?php
    function bubbleSort($lists) {
        $length = count($lists);
        for($parent = 0; $parent < $length; $parent++) {
            for($child = 0; $child < $length - $parent - 1; $child++) {
                if($lists[$child] > $lists[$child + 1]) {
                    $temp = $lists[$child + 1];
                    // $lists[$child] = $lists[$child + 1];
                    // $lists[$child + 1] = $temp;
                    $lists[$child + 1] = $lists[$child];
                    $lists[$child] = $temp;
                }
            }
        }
        return $lists;
    }
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Fix the Code";
        $img = "./../images/p2-6.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <p>These lines...</p>
    <div class="code">
        <div>$lists[$child] = $lists[$child + 1];</div>
        <div>$lists[$child + 1] = $temp;</div>
    </div>
    <p>need to be replaced with...</p>
    <div class="code">
        <div>$lists[$child + 1] = $lists[$child];</div>
        <div>$lists[$child] = $temp;</div>
    </div>
    <p>The reason for this is because the initial code attempted to replace the value of the next element, but it only just reassigns the current value of the next element (<span class="code">$temp</span>) to itself (<span class="code">$lists[$child + 1]</span>).</p>
    <p>The next element (<span class="code">$lists[$child + 1]</span>) needs to be assigned with the value of the current element (<span class="code">$lists[$child]</span>).</p>
    <p>And since <span class="code">$lists[$child + 1]</span> is basically the same as <span class="code">$temp</span>, we use <span class="code">$temp</span> instead for easy reference when changing the value of the current element (<span class="code">$lists[$child]</span>).</p>
    <p>All in all, the problem lies in the logic of swapping of the values. The suggested code should make the sort algorithm work.</p>
</div>
<?php include_once("./../templates/_post.php") ?>