$(document).ready(function () {
  function mySuccess() {
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Success",
      showConfirmButton: false,
      timer: 2000,
    });
  }

  $("#contact").on("submit", function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./mail.php",
      data: data,
      success: function () {
        $("#contact [name='name']").val("");
        $("#contact [name='email']").val("");
        $("#contact [name='message']").val("");
        mySuccess();
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });
  load_data();
  function load_data(query) {
    $.ajax({
      url: "./database/read_blog.php",
      method: "post",
      data: { query: query },
      success: function (data) {
        $("#blogs").html(data);
      },
    });
  }
  let tinymce_editor_id = "blogbody";
  $("#tinyform").on("submit", function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./database/blog_post.php",
      data: data,
      success: function () {
        $("#blogModal").modal("hide");
        tinymce.get(tinymce_editor_id).setContent("");
        $("#tinyform [name='blogtitle']").val("");
        load_data();
        mySuccess();
        $("html, body").animate(
          {
            scrollTop: $("#scrollspyHeading2").offset().top,
          },
          1500
        );
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });

  $("#tinyform").on("keyup keypress", function (e) {
    let keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });

  //Get the button
  let mybutton = document.getElementById("btn-back-to-top");

  // When the user scrolls down 20px from the top of the document, show the button
  window.onscroll = function () {
    scrollFunction();
  };

  function scrollFunction() {
    if (
      document.body.scrollTop > 20 ||
      document.documentElement.scrollTop > 500
    ) {
      mybutton.style.display = "block";
    } else {
      mybutton.style.display = "none";
    }
  }
  // When the user clicks on the button, scroll to the top of the document
  mybutton.addEventListener("click", backToTop);

  function backToTop() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
  }
  $(document).on("click", "div", function () {
    $(this).removeClass("unselectable").siblings().addClass("unselectable");
  });

  getNews(
    "https://api.nytimes.com/svc/movies/v2/reviews/picks.json?order=by-opening-date&api-key=omyWtqvhb38C4ghGGG2JaGCctxGLY3Ek"
  );
  function getNews(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        showNews(data.results);
      });
  }
  var options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  const news = document.getElementById("news");
  function showNews(data) {
    news.innerHTML = "";
    data.forEach((newss) => {
      const {
        display_title,
        headline,
        summary_short,
        publication_date,
        byline,
        multimedia,
        link,
      } = newss;
      var date = new Date(publication_date);
      const movieEl = document.createElement("div");
      movieEl.innerHTML = `
      <div  class="card mb-3 blag m-3">
      <img src="${multimedia.src}" class="card-img-top" alt="${display_title}">
      <div class="card-body">
      <h5 class="card-title">${headline}</h5>
      <p class="card-text">${summary_short}</p>
      <p class="card-text"><small class="text-muted">-${byline}(${date.toLocaleDateString(
        "en-US",
        options
      )})</small></p>
      <a href="${
        link.url
      }" class="link-primary" target="_blank" rel="noopener noreferrer">${
        link.suggested_link_text
      }</a>
      </div>
      </div>
      `;
      news.appendChild(movieEl);
    });
  }
;

  ///////////////////////////////////////////////////////////////////////////////////////////////////////////////
});
