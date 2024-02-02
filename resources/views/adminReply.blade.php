@include('adminnavbar')
<head>
<meta charset="UTF-8">
    <title>Contact US</title>
<link rel="stylesheet" href="/css/admin/reply.css">
</head>
<main>
@if(isset($contact))
    
        <div class="card-body">
            <h5 class="card-title">User ID: {{ $contact['user_id'] }}</h5>
            <p class="card-text">Name: {{ $contact['name'] }}</p>
            <p class="card-text">Email: {{ $contact['email'] }}</p>
            <p class="card-text">Message: {{ $contact['message'] }}</p>
        </div>
    
@endif
<form action="/admin/send" method="POST">
    @csrf
    <div class="form-group">
        <label for="message">Message:</label>
        <textarea class="form-control" id="message" name="message" rows="4"></textarea>
    </div>
    <div class="form-group">
        <label for="email">Email:</label>
        <input type="email" class="form-control" id="email" name="email" value="{{ $contact['email'] }}" readonly>
        <input type="hidden" class="form-control" id="email" name="id" value="{{ $contact['id'] }}" readonly>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>
<main>
