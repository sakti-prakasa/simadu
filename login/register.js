$(document).ready(function() {
    // Fetch classes using Ajax
    $.ajax({
        url: 'fetch_classes.php',
        type: 'GET',
        success: function(response) {
            var classes = JSON.parse(response);
            var classSelect = $('#class_id');

            // Populate class options
            classes.forEach(function(classData) {
                var option = $('<option>');
                option.val(classData.id_class);
                option.text(classData.name);
                classSelect.append(option);
            });
        }
    });

    // Handle form submission
    $('#teacher-registration-form').submit(function(event) {
        event.preventDefault();

        var form = $(this);
        var formData = form.serialize();

        // Send form data using Ajax
        $.ajax({
            url: 'register_teacher.php',
            type: 'POST',
            data: formData,
            success: function(response) {
                // Display success message or handle errors
                console.log(response);
            }
        });
    });
});
