<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.css">
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.13/semantic.js"></script>
</head>
<body>
    <div class="ui container">
        <div class="ui borderless mini menu">
            <div class="header item">
                Works list
            </div>
            <div class="link item" id="addjob">
                <i class="add icon"></i>
                Add random job
            </div>
        </div>

        <div class="ui mini top attached borderless menu">
            <div class="header item">
                <i class="desktop icon"></i>
                Jobs monitor
            </div>
        </div>
        <div class="ui bottom attached segment">
            <div class="ui three column grid">

                @include('list')



            </div>
        </div>
    </div>
</body>
<script>
    $(() => {
        var do_update = () => {
            $.get('jobs').done((response)=>{ $('.ui.grid').html(response); }).always(()=>{ setTimeout(do_update, 2000); });
        }

        do_update();

        $("#addjob").click(()=>{
            $.get('addjob');
        });
    });
</script>
</html>