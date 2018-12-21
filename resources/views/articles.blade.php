@extends('layouts.app')

@section('content')

<!-- Bootstrap шаблон... -->

<div class="panel-body">
    <!-- Отображение ошибок проверки ввода -->
    @include('common.errors')

    <!-- Форма новой задачи -->
    <form action="{{ url('admin/article') }}" method="POST" class="form-horizontal">
	{{ csrf_field() }}

	<!-- Имя задачи -->
	<div class="form-group">
	    <label for="article" class="col-sm-3 control-label">Название статьи</label>

	    <div class="col-sm-6">
		<input type="text" name="name" id="article-name" class="form-control">
	    </div>
	</div>
	<div class="form-group">
	    <label for="shortName" class="col-sm-3 control-label">Краткое описание статьи</label>

	    <div class="col-sm-6">
		<input type="text" name="shortName" id="article-name" class="form-control">
	    </div>
	</div>
	<div class="form-group">
	    <label for="fullName" class="col-sm-3 control-label">Полное описание статьи</label>

	    <div class="col-sm-6">
		<textarea name="fullName" id="article-name" class="form-control"></textarea>
	    </div>
	</div>

	<!-- Кнопка добавления задачи -->
	<div class="form-group">
	    <div class="col-sm-offset-3 col-sm-6">
		<button type="submit" class="btn btn-default">
		    <i class="fa fa-plus"></i> Добавить статью
		</button>
	    </div>
	</div>
    </form>
</div>












  @if (count($articles) > 0)
    <div class="panel panel-default">
      <div class="panel-heading">
        Статьи
      </div>

      <div class="panel-body">
        <table class="table table-striped task-table">

          <!-- Заголовок таблицы -->
          <thead>
            <th>Название</th>
            <th>Короткое описание</th>
            <th>Полное описание</th>
            <th>Actions</th>
          </thead>

          <!-- Тело таблицы -->
          <tbody>
            @foreach ($articles as $article)
              <tr>
                <!-- Имя задачи -->
                <td class="table-text">
                  <div>{{ $article->name }}</div>
                </td>
                <td class="table-text">
                  <div>{{ $article->shortName }}</div>
                </td>
                <td class="table-text">
                  <div>{{ $article->fullName }}</div>
                </td>

                <td>
			<form action="{{url('admin/article/'.$article->id)}}" method="post">
			    {{method_field('DELETE')}}
			    {{csrf_field()}}
			    <button type="submit" class="btn btn-default">
				<i class="fa fa-trash"></i> Удалить статью</button>
			<form action="{{url('admin/article/'.$article->id)}}" method="post">
			    {{method_field('PATCH')}}
			    {{csrf_field()}}
			    <button type="submit" class="btn btn-default">
				<i class="fa fa-pencil"></i> Редактировать статью</button>
		    </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
   @endif
@endsection