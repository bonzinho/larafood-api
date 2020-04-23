@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$plan->name ?? old('name')}}">
</div>
<div class="form-group">
    <label>Peço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{$plan->price ??  old('price')}}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <input type="text" name="description" class="form-control" placeholder="description" value="{{$plan->description ??  old('description')}}">
</div>
<div class="form-group">
    <button class="btn btn-dark" type="submit">Editar</button>
</div>
