@extends('layouts.main')

@section('title', 'Contact Us - The Sculpture Studio')

@section('content')
<main class="contact-main">
    <section class="contact-form">
        <h2>Contact Us</h2>
        <form id="contact-form" class="form" onsubmit="return validateForm(event)">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" class="input-field">
                <span class="error" id="name-error"></span>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" id="email" name="email" class="input-field">
                <span class="error" id="email-error"></span>
            </div>

            <div class="form-group">
                <label for="phone">Phone:</label>
                <input type="text" id="phone" name="phone" class="input-field">
                <span class="error" id="phone-error"></span>
            </div>

            <div class="form-group">
                <label for="message">Message:</label>
                <textarea id="message" name="message" rows="5" class="textarea-field"></textarea>
                <span class="error" id="message-error"></span>
            </div>

            <button type="submit" class="btn-submit">Send Message</button>
            <p id="success-message" class="success"></p>
        </form>
    </section>
</main>
@endsection
