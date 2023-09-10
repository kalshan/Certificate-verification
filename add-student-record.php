<?php
function add_student_record_page() {
    global $wpdb;

    if (isset($_POST['submit'])) {
        $student_name = sanitize_text_field($_POST['student_name']);
        $university_reference = sanitize_text_field($_POST['university_reference']);
        $assessor_reference = sanitize_text_field($_POST['assessor_reference']);
        $program_name = sanitize_text_field($_POST['program_name']);

        // Handle file upload
        $uploaded_file = '';

        if (isset($_FILES['uploaded_file']) && $_FILES['uploaded_file']['error'] === UPLOAD_ERR_OK) {
            $file_name = sanitize_file_name($_FILES['uploaded_file']['name']);
            $upload_dir = wp_upload_dir(); // Get the WordPress uploads directory
            $upload_path = $upload_dir['path'] . '/' . $file_name;

            if (move_uploaded_file($_FILES['uploaded_file']['tmp_name'], $upload_path)) {
                $uploaded_file = $file_name;
            }
        }

        // Insert data into the database
        $wpdb->insert("{$wpdb->prefix}student_records", array(
            'student_name' => $student_name,
            'university_reference' => $university_reference,
            'assessor_reference' => $assessor_reference,
            'program_name' => $program_name,
            'uploaded_file' => $uploaded_file,
        ));

        echo '<div class="notice notice-success"><p>Student record added successfully!</p></div>';
    }

    echo '<h2>Add New Student Record</h2>';
    echo '<div class="add-student-record-form">';
    echo '<form method="post" enctype="multipart/form-data">';
    echo '<table class="form-table">';
    echo '<tr><th scope="row">Student Name</th><td><input type="text" name="student_name" /></td></tr>';
    echo '<tr><th scope="row">University Reference</th><td><input type="text" name="university_reference" /></td></tr>';
    echo '<tr><th scope="row">Assessor Reference</th><td><input type="text" name="assessor_reference" /></td></tr>';
    echo '<tr><th scope="row">Program Name</th><td><input type="text" name="program_name" /></td></tr>';
    echo '<tr><th scope="row">Uploaded File</th><td><input type="file" name="uploaded_file" /></td></tr>';
    echo '</table>';
    echo '<p class="submit"><input type="submit" name="submit" class="button-primary" value="Add Student Record" /></p>';
    echo '</form>';
    echo '</div>';
}
?>
