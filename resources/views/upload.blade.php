<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
{{--    <link rel="stylesheet" href="{{asset('css/app.css')}}">--}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/resumable.js/1.1.0/resumable.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
</head>
<body>

    <div class="container pt-4">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header text-center">
                        <h5>Upload File</h5>
                    </div>

                    <div class="card-body">
                        <div id="upload-container" class="text-center">
                            <button id="browseFile" class="btn btn-primary">Browse File</button>
                        </div>
                        <div style="display: none" class="progress mt-3" style="height: 25px">
                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100" style="width: 75%; height: 100%">75%</div>
                        </div>
                    </div>

                </div>
                <div class="card message text-center border-success mt-3" style="width: 100%; display: none">
                    <button type="button" class=" btn-close p-2" aria-label="Close"></button>
                    <div class="card-body">
                       <p class="card-text">Your file has been uploaded!</p>
                    </div>
                </div>
                <div id="alert" class="card alert text-center border-warning mt-3" style="width: 100%; display: none" >
                    <button type="button" class="btn-close p-2" aria-label="Close"></button>
                    <div class="card-body">
                        <p class="card-text">There are probably problems with your Internet connection. Try again later.</p>
                    </div>
                </div>
            </div>

        </div>
    </div>



<script type="module" src="{{asset('js/app.js')}}"></script>

</body>
</html>
