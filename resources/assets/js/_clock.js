window.toggleEventFields = function() {
    var eventType = document.getElementById('event_type').value;
    if (eventType == 'Online') {
        document.getElementById('location_field').style.display = 'none';
        document.getElementById('event_date_field').style.display = 'none';
    } else {
        document.getElementById('location_field').style.display = 'block';
        document.getElementById('event_date_field').style.display = 'block';
    }
}
