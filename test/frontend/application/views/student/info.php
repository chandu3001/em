<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= base_url("assets/css/dashlite.css?ver=3.0.0") ?>">
    <link id="skin-default" rel="stylesheet" href="<?= base_url("assets/css/theme.css?ver=3.0.0") ?>">
    <title>Recomendation</title>
</head>

<body class="vh-100 d-flex justify-content-center align-items-center bg-light">
    <div class='bg-white p-4 rounded'>
        <span class="badge bg-warning text-dark h6 p-1"><b>Alert!</b></span>
        <br>
        <div class="h5">
            Recommended to use Microsoft Edge.
        </div>
        <div>
            <p>Do you want to continue?</p>
            <button class="btn btn-primary" onclick="redirectToLogin()">Yes</button>
            <a href="https://www.microsoft.com/en-us/edge/download?form=MA13FJ&exp=e01&ch">
                <button class="btn btn-info">Download Microsoft Edge</button>
            </a>
        </div>
    </div>

    <script>

        function getUrlParam(param) {
            const params = new URL(document.location).searchParams;
            return params.get(param);
        }
        function redirectToLogin() {
            location.href = "<?= base_url('student/login?auth=') ?>"+getUrlParam("auth");
        }
    </script>
</body>

</html>