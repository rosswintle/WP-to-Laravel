@extends('layouts.video')

@section('title', 'Privacy')

@section('content')

    <main class="max-w-5xl mx-auto px-2 prose">
        <h1>Privacy</h1>
        <p>
            <em>This page explains what data I collect from you and why, the basis for collecting and processing it, where it goes, how safe it is, and how you can change/delete it.
            </em>
        </p>
        <p>
            <em>
                I've tried to respect your rights, while maintaining my own curiosity about use of this project and the need to be informed if something goes wrong with the service. I've tried to use plain language and be as transparent as possible.
            </em>
        </p>
        <h3>
            What data is collected and why?
        </h3>
        <p>
            <ul>
                <li>The home page uses Fathom Analytics which collects anonymous data about users visiting that page. This is so that I can analyse where people are coming from so that I can better market the course and gain insight for future projects.</li>
                <li>The sign up page collects your name, email address, and a password. I collect your name in case I need to contact you in the future about the course.  An email address and password are needed to log in.</li>
                <li>When a user registers I am sent an email with their details. This is deleted at the first opportunity and exists so that I can welcome you if necessary, and so that I can spot spam sign-ups (which I've attempted to reduce by using a CAPTCHA.</li>
                <li>The registration screen also contains a CAPTCHA. I believe that this will send some anonymous data about your interactions to Google to try to work out if you are a real person.</li>
                <li>When you watch to the end of a video I store that you have completed that video.  This is both so that I can show you which videos you've completed, but also so that I can view reports on how many people are watching videos to see if this has been a worthwhile exercise.</li>
                <li>The videos are Vimeo embeds in iframes, so anonymous data about your video views is also sent to the Vimeo analytics platform.</li>
                <li>I use Google fonts which may also be tracking you as you move around the web. This made developing the website quick and easy and may speed things up for you too.</li>
            </ul>
            <p>
                Note: I may use your email address to send you updates about the service in the future.  These will not be marketing emails, but let me know (see below) if you don't want to receive them.
            </p>
        </p>
        <h3>
            What's the basis for collecting and processing this data?
        </h3>
        <p>
            For the CAPTCHA, this data is processed by Google and there is implied consent for doing this by using this website.
        </p>
        <p>
            For Fathom Analytics the data is processed by Fathom Analytics and there is implied consent for doing this by using this website. Though they are super privacy friendly and I don't even really need to tell you that I'm using them.
        </p>
        <p>
            You consent to all of the other data processing when you sign up to watch the videos.
        </p>
        <h3>
            How can I stop you processing this data?
        </h3>
        <p>
            If you don't wish Google Analytics and Re:CAPTCHA data collection then you should disable cookies and javascript in your browser.  This may prevent you getting access to the videos.
        </p>
        <p>
            If you don't wish to sign up for an account on my course platform to avoid other data collection, then you can just <a href="https://www.youtube.com/playlist?list=PLd-bswuE2ozR_5Ad_MrZOaY5VTKeaNm34">watch the videos on YouTube</a>.
        </p>
        <h3>
            Where does my data go and how safe is it?
        </h3>
        <p>
            Aside from the Google Analytics and Re:CAPTCHA data, I'm storing your data on a VPS (Virtual Private Server) provided by Freethought Internet Limited in their London datacenter.
        </p>
        <p>
            I've taken as many security precautions as are reasonably practical for this application.
        </p>
        <p>
            I use HTTPS so data is encrypted in transmission, but it is not encrypted in the database.
        </p>
        <p>
            I use strong, random, service-unique passwords from a password manager for all services, and two-factor authentication where available.
        </p>
        <h3>
            How you can view/change/delete your data.
        </h3>
        <p>
            I've not built user profiles or a user dashboard or anything (yet). So drop me a line at <a href="mailto:wptolaravel@oikos.digital">wptolaravel@oikos.digital</a> if you want a dump of your data or to change anything.
        </p>
        <p>
            I've not currently set a lifetime on this project.  But for now your data will be stored until either you request it be deleted, or I shut the service down.
        </p>
    </main>

@endsection
