<?php

include_once 'parsing/Stat_xmlparser.php';
if (isset($_GET['type'])) {
    $statParser  = new StatxmlParser($_GET['type']);
}
?>