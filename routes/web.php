<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Route::resource('articles', 'ArticleController');


Route::get('/articles_', function () {
    $articles = [
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "Vivamus id massa ac ex rutrum vestibulum.",
        "Nam purus justo, porttitor vel urna id, blandit aliquam orci."
    ];
    return $articles;
});

Route::get('/article/{id}', function ($id) {
    $articles = [
        "Lorem ipsum dolor sit amet, consectetur adipiscing elit.",
        "Vivamus id massa ac ex rutrum vestibulum.",
        "Nam purus justo, porttitor vel urna id, blandit aliquam orci."
    ];
    if (!isset($articles[$id])) {
        return redirect()->route('welcome');
    }
    return $articles[$id];
})->where('id', '[0-9]+')
    ->name('article.show');

Route::get('/articles_/{year?}/{tags?}', function ($year = null, $tags = null) {
    $articles = [
        [
            "title" => "article n1",
            "year" => 2018,
            "tags" => ["Lorem", "TEST"]
        ],
        [
            "title" => "article n2",
            "year" => 2019,
            "tags" => ["Lorem", "Massa"]
        ],
        [
            "title" => "article n3",
            "year" => 2018,
            "tags" => ["Ipsum", "Massa"]
        ],
    ];
    foreach ($articles as $article) {

        if ($year == $article["year"]) {
            if (isset($tags)) {
                foreach ($article["tags"] as $articlesTag) {
                    if ($articlesTag == $tags ) {
                        echo $article["title"];
                    }
                }
            } else {
                echo $article["title"]. "</br>";
            }
        }
    }
    return;
//    return $articles[$year];
})->name('article-year-tag.show');