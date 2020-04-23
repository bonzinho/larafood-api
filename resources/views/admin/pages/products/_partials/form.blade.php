@include('admin.includes.alerts')

<div class="form-group">
    <label>* Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$product->name ?? old('name')}}">
</div>

<div class="form-group">
    <label>* Imagem:</label>
    <input type="file" name="image" class="form-control" placeholder="Imagem do produto">
</div>

<div class="form-group">
    <label>* Peço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço" value="{{$product->price ??  old('price')}}">
</div>

<div class="form-group">
    <label>* Descrição:</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control">
        {{$product->description ?? old('description')}}
    </textarea>
</div>

<div class="form-group">
    <button class="btn btn-dark" type="submit">Submeter</button>
</div>
