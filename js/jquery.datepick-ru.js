/* http://keith-wood.name/datepick.html
   Russian localisation for jQuery Datepicker.
   Written by Andrew Stromnov (stromnov@gmail.com). */
(function($) {
	$.datepick.regional['ru'] = {
		monthNames: ['Январь','Февраль','Март','Апрель','Май','Июнь',
		'Июль','Август','Сентябрь','Октябрь','Ноябрь','Декабрь'],
		monthNamesShort: ['Янв','Фев','Мар','Апр','Май','Июн',
		'Июл','Авг','Сен','Окт','Ноя','Дек'],
		dayNames: ['Воскресенье','Понедельник','Вторник','Среда','Четверг','Пятница','Суббота'],
		dayNamesShort: ['вс','пн','вт','ср','чт','пт','сб'],
		dayNamesMin: ['Вс','Пн','Вт','Ср','Чт','Пт','Сб'],
		dateFormat: 'dd.mm.yyyy', firstDay: 1,
		renderer: $.datepick.defaultRenderer,
		prevText: '&#x3c;Пред',  prevStatus: '',
		prevJumpText: '&#x3c;&#x3c;', prevJumpStatus: '',
		nextText: 'След&#x3e;', nextStatus: '',
		nextJumpText: '&#x3e;&#x3e;', nextJumpStatus: '',
		currentText: 'Текущий', currentStatus: '',
		todayText: 'Текущий', todayStatus: '',
		clearText: 'Очистить', clearStatus: '',
		closeText: 'Закрыть', closeStatus: '',
		yearStatus: '', monthStatus: '',
		weekText: 'Неделя', weekStatus: '',
		dayStatus: 'D, M d', defaultStatus: '',
		isRTL: false
	};
	$.datepick.setDefaults($.datepick.regional['ru']);
})(jQuery);
