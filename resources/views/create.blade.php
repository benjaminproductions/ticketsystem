<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ticketsystem-Create</title>
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,800" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/create.css') }}"/>
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/shared.css') }}"/>
</head>
<body>
<div class="container">
    <div class="header">
        <span class="header-title">IT 20/1 Ticketsystem</span>
        <span class="header-logout"><a href="{{ route('login.logout') }}" class="btn btn-logout">Logout</a></span>
    </div>
    <div class="content">
        <form method="POST" action="{{ route('store') }}" enctype="multipart/form-data">
            @csrf
            <span>Ticket Title <br><input class="input-text" name="title" type="text" placeholder="Title"
                                          required></span>
            <span>Ticket Priority <br><select name="priority" id="priority" class="input-text">
                <option value="Urgent">Urgent</option>
                <option value="High">High</option>
                <option value="Normal" selected>Normal</option>
                <option value="Low">Low</option>
            </select></span>
            <span>Ticket Description<br><textarea name="content" placeholder="Describe Your Problem Here..."
                                                  required></textarea></span>
            <span><button type="submit" class="btn btn-save">Save</button><a href="{{ route('index') }}"
                                                                             class="btn btn-save">Back</a></span>
        </form>
    </div>
    <div class="footer"><span class="footer-copyright">©IT20/1 (2022)</span></div>
</div>
</body>
</html>
