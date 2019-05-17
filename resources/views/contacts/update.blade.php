@extends('./layouts/contacts')

  @section('update')

  <div class="col-md-8 offset-md-2">
    <form action="{{route('contacts.update', [$editedContact->id])}}" method=POST>
      {{csrf_field()}}
      <input type="hidden" name="_method" value="PUT">
      <div class="form-row">
        <div class="col">
        <input type="text" name="updatedName" class="form-control" value="{{$editedContact->name}}"/>
        </div>
        <div class="col">
        <input type="text" name="contact" class="form-control" value="{{$editedContact->contact}}"/>
        </div>
      </div>
      <div class="form-group text-center mt-5 row justify-content-around">
        <button type="submit" class="btn btn-success">Save Changes</button>
        <a href="{{ route('contacts.store') }}" class="btn btn-info">Go Back</a>
      </div>
    </form>
  </div>

@endsection