<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Ajax Dynamic Dependent Dropdown in Laravel</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <style type="text/css">
            .box{
                width: 600px;
                height: 0 auto;
                border: 1px solid #ccc;
            }
        </style>
    </head>
    <body>
        <br>
        <div class="container box">
            <h3 align="center">Ajex Dynamic Dropdown in Laravel</h3>
            <br>
            <div class="form-group">
                <select name="country" id="country" class="form-control input-lg dynamic" data-dependent="State">
                    <option value="">Select Country</option>
                    @foreach ($country_list as $country)
                        <option value="{{$country->Country}}">{{$country->Country}}</option>
                    @endforeach
                </select>
            </div>
            <br>
            <div class="form-group">
                <select name="state" id="State" class="form-control input-lg dynamic" data-dependent="City">
                    <option value="">Select State</option>
                </select>
            </div>
            <br>
            <div class="form-group">
                <select name="city" id="City" class="form-control input-lg dynamic">
                    <option value="">Select City</option>
                </select>
            </div>
            {{csrf_field()}}
        </div>
    </body>
</html>
<script>
    $(document).ready(function() {
        $('.dynamic').change(function() {
            if($(this).val() != '') {
                var select = $(this).attr('id');
                var value = $(this).val();
                var dependent = $(this).data('dependent');
                var _token = $('input[name="_token"]').val();
                $.ajax({
                    url:"{{route('dynamicdependent.fetch')}}",
                    method: "POST",
                    data: {select:select, value:value, _token: _token, dependent: dependent},
                    success: function(result) {
                        $('#'+dependent).html(result);
                    }
                })
            }
        });
    });
</script>
