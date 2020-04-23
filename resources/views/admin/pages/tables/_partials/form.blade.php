@include('admin.includes.alerts')

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome" value="{{$table->name ?? old('name')}}">
</div>

<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" id="" cols="30" rows="10" class="form-control">
        {{$table->description ?? old('description')}}
    </textarea>
</div>

<div class="form-group">
    <button class="btn btn-dark" type="submit">Submeter</button>
</div>
