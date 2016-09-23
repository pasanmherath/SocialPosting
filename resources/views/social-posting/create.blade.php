<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Social Posting</title>
</head>
<body>
<h2>Social Posting</h2>
{!! Form::open() !!}

    {!! Form::label('label', 'Message: ') !!}
    {!! Form::text('message') !!}

    {!! Form::submit('Create Post') !!}

{!! Form::close() !!}

</body>
</html>



