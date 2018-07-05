@extends("layout.default")
@section("content")
        <div class="col-sm-8 blog-main">
            <form action="/article/doedit" method="POST">
                {{csrf_field()}}
                <input name="id" type="hidden" class="form-control" value="{{ old('id') ? old('id') : $article->id }}">
                <div class="form-group">
                    <label>标题</label>
                    <input name="title" type="text" class="form-control" value="{{ old('title') ? old('title') : $article->title }}">
                </div>
                <div class="form-group">
                    <label>内容</label>
                    <script id="container" name="content" type="text/plain">
                        {!! old('content') ? old('content') : $article->content !!}
                    </script>
                </div>
                <button type="submit" class="btn btn-default">提交</button>
            </form>
            <br>
        </div><!-- /.blog-main -->
@endsection