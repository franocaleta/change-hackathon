@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="GET" action="/owner">
                        <button>Potvrdi event</button>
                    </form>


                    <form method="GET" action="/event/all">
                        <button>Eventovi</button>
                    </form>

                    <form method="POST" action="/event/create">
                        {{ csrf_field() }}
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Stvori novi</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="form-group">
                                    <label for="name">Ime</label>
                                    <input type="textarea" class="form-control" id="name2" name="name2">
                                </div>
                                <div class="form-group">
                                    <label for="description">Opis</label>
                                    <input type="textarea" class="form-control" id="description2" name="description2">
                                </div>
                                <div class="form-group">
                                    <label for="address">Država</label>
                                    <input id="address" type="text" class="form-control" name="country2" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Grad</label>
                                    <input id="address" type="text" class="form-control" name="city2" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Adresa</label>
                                    <input id="address" type="text" class="form-control" name="address2" required>
                                </div>
                                <div class="form-group">
                                    <label for="address">Poštanski broj</label>
                                    <input id="address" type="text" class="form-control" name="zipcode2" required>
                                </div>
                                <br>

                                <div class="modal-footer">
                                    <button type="submit" class="btn btn-primary">Objavi</button>
                                </div>
                            </div>
                            </div>
                    </form>

                    You are logged in!
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
