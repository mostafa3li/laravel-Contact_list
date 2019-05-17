@extends('./layouts/contacts')

  @section('display')

    <!-- display contacts -->
    <div class="col-md-8 offset-md-2">
      @if (count($storedContacts) > 0)
        <table class="table text-center">
          <thead>
            <th>#</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Update</th>
            <th>Delete</th>
          </thead>
          <tbody>
            @foreach ($storedContacts as $contact)
            <tr>
              <th>{{$contact->id}}</th>
              <th>{{$contact->name}}</th>
              <th>{{$contact->contact}}</th>
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
            </tr>
            @endforeach
          </tbody>
        </table>
      @endif
    </div>

  @endsection
