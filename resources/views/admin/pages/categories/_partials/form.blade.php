@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$category->name ?? old('name')}}">
</div>

<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" id="" cols="30" rows="10" value="{{$category->description ?? old('description')}}" class="form-control"></textarea>
</div>

<div class="form-group">
    <button class="btn btn-dark" type="submit">Submeter</button>
</div>
