@extends('admin.layouts.layout')

@section('content')
 <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Редактирование статей</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Главная</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h3 class="card-title">Статья "{{$post->title}}"</h3>
        </div>
        <form role="form" method="post" action="{{route('posts.update', ['post'=>$post->id]) }}" enctype="multipart/form-data"> 
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="form-group">
                    <label for="title">Название</label>
                    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{$post->title}}" >
                    
                </div>
                <div class="form-group">
                    <label for="description">Цитата</label>
                    <textarea class="form-control" id="description" name="description" rows="3">{{$post->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="content">Контент</label>
                    <textarea class="form-control" id="content" name="content" rows="7">{{$post->content}}</textarea>
                </div>
                <div class="form-group">
                    <label for="category_id">Категория</label>
                    <select class="form-control @error('category_id') is-invalid @enderror" name="category_id" id="category_id">
                      @foreach($categories as $k => $v)
                      <option value="{{$k}}" @if($k==$post->category_id) selected @endif>{{$v}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tags">Теги</label>
                    <select class="select2 form-control" name="tags[]" id="tags" multiple="multiple" data-pleholder="Выбор тегов" style="width 100%;">
                      @foreach($tags as $k => $v)
                      <option value="{{$k}}" @if(in_array($k, $post->tags->pluck('id')->all())) selected @endif>{{$v}}</option>
                      @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="thumbnail">Изображение</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="thumbnail" id="thumbnail" class="custom-file-input">
                        <label class="custom-file-label" for="thumbnail">Выбрать файл</label>
                      </div>
                    </div>
                    <div><img src="{{$post->getImage()}}" alt="" class="img-thumbnail mt-2" width="200"></div>
                </div>

            </div>
            
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Сохранить</button>
            </div>   
        </form>
            
            </div>
        </div>
    </div>
</div>
</section>
@endsection