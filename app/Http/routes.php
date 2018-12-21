<?php

use App\Article;
use Illuminate\Http\Request;

/**
 * Вывести панель с задачами
 */
Route::get('admin/', function () {
    $article = new Article();
    $articles = $article -> all();
    return view('articles', [
	'articles' => $articles
    ]);
});

/**
 * Добавить новую задачу
 */
Route::post('admin/article', function (Request $request) {
    $validator = Validator::make($request->all(), [
		'name' => 'required|max:255|min:3',
		'shortName' => 'required|max:65535|min:3',
		'fullName' => 'required|min:10',
    ]);

    if ($validator->fails()) {
	return redirect('admin/')
			->withInput()
			->withErrors($validator);
    }

    $article = new Article();
    $article->name = $request->name;
    $article->shortName = $request->shortName;
    $article->fullName = $request->fullName;
    $article->save();

    return redirect('admin/');
});

/**
 * Удалить задачу
 */
Route::delete('admin/article/{article}', function (Article $article) {
  $article->delete();

  return redirect('admin/');
});
Route::patch('admin/article/{article}', function (Article $article){
    $article->edit();	    
});
