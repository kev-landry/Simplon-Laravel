@extends('layouts.default')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Index Catalogue</h3>
                    </div>
                    <form method="GET" action=""  role="search">
                        <div class="input-group custom-search-form">
                            <input type="text" class="form-control" name="keyword" keyword="search" placeholder="Rechercher">
                            <span class="input-group-btn">
                      <button class="btn btn-default-sm" type="submit">
                          <i class="fa fa-search"></i>
                      </button>
                  </span>
                        </div>
                    </form>
                    <div class="panel-body">
                        @if(Session::has('success'))
                            <div class="alert alert-info">
                                {{Session::get('success')}}
                                {{Session::get('success')}}
                            </div>
                        @endif
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3>Articles</h3>
                                </div>
                                <div class="pull-right">
                                    <a style="margin-top:10px;" href="" class="btn btn-info">Ajouter</a>
                                </div>
                            </div>
                        </div>
                        <div class="table-container">
                            <table id="table1" class="table table-bordered table-striped">
                                <thead>
                                <th><input type="checkbox" id="checkall"/></th>
                                <th>Title</th>
                                <th>Content</th>
                                <th colspan="2" style="text-align: center">Action</th>
                                </thead>
                                <tbody>
                                @if($articles->count())
                                    @if($keyword)
                                        @foreach($articles_found as $article_found)
                                            <tr>
                                                <td><input type="checkbox" class=""/></td>
                                                <td><a href="{{route('articles.show', ['article' => $article])}}">{{ $article_found->title }}</a></td>
                                                <td>{{ $article_found->content }}</td>
                                                <td><a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $article_found->id)}}" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                                                    <form class="" action="{{ action('UserController@destroy', $article_found->id)}}" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="delete">
                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        @foreach($articles as $article)
                                            <tr>
                                                <td><input type="checkbox" class=""/></td>
                                                <td><a href="{{route('articles.show', ['slug' => $article->slug])}}">{{ $article->title }}</a></td>
                                                <td>{{ $article->slug }}</td>
                                                <td><a class="btn btn-primary btn-xs" href="" ><span class="glyphicon glyphicon-pencil"></span></a></td>
                                                <td>
                                                    <form class="" action="" method="post">
                                                        {{csrf_field()}}
                                                        <input name="_method" type="hidden" value="delete">
                                                        <button class="btn btn-danger btn-xs" type="submit"><span class="glyphicon glyphicon-trash"></span></button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif
                                @else
                                    <tr>
                                        <td colspan="7">Aucun résultats trouvés !</td>
                                    </tr>
                                @endif
                                </tbody>
                            </table>
                            {{ $articles->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

{{--@extends('layouts.default')--}}


{{--@section('content')--}}

    {{--@foreach ($articles as $article)--}}
        {{--{{$article->title}}--}}
    {{--@endforeach--}}

{{--@endsection--}}
