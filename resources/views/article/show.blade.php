
@extends('layouts.default')

@section('content')
    <div class="row">
        <section class="content">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Index Catalogue</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="pull-left">
                                    <h3>Articles</h3>
                                    {{$article->title}} / {{$article->content}}
                                </div>
                                <div class="pull-right">
                                    <a style="margin-top:10px;" href="{{route('articles.index')}}" class="btn btn-info">Revenir au Catalogue</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection