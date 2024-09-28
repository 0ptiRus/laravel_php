<!-- resources/views/emails/feedback.blade.php -->

<h1>New Feedback Received</h1>

<p><strong>Email:</strong> {{ $data['email'] }}</p>
<p><strong>Phone:</strong> {{ $data['phone'] }}</p>
<p><strong>Feedback:</strong> {{ $data['feedback'] }}</p>

@if ($data['filePath'])
    <p>A file has been attached to this feedback. Please check the attachment.</p>
@else
    <p>No file was attached to this feedback.</p>
@endif