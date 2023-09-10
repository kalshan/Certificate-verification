<?php
/*
Plugin Name: Student Records
Description: A simple student records plugin.
Version: 1.0
Author: Your Name
*/

// Include view-student-records and add-student-record pages
include_once('view-student-records.php');
include_once('add-student-record.php');

// Enqueue CSS
function student_records_enqueue_scripts() {
    if (isset($_GET['page']) && ($_GET['page'] === 'student-records' || $_GET['page'] === 'add-student-record')) {
        wp_enqueue_style('student-records-style', plugins_url('student-records.css', __FILE__));
    }
}
add_action('admin_enqueue_scripts', 'student_records_enqueue_scripts');

// Add menu items
function student_records_menu() {
    add_menu_page('Student Records', 'Student Records', 'manage_options', 'student-records', 'view_student_records_page');
    add_submenu_page('student-records', 'Add Student Record', 'Add New', 'manage_options', 'add-student-record', 'add_student_record_page');
}
add_action('admin_menu', 'student_records_menu');
?>
