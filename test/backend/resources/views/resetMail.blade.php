<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<style>
    .container{
        height: 80vh;
        width: 50vw;
        background-color: white;
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
    }
    .main{
        background: skyblue;
        display: grid;
        place-items: center;
        height: 100vh;
    }
    a{
        text-decoration: none;
        font-weight: 800;
        color: white;
    }
    button{
        border-radius: .5em;
        border: none;
    }

</style>
<body>
   <div class="main">
    <div class="container">
        <h2 style="margin: 1rem 0; align-text: left">Reset Password</h2>
        <button style="margin: 1rem 0; background: skyblue; padding: 1rem 2rem"><a href="{{ $link }}">Reset Your Password</a></button>
    </div>
   </div>
</body>
</html>