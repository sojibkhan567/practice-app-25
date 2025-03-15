<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dropzone Image Upload</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/css/bootstrap.min.css"
        integrity="sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://unpkg.com/dropzone@5/dist/min/dropzone.min.js"></script>
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

</head>

<body>
    <div class="container">
        <div class="card mt-5">
            <div class="card-header">
                <h4>Laravel Drop & Drag file upload</h4>
            </div>
            <div class="card-body">
                {{-- <form action="{{ route('media.store') }}" class="dropzone" method="POST">
                    @csrf
                </form>
                <div class="mt-2">
                    <button class="btn btn-success" id="from-submit">Submit</button>
                </div> --}}
                <div id="myDropzone" class="dropzone"></div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Filename</th>
                            <th>Image</th>
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.0.1/js/bootstrap.min.js"
    integrity="sha512-EKWWs1ZcA2ZY9lbLISPz8aGR2+L7JVYqBAYTq5AXgBkSjRSuQEGqWx8R1zAX16KdXPaCjOCaKE8MCpU0wcHlHA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script type="text/javascript">
    Dropzone.autoDiscover = false; // Disable auto-discovery

    var myDropzone = new Dropzone("#myDropzone", {
        url: "{{ route('media.store') }}",
        uploadMultiple: true,
        autoProcessQueue: true,
        headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}" // Include CSRF token for security
        },
    });


    /*$("#from-submit").click(function() {
        myDropzone.processQueue();
    })*/
</script>

</html>
