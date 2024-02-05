<?php require('form_add.php') ?>

<script>
    const startDateInput = document.getElementById('input_date_start_event');
    const endDateInput = document.getElementById('input_date_end_event');
    const timeDiffInput = document.getElementById('input_date_time_event');
    function calculateTimeDifference() {
        const startDate = new Date(startDateInput.value);
        const endDate = new Date(endDateInput.value);
        const timeDiff = endDate - startDate;
        const timeDiffInMinutes = Math.floor(timeDiff / (1000 * 60));
        timeDiffInput.value = timeDiffInMinutes;
    }
    startDateInput.addEventListener('change', calculateTimeDifference);
    endDateInput.addEventListener('change', calculateTimeDifference);
</script>
<?php require('add_event_settings.php') ?>
