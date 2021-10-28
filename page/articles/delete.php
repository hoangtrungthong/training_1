<?php
require "../../Models/Article.php";

$article = new Article($conn);
$article->drop();
header("location: index.php");
