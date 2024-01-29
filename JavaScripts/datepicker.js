$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom1").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo1").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo1").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom2").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo2").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo2").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom3").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo3").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo3").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom4").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo4").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo4").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom5").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo5").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo5").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom6").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo6").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo6").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom7").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo7").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo7").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom8").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo8").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo8").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom9").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo9").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo9").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom10").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo10").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo10").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom11").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo11").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo11").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom12").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo12").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo12").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom13").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo13").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo13").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

$(function() {
  var maxDate = new Date();
  maxDate.setFullYear(maxDate.getFullYear() + 1);

  var today = new Date();
  var minDate = new Date(today.getFullYear(), today.getMonth(), today.getDate());

  $("#ReservedFrom14").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    },
    onSelect: function(selectedDate) {
      var date = new Date(selectedDate);
      date.setDate(date.getDate() + 1);
      $("#ReservedTo14").datepicker("option", "minDate", date);
    }
  });

  $("#ReservedTo14").datepicker({
    dateFormat: "yy-mm-dd",
    changeMonth: true,
    changeYear: true,
    minDate: minDate,
    maxDate: maxDate,
    beforeShowDay: function(date) {
      return [date >= today];
    }
  });
});

