<div id="gcal"></div>
<script type="Text/Javascript">
	$(document).ready(function() {
		$('#gcal').fullCalendar({
			header: {
				left: 'prev',
				center: 'title',
				right: 'today next'
			},
			eventMouseover: function(event, jsEvent, view) {
				if (view.name !== 'agendaDay') {
					$(jsEvent.target).attr('title', event.title);
				}
			},			
			events: 'calendar_feed.php'
		});
	});
</script>