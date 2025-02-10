<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel Data Table</title>
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/2.2.2/css/dataTables.dataTables.min.css">
</head>

<body>
    <div class="container py-5">
        <div class="card">
            <div class="card-header">
                <h4>Datatable in Laravel</h4>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table class="table-striped datatable">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>mobile</th>
                                <th>Feature</th>
                            </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.7.1.min.js"
    integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
</script>

<script src="https://cdn.datatables.net/2.2.2/js/dataTables.min.js"></script>
<script>
    $(document).ready(function() {
        $('.datatable').DataTable({
            serverSide: true,
            processing: true,
            ajax: {
                url: '{{ route('products') }}'
            },
            columns: [{
                data: 'name',
                name: 'name'
            }, {
                data: 'description',
                name: 'description'
            }, {
                data: 'price',
                name: 'price'
            }, {
                data: 'mobile',
                name: 'mobile'
            }, {
                data: 'feature',
                name: 'feature'
            }]
        });
    });
</script>

</html>
