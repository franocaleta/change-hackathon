@extends('layouts.app')

@section('content')
    <script>
        var counter = 1;
        var limit = 8;
        function addInput(divName){
            if (counter == limit)  {
                alert("You have reached the limit of adding " + counter + " inputs");
            }
            else {
                var newdiv = document.createElement('div');
                newdiv.innerHTML = "Tag " + (counter + 1) + " <br><input type='text' name='myInputs[]'><br><br>";
                document.getElementById(divName).appendChild(newdiv);
                counter++;
            }
        }
    </script>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">

                        <form method="POST" action="/event/create" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Stvori novi</h5>
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


                                    <input type="button" value="Dodaj novi" onClick="addInput('dynamicInput2');">
                                    <div id="dynamicInput2">
                                        Tag 1<br><input type="text" name="myInputs[]"><br><br>
                                    </div>


                                    <label class="btn btn-primary" for="my-file-selector">
                                        <input id="my-file-selector" type="file" name="picture" id="picture" style="display:none;">
                                        Odaberite sliku
                                    </label>

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
