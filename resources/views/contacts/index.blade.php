@extends('./layouts/contacts')

  @section('add')

        <form action="{{ route('contacts.store') }}" method="POST">
        {{ csrf_field() }}
          <input type="hidden" name="user_id" value="{{Auth::user()->id}}">
          <div class="form-row">
            <div class="col">
              <input type="text" name="contactName" class="form-control"/>
            </div>
            <div class="col">
              <input type="text" name="contact" class="form-control"/>
            </div>
            <div class="col text-center">
              <button type="submit" class="btn btn-success">Add Contact</button>
            </div>
          </div>
        </form>
        
      </div>
      <!-- display contacts -->
      <div class="col-md-8 offset-md-2">
        @if (count($storedContacts) > 0)
          <table class="table text-center">
            <thead>
              <th>#</th>
              <th>Name</th>
              <th>Contact</th>
              @if (count($storedContacts) > 2)
              <th>Update</th>
              <th>Delete</th>
              @endif
            </thead>
            <tbody>
              @foreach ($storedContacts as $contact)
              <tr>
                <th>{{$contact->id}}</th>
                <th>{{$contact->name}}</th>
                <th>{{$contact->contact}}</th>
                @if (count($storedContacts) > 2)
                <th>
                  <a href="{{route('contacts.edit', ['contacts'=> $contact->id])}}" class="btn btn-info">Update</a>
                </th>
                <th>
                  <form action="{{route('contacts.destroy', ['contacts' => $contact->id])}}" method="POST">
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                  </th>
                @endif
              </tr>
              @endforeach
            </tbody>
          </table>
        @endif
      </div>

  @endsection