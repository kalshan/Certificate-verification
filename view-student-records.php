<?php
function view_student_records_page() {
    global $wpdb;

    echo '<h2>View Student Records</h2>';
    echo '<div class="student-records-table">';
    echo '<table class="wp-list-table widefat fixed striped">';
    echo '<thead>';
    echo '<tr>';
    echo '<th>ID</th>';
    echo '<th>Student Name</th>';
    echo '<th>University Reference</th>';
    echo '<th>Assessor Reference</th>';
    echo '<th>Program Name</th>';
    echo '<th>Uploaded File</th>';
    echo '<th>View Details</th>';
    echo '<th>Edit Details</th>';
    echo '</tr>';
    echo '</thead>';
    echo '<tbody>';

    // Retrieve student records from the database (implement your data retrieval logic here)
    $student_records = $wpdb->get_results("SELECT * FROM wp_student_records");

    foreach ($student_records as $record) {
        echo '<tr>';
        echo '<td>' . esc_html($record->id) . '</td>';
        echo '<td>' . esc_html($record->student_name) . '</td>';
        echo '<td>' . esc_html($record->university_reference) . '</td>';
        echo '<td>' . esc_html($record->assessor_reference) . '</td>';
        echo '<td>' . esc_html($record->program_name) . '</td>';
        echo '<td>' . esc_html($record->uploaded_file) . '</td>';
        echo '<td><a href="#" class="view-details" data-id="' . esc_attr($record->id) . '">View</a></td>';
        echo '<td><a href="#" class="edit-details" data-id="' . esc_attr($record->id) . '">Edit</a></td>';
        echo '</tr>';
    }

    echo '</tbody>';
    echo '</table>';
    echo '</div>';

    // JavaScript and AJAX code for handling popup and edit functionality (implement this)
}
?>
