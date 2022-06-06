$(document).ready(function () {
  const API_KEY = "api_key=57f052e97d0ff9029387e3f0ed9a4312";
  const BASE_URL = "https://api.themoviedb.org/3";
  const API_URL = BASE_URL + "/movie/now_playing?" + API_KEY;
  const UPCOMING =
    BASE_URL +
    "/movie/upcoming?" +
    API_KEY +
    "&language=en-US&page=1&region=us";
  const IMG_URL = "https://image.tmdb.org/t/p/w500";
  const searchURL = BASE_URL + "/search/movie?" + API_KEY;
  const main = document.getElementById("main");
  const up_main = document.getElementById("up-main");
  const form = document.getElementById("form");
  const search = document.getElementById("search");
  const title = document.getElementById("what");
  const modti = document.getElementById("myNavLabel");

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
  getMovies2(UPCOMING);
  getMovies(API_URL);
  console.log(API_URL);
  
  function getMovies2(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        if (data.results.length !== 0) {
          showMovies2(data.results);
        } else {
          main.innerHTML = `<h1 class="no-results">No Results Found</h1>`;
        }
      });
  }
  function getMovies(url) {
    fetch(url)
      .then((res) => res.json())
      .then((data) => {
        if (data.results.length !== 0) {
          showMovies(data.results);
        } else {
          main.innerHTML = `<h1 class="no-results">No Results Found</h1>`;
        }
      });
  }

  function showMovies(data) {
    main.innerHTML = "";
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
        <button type="button" id="${id}" class="btn btn-outline-dark know-more m-2 mt-0" data-bs-toggle="modal" data-bs-target="#myNav">Know More</button>
      </div>
      `;
      main.appendChild(movieEl);
      document.getElementById(id).addEventListener("click", () => {
        localStorage.setItem("id", id);
        getVid(movie);
      });
    });
  }

  function timeConvert(n) {
    var num = n;
    var hours = num / 60;
    var rhours = Math.floor(hours);
    var minutes = (hours - rhours) * 60;
    var rminutes = Math.round(minutes);
    return rhours + "h " + rminutes + "m";
  }

  function showMovies2(data) {
    up_main.innerHTML = "";
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
        <button type="button" id="${id}" class="btn btn-outline-dark know-more m-2 mt-0 " name="up" data-bs-toggle="modal" data-bs-target="#myNav">Know More</button>
      </div>
      `;
      up_main.appendChild(movieEl);
      document.getElementById(id).addEventListener("click", () => {
        localStorage.setItem("id", id);
        getVid(movie);
      });
    });
  }

  const overlayContent = document.getElementById("overlay-content");
  function getVid(movie) {
    let id = movie.id;
    console.log(id);
    let time = "";
    fetch(BASE_URL + "/movie/" + id + "/videos?" + API_KEY)
      .then((res) => res.json())
      .then((videoData) => {
        if (videoData) {
          fetch(BASE_URL + "/movie/" + id + "?" + API_KEY)
            .then((res) => res.json())
            .then((detail) => {
              time = timeConvert(detail.runtime);
              if (videoData.results.length > 0) {
                var embed = [];
                embed.push(
                  `<h6 class="align-self-start border-bottom"> ${getGenre(
                    movie.genre_ids
                  )} | ${time}</h6>`
                );
                embed.push(`<p >${movie.overview}</p>`);
                videoData.results.forEach((video) => {
                  let { name, key, site } = video;
                  if (site == "YouTube" && name.includes("Trailer")) {
                    embed.push(`
                  <iframe width="600" height="300" src="https://www.youtube.com/embed/${key}" 
                  title="${name}" class="embed hide" frameborder="0" 
                  encrypted-media;
                  allowfullscreen></iframe>
              
              `);
                  }
                });
                modti.innerHTML = `<h4 class="mb-0">${
                  movie.original_title
                } <span class="badge bg-primary">${movie.release_date.substring(
                  0,
                  4
                )}</span></h4>
                 `;
                overlayContent.innerHTML = embed.join("");
                activeSlide = 0;
                showVideos();
              } else {
                modti.innerHTML = `<h4 class="mb-0">${
                  movie.original_title
                } <span class="badge bg-primary">${movie.release_date.substring(
                  0,
                  4
                )}</span></h4></span></h4>
                 `;
                overlayContent.innerHTML = `
                <h6 class="align-self-start border-bottom"> ${getGenre(
                  movie.genre_ids
                )} | ${time}</h6>
                <p >${movie.overview}</p>
                <h1 class="no-results">No Available Video</h1>
                `;
              }
            });
        }
      });
  }

  var activeSlide = 0;

  function showVideos() {
    let embedClasses = document.querySelectorAll(".embed");

    totalVideos = embedClasses.length;
    embedClasses.forEach((embedTag, idx) => {
      if (activeSlide == idx) {
        embedTag.classList.add("show");
        embedTag.classList.remove("hide");
      } else {
        embedTag.classList.add("hide");
        embedTag.classList.remove("show");
      }
    });
  }

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

  form.addEventListener("keyup", (e) => {
    e.preventDefault();

    const searchTerm = search.value;
    if (searchTerm) {
      title.innerText = "Search Results";
      $("#main").removeClass("pre-scrollable");
      $("#main").removeClass("flex-nowrap");
      $("#main").addClass("flex-wrap");
      $("#main").addClass("justify-content-center");
      getMovies(searchURL + "&query=" + searchTerm);
    } else {
      title.innerText = "What's Popular?";
      $("#main").addClass("flex-nowrap");
      $("#main").addClass("pre-scrollable");
      $("#main").removeClass("justify-content-center");

      getMovies(API_URL);
    }
  });

  $("#myNav").on("hidden.bs.modal", function (e) {
    $("#overlay-content iframe").attr(
      "src",
      $("#overlay-content iframe").attr("src")
    );
  });

  $("#search").on("keyup keypress", function (e) {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
      e.preventDefault();
      return false;
    }
  });
});
