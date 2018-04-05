<?php
session_start();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include_once('classes/Priority.php');
    $Priority = new Priority;
    $get_output = $Priority->setData($_POST)->getOutput();
    if ($get_output == true) {
        $_SESSION['a_w_time'] = $get_output;
        header('Location: index.php');
    } else {
        $_SESSION['error'] = "<span class='error'>Please provide A valid input!</span>";
        header('Location: index.php');
    }
} else {
    $_SESSION['error'] = "<span class='error'>Invalid authentication!</span>";
    header('Location: index.php');
}