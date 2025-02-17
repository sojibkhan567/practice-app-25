<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload and Send Email</title>
</head>

<body>
    <h1>Upload File and Send Email</h1>
    <form action="{{ route('send.email.with.attachment') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div>
            <label for="email">Recipient Email:</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <label for="subject">Subject:</label>
            <input type="text" name="subject" id="subject" required>
        </div>
        <div>
            <label for="body">Message:</label>
            <textarea name="body" id="body" rows="5" required></textarea>
        </div>
        <div>
            <label for="attachment">Attachment:</label>
            <input type="file" name="attachment" id="attachment">
        </div>
        <button type="submit">Send Email</button>
    </form>
</body>

</html>
