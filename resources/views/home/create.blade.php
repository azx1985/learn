@extends("layout.default")

@section("content")
    <div class="col-sm-8 blog-main">
        <form action="create" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label>标题</label>
                <input name="title" type="text" class="form-control" value="{{ old('title') ? old('title') :'' }}" placeholder="这里是标题">
            </div>
            <div class="form-group">
                <label>内容</label>
                <script id="container" name="content" type="text/plain">
                    {!! old('content') ? old('content') :'' !!}
                </script>
            </div>
            @include("layout._error")
            <button type="submit" class="btn btn-default">提交</button>
        </form>
        <br>

    </div><!-- /.blog-main -->
@endsection