<div class="column" id="box{{ $item->id }}">
    <div class="ui mini top attached borderless menu">
        <div class="header item">Job #{{ $item->id }}</div>
    </div>                    
    <div class="ui bottom attached segment">
        <p>
            {{ $item->message }}
        </p>
        <div class="ui indicating progress" data-percent="{{ $item->percent }}">
            <div class="bar">
                <div class="progress"></div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(() => {
        $('#box{{ $item->id }} .ui.progress').progress();
    })
</script>