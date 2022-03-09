<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        *{
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }
        .news{
            width: 80%;
            margin: 100px auto;
            columns: 3 250px;
        }
        .card{
            width: 100%;
            box-shadow: 0 0 5px rgb(0 0 0 / 50%);
            padding: 10px 15px;
            margin: 10px;
        }
        .card-img{
            width: 100%;
        }
        .title{

        }
        .author{

        }
        .description{

        }
    </style>
</head>
<body>
<p id="con"></p>
<div class="news">

</div>
<script>
    let con = document.getElementById("con");
    con.innerHTML = "loading";

    <?php

        $x = file_get_contents("https://newsapi.org/v2/everything?q=tesla&from=2022-01-26&sortBy=publishedAt&apiKey=97359c23cabe4d48bccbbcb0968ca2aa");

    ?>

    let data = <?php echo $x; ?>

        // console.log(data);
            con.innerHTML = "success";
            let article = data.articles;
            let news = document.querySelector(".news");
            article.map(function (el,index) {
                console.log(el);
                news.innerHTML += `
                    <div class="card">
                        <img class="card-img" src="${el.urlToImage}" alt="">
                        <h4 class="title">${el.title}</h4>
                        <small class="author">${el.author}</small>
                        <p class="description">${el.description}</p>
                        <a href="${el.url}" class="read-more">Read More</a>
                    </div>
                `;
            });
</script>
</body>
</html>