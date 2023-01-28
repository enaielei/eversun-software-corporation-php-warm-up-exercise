<?php $title = "Queue"; include_once("./../templates/_pre.php"); ?>
<?php
    function getQueue(
        $element="<td><input name='queue[%s]' value='%s' readonly></td>",
        $name="queue",
        $value="value",
        $enqueue="enqueue",
        $dequeue="dequeue"
    ) {
        $queue = [];
        $rv = [];

        if(isset($_POST)) {
            if(array_key_exists($enqueue, $_POST) && array_key_exists($value, $_POST)) {
                $val = $_POST[$value] ?? null;
                if(!empty($val)) $queue[] = $val;
            }

            if(array_key_exists($name, $_POST)) {
                foreach($_POST[$name] as $val) $queue[] = $val;
            }

            if(array_key_exists($dequeue, $_POST) && count($queue) > 0) {
                $st = $queue;
                $queue = [];
                for($i = 0; $i < count($st) - 1; $i++) $queue[] = $st[$i];
            }
        }

        foreach($queue as $i => $e) $rv[] = sprintf($element, $i, $e);

        return $rv;
    }

    $queue = getQueue();
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Queue";
        $img = "./../images/p2-4.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <form action="./queue.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td><input type="text" name="value"></td>
                    <td><button name="enqueue" type="submit">Enqueue</button></td>
                </tr>
                <?php
                    foreach($queue as $i => $e) {
                        $elem = $e;
                        if($i != count($queue) - 1) echo("<td></td>");
                        else $elem .= "<td><button name='dequeue' type='submit'>Dequeue</button></td>";
                        echo("<tr>$elem</tr>");
                    }
                ?>
            </tbody>
        </table>
    </form>
</div>
<?php include_once("./../templates/_post.php") ?>