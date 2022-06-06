$(document).ready(function () {
  const API_KEY = "?api_key=57f052e97d0ff9029387e3f0ed9a4312";
  const BASE_URL = "https://api.themoviedb.org/3";
  const IMG_URL = "https://image.tmdb.org/t/p/original";
  const cast = document.getElementById("cast");
  const mov = document.getElementById("mov");
  const sim = document.getElementById("similar");
  const backdrop = document.querySelector(".movie-info");

  const genres = [
    {
      id: 28,
      name: "Action",
    },
    {
      id: 12,
      name: "Adventure",
    },
    {
      id: 16,
      name: "Animation",
    },
    {
      id: 35,
      name: "Comedy",
    },
    {
      id: 80,
      name: "Crime",
    },
    {
      id: 99,
      name: "Documentary",
    },
    {
      id: 18,
      name: "Drama",
    },
    {
      id: 10751,
      name: "Family",
    },
    {
      id: 14,
      name: "Fantasy",
    },
    {
      id: 36,
      name: "History",
    },
    {
      id: 27,
      name: "Horror",
    },
    {
      id: 10402,
      name: "Music",
    },
    {
      id: 9648,
      name: "Mystery",
    },
    {
      id: 10749,
      name: "Romance",
    },
    {
      id: 878,
      name: "Science Fiction",
    },
    {
      id: 10770,
      name: "TV Movie",
    },
    {
      id: 53,
      name: "Thriller",
    },
    {
      id: 10752,
      name: "War",
    },
    {
      id: 37,
      name: "Western",
    },
  ];

  let id = localStorage.getItem("id");
  getCast(BASE_URL + "/movie/" + id + "/credits" + API_KEY);
  getMovie(BASE_URL + "/movie/" + id + API_KEY);
  getMovies(BASE_URL + "/movie/" + id + "/similar" + API_KEY);
  function getCast(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        showCast(data.cast);
      });
  }

  function showCast(data) {
    cast.innerHTML = "";
    data.forEach((movie) => {
      const { name, profile_path, character } = movie;
      const movieEl = document.createElement("div");
      movieEl.innerHTML = `
      <div class="card mx-3 my-3 cast" ">
      <img src=" ${
        profile_path
          ? IMG_URL + profile_path
          : "https://i.ibb.co/2gCb6Vs/person.png"
      }" class=" card-img-top rounded-3" alt="">
      <div class="card-body cbadi">
          <h6 class="card-title fw-bold">${name}</h6>
          <p class="card-text">${character}</p>
      </div>
      </div>`;
      cast.appendChild(movieEl);
    });
  }

  const bookLabel = document.getElementById("bookLabel");
  function getMovie(url) {
    mov.innerHTML = "";

    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        const {
          original_title,
          overview,
          poster_path,
          backdrop_path,
          release_date,
          genres,
          runtime,
        } = data;
        var date = new Date(release_date);
        mov.innerHTML = `
        
      <div class="cover p-3  ">
            <img src="${
              IMG_URL + poster_path
            }" alt="${original_title}" class="rounded-3">
      </div>
     <div class="info m-3 ">
            <h3 class="fw-bold">${original_title} <span class="badge bg-primary">${release_date.substring(
          0,
          4
        )}</span></h3>
            <h6>${date.toLocaleDateString("en-US", options)} | ${getGenres(
          genres
        )} | ${timeConvert(runtime)}</h6>
            <h5 class="border-bottom mt-2">Overview</h5>
            <p>${overview}</p>
            <div class='py-3'>${book(release_date)}</div>
      </div>
      
      `;
        bookLabel.innerText = original_title;
        $("#bookForm [name='moviename']").val(original_title);

        backdrop.style.backgroundImage = `linear-gradient(
            to right,
            rgba(1, 8, 49,.9),
            rgba(5, 0, 51, 0.760)
          ),url(${IMG_URL}${backdrop_path})`;
      });
  }

  function getGenres(genre) {
    let gen = "";
    if (Object.keys(genre).length !== 0) {
      for (let i = 0; i < genre.length; i++) {
        gen += genre[i].name + ", ";
        if (i === genre.length - 1) {
          return gen.slice(0, -2);
        }
      }
    } else {
      return "Not Available";
    }
  }
  function timeConvert(n) {
    var num = n;
    var hours = num / 60;
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    return rhours + "h " + rminutes + "m";
  }

  var options = {
    weekday: "long",
    year: "numeric",
    month: "long",
    day: "numeric",
  };
  function book(rdate) {
    let d = new Date(rdate);
    let s = new Date(rdate);
    let a = new Date(d.setMonth(d.getMonth() + 4));
    let today = new Date();
    console.log(id);
    if (today > s && today < a) {
      return `<button type="button" class="btn btn-primary w-25 " data-bs-toggle="modal" data-bs-target="#book" id=${id}>Book</button>`;
    } else if (today < s) {
      return `<button type="button" class="btn btn-primary" disabled>Not Yet Available</button>`;
    } else {
      return `
      <div class="alert alert-warning" role="alert">
        You can only book movie after 4 months of its release.
      </div>
        <button type="button" class="btn btn-primary" disabled>Booking Already Ended</button>
      `;
    }
  }
  function mySuccess() {
    Swal.fire({
      position: "center",
      icon: "success",
      title: "Success",
      showConfirmButton: false,
      timer: 2000,
    });
  }

  function getMovies(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        showMovies(data.results);
      });
  }

  function showMovies(data) {
    sim.innerHTML = "";
    data.forEach((movie) => {
      const { title, poster_path, vote_average, release_date, genre_ids, id } =
        movie;
      const movieEl = document.createElement("div");
      movieEl.innerHTML = `
      <div class="card mx-3 my-3 movie" ">
      <img src="${
        poster_path
          ? IMG_URL + poster_path
          : "https://i.ibb.co/wJv779c/place.png"
      }" class=" card-img-top rounded-3" alt="${title}">
      <div class="card-body badi pb-0">
          <span class="taytel fw-bold">${title}</span>
          <p class="card-text mb-0"><small class="text-muted gen">${getGenre(
            genre_ids
          )}</small></p>
         <div class="card-img-overlay d-flex flex-row justify-content-between align-content-between flex-wrap">
             <span class="badge bg-light text-dark">${release_date.substring(
               0,
               4
             )}</span> <span class="badge ${getColor(vote_average)}">⭐ ${
        vote_average ? vote_average : "N/A"
      }</span>
          </div>    
      </div>
        <button type="button" id="${id}" class="btn btn-outline-dark know-more m-2 mt-0" >Know More</button>
      </div>
      `;
      sim.appendChild(movieEl);
    });
  }
  $(document).on("click", ".know-more", function () {
    localStorage.setItem("id", this.id);
    window.location.href = "./booking.php";
  });

  function getColor(vote) {
    if (vote >= 8) {
      return "bg-success";
    } else if (vote >= 5) {
      return "bg-warning";
    } else {
      return "bg-danger";
    }
  }

  function getGenre(genre) {
    let gen = "";
    if (Object.keys(genre).length !== 0) {
      for (let i = 0; i < genre.length; i++) {
        for (let j = 0; j < genres.length; j++) {
          if (genre[i] == genres[j].id) {
            gen += genres[j].name + ", ";
            if (i === genre.length - 1) {
              return gen.slice(0, -2);
            }
          }
        }
      }
    } else {
      return "Not Available";
    }
  }

  $("#bookForm").on("submit", function (e) {
    e.preventDefault();
    let data = $(this).serialize();
    $.ajax({
      type: "POST",
      url: "./database/book.php",
      data: data,
      success: function () {
        $("#bookForm [name='fname']").val("");
        $("#bookForm [name='lname']").val("");
        $("#bookForm [name='email']").val("");
        $("#bookForm [name='nums']").val("");
        $("#bookForm [name='amount']").val("");
        $("#location").val($("#location option:first").val());
        $("#theatre").val($("#theatre option:first").val());
        $("#snacks").val($("#snacks option:first").val());
        $("#book").modal("hide");
        mySuccess();
      },
      error: function (xhr, status, error) {
        $("body").html("<h1>" + xhr["status"] + " " + error + "</h1>");
      },
    });
  });
});
