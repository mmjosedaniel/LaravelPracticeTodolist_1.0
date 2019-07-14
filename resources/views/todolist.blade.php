@extends('layaouts.base')

@section('content')
<br>
    <section>
        <div class="row">
            <div class="col-12">
                <h1 class="text-center">My Todolist</h1>
            </div>
        </div>
    </section>

    <br>

    <section>
        <form action="/" method="POST">
        @csrf
                <div class="form-group row">
                  <label for="todo" class="col-sm-2 col-form-label">New Element</label>
                  <div class="col-sm-10">
                    <input type="text" class="form-control" id="" name="element" placeholder="Write something to do">
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-sm-10">
                    <button type="submit" class="btn btn-primary">Add Element</button>
                  </div>
                </div>
              </form>
    </section>

    <section>
        <table class="table">
            @foreach ($list as $element)
                <tr>
                    <td>{{ $element->todo }}</td>
                    <form action="/{{ $element->id }}/delete" method="POST">
                    @csrf
                    @method('delete')
                        <td><button class="btn btn-danger">Delete</button></td>
                    </form>
                </tr>
            @endforeach
        </table>
    </section>


@endsection
