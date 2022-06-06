window.addEventListener("DOMContentLoaded", (event) => {
  const sidebarToggle = document.body.querySelector("#sidebarToggle");
  if (sidebarToggle) {
    sidebarToggle.addEventListener("click", (event) => {
      event.preventDefault();
      document.body.classList.toggle("sb-sidenav-toggled");
      localStorage.setItem(
        "sb|sidebar-toggle",
        document.body.classList.contains("sb-sidenav-toggled")
      );
    });
  }

  const datatablesSimple = document.getElementById("datatablesSimple");
  if (datatablesSimple) {
    new simpleDatatables.DataTable(datatablesSimple);
  }
  load_data();
  load_book();
  load_blog();
  function load_data(query) {
    $.ajax({
      url: "./database/read_emails.php",
      method: "post",
      data: { query: query },
      success: function (data) {
        $("#emailTable tbody").html(data);
      },
    });
  }
  function load_book(query) {
    $.ajax({
      url: "./database/moviebook.php",
      method: "post",
      data: { query: query },
      success: function (data) {
        $("#bookTable tbody").html(data);
      },
    });
  }
  function load_blog(query) {
    $.ajax({
      url: "./database/blog.php",
      method: "post",
      data: { query: query },
      success: function (data) {
        $("#blogTable tbody").html(data);
      },
    });
  }

  $("#search_text_book").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      load_book(search);
    } else {
      load_book();
    }
  });

  $("#search_text").keyup(function () {
    var search = $(this).val();
    if (search != "") {
      load_data(search);
    } else {
      load_data();
    }
  });

  function condel(id, name) {
    alertify.confirm(
      "Delete",
      "Confirm Deleting " + name + " ?",
      function () {
        window.location.href = "../database/delete.php?id=" + id;
      },
      function () {}
    );
  }
});
