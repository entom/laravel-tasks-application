@if (count($errors) > 0)

    <div class="alert alert-danger">
        <strong>Whoops! Something went wrong!</strong>

        <br><br>

        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>

    <script>
        $(document).ready(function () {
            Materialize.toast('Please check validation errors', 4000);
        });
    </script>

@endif