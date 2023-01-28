<?php $title = "Stack"; include_once("./../templates/_pre.php"); ?>
<?php
    function getStack(
        $element="<td><input name='stack[%s]' value='%s' readonly></td>",
        $name="stack",
        $value="value",
        $push="push",
        $pop="pop"
    ) {
        $stack = [];
        $rv = [];

        if(isset($_POST)) {
            if(array_key_exists($push, $_POST) && array_key_exists($value, $_POST)) {
                $val = $_POST[$value] ?? null;
                if(!empty($val)) $stack[] = $val;
            }

            if(array_key_exists($name, $_POST)) {
                foreach($_POST[$name] as $val) $stack[] = $val;
            }

            if(array_key_exists($pop, $_POST) && count($stack) > 0) {
                $st = $stack;
                $stack = [];
                for($i = 1; $i < count($st); $i++) $stack[] = $st[$i];
            }
        }

        foreach($stack as $i => $e) $rv[] = sprintf($element, $i, $e);

        return $rv;
    }

    $stack = getStack();
?>
<div>
    <a href="./../index.php">Home</a>
    <hr/>
    <?php
        $part = "Stack";
        $img = "./../images/p2-3.png";
        include_once("./../templates/_pre-part.php")
    ?>
    <form action="./stack.php" method="post">
        <table>
            <tbody>
                <tr>
                    <td><input type="text" name="value"></td>
                    <td><button name="push" type="submit">Push</button></td>
                </tr>
                <?php
                    foreach($stack as $i => $e) {
                        $elem = $e;
                        if($i != 0) echo("<td></td>");
                        else $elem .= "<td><button name='pop' type='submit'>Pop</button></td>";
                        echo("<tr>$elem</tr>");
                    }
                ?>
            </tbody>
        </table>
    </form>
</div>
<?php include_once("./../templates/_post.php") ?>