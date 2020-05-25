$(document).ready(function () {
  $("#result").html(
    '<tr><td colspan="6">กรอกชื่อหรือชื่อผู้ใช้เพื่อนค้นหา</td></tr>'
  );
  $("#search_text").keyup(function () {
    var txt = $(this).val();
    if (txt != "") {
      $("#result").html("");
      $.ajax({
        url: "fetch_table.php",
        method: "post",
        data: { search: txt },
        dataType: "text",
        success: function (data) {
          $("#result").html(data);
        },
      });
    } else {
      $("#result").html(
        '<tr><td colspan="6">กรอกชื่อหรือชื่อผู้ใช้เพื่อค้นหา</td></tr>'
      );
    }
  });
});

$(document).ready(function () {
  $("#result2").html(
    '<div class="card-container"> กรอกชื่อหรือชื่อผู้ใช้เพื่อนค้นหา </div>'
  );
  $("#search_text").keyup(function () {
    var txt = $(this).val();
    if (txt != "") {
      $("#result2").html("");
      $.ajax({
        url: "fetch_mobile.php",
        method: "post",
        data: { search: txt },
        dataType: "text",
        success: function (data) {
          $("#result2").html(data);
        },
      });
    } else {
      $("#result2").html(
        '<div class="card-container"> กรอกชื่อหรือชื่อผู้ใช้เพื่อค้นหา </div>'
      );
    }
  });
});
