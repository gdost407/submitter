<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Submitter By AG4</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/x-icon" href="http://asg.aniketgolhar.in/assets/asg-logo.png">

    <!-- STYLES -->

    <style {csp-style-nonce}>
        * {
            transition: background-color 300ms ease, color 300ms ease;
        }
        *:focus {
            background-color: rgba(221, 72, 20, .2);
            outline: none;
        }
        html, body {
            color: rgba(33, 37, 41, 1);
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Helvetica, Arial, sans-serif, "Apple Color Emoji", "Segoe UI Emoji";
            font-size: 16px;
            margin: 0;
            padding: 0;
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }
        header {
            background-color: rgba(247, 248, 249, 1);
            padding: .4rem 0 0;
        }
        .menu {
            padding: .4rem 2rem;
        }
        header ul {
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            list-style-type: none;
            margin: 0;
            overflow: hidden;
            padding: 0;
            text-align: right;
        }
        header li {
            display: inline-block;
        }
        header li a {
            border-radius: 5px;
            color: rgba(0, 0, 0, .5);
            display: block;
            height: 44px;
            text-decoration: none;
        }
        header li.menu-item a {
            border-radius: 5px;
            margin: 5px 0;
            height: 38px;
            line-height: 36px;
            padding: .4rem .65rem;
            text-align: center;
        }
        header li.active a {
            background-color: rgba(221, 72, 20, .2);
            color: rgba(221, 72, 20, 1);
        }
        header li.menu-item a:hover,
        header li.menu-item a:focus {
            background-color: rgba(221, 72, 20, .2);
            color: rgba(221, 72, 20, 1);
        }
        header .logo {
            float: left;
            height: 44px;
            padding: .8rem .5rem;
        }
        header .menu-toggle {
            display: none;
            float: right;
            font-size: 2rem;
            font-weight: bold;
        }
        header .menu-toggle button {
            background-color: rgba(221, 72, 20, .6);
            border: none;
            border-radius: 3px;
            color: rgba(255, 255, 255, 1);
            cursor: pointer;
            font: inherit;
            font-size: 1.3rem;
            height: 36px;
            padding: 0;
            margin: 11px 0;
            overflow: visible;
            width: 40px;
        }
        header .menu-toggle button:hover,
        header .menu-toggle button:focus {
            background-color: rgba(221, 72, 20, .8);
            color: rgba(255, 255, 255, .8);
        }
        header .heroe {
            margin: 0 auto;
            max-width: 1100px;
            padding: 1rem 1.75rem 1.75rem 1.75rem;
        }
        header .heroe h1 {
            font-size: 2.5rem;
            font-weight: 500;
        }
        header .heroe h2 {
            font-size: 1.5rem;
            font-weight: 300;
        }
        section {
            margin: 0 auto;
            max-width: 1100px;
            padding: 2.5rem 1.75rem 3.5rem 1.75rem;
        }
        section h1 {
            margin-bottom: 2.5rem;
        }
        section h2 {
            font-size: 120%;
            line-height: 2.5rem;
            padding-top: 1.5rem;
        }
        section pre {
            background-color: rgba(247, 248, 249, 1);
            border: 1px solid rgba(242, 242, 242, 1);
            display: block;
            font-size: .9rem;
            margin: 2rem 0;
            padding: 1rem 1.5rem;
            white-space: pre-wrap;
            word-break: break-all;
        }
        section code {
            display: block;
        }
        section a {
            color: rgba(221, 72, 20, 1);
        }
        section svg {
            margin-bottom: -5px;
            margin-right: 5px;
            width: 25px;
        }
        .further {
            background-color: rgba(247, 248, 249, 1);
            border-bottom: 1px solid rgba(242, 242, 242, 1);
            border-top: 1px solid rgba(242, 242, 242, 1);
        }
        .further h2:first-of-type {
            padding-top: 0;
        }
        .svg-stroke {
            fill: none;
            stroke: #000;
            stroke-width: 32px;
        }
        footer {
            background-color: rgba(221, 72, 20, .8);
            text-align: center;
        }
        footer .environment {
            color: rgba(255, 255, 255, 1);
            padding: 2rem 1.75rem;
        }
        footer .copyrights {
            background-color: rgba(62, 62, 62, 1);
            color: rgba(200, 200, 200, 1);
            padding: .25rem 1.75rem;
        }
        @media (max-width: 629px) {
            header ul {
                padding: 0;
            }
            header .menu-toggle {
                padding: 0 1rem;
            }
            header .menu-item {
                background-color: rgba(244, 245, 246, 1);
                border-top: 1px solid rgba(242, 242, 242, 1);
                margin: 0 15px;
                width: calc(100% - 30px);
            }
            header .menu-toggle {
                display: block;
            }
            header .hidden {
                display: none;
            }
            header li.menu-item a {
                background-color: rgba(221, 72, 20, .1);
            }
            header li.menu-item a:hover,
            header li.menu-item a:focus {
                background-color: rgba(221, 72, 20, .7);
                color: rgba(255, 255, 255, .8);
            }
        }
    </style>
</head>
<body>

<!-- HEADER: MENU + HEROE SECTION -->
  <header>

    <div class="menu">
      <ul>
        <li class="logo">
          <a href="<?= base_url();?>">
            <span style="font-size: 18px; font-weight: bold; color: black;">SUBM</span>
            <span style="font-size: 18px; font-weight: bold; color: red;">I</span>
            <span style="font-size: 18px; font-weight: bold; color: purple;">TTER</span>
          </a>
        </li>
        <li class="menu-toggle">
          <button id="menuToggle">&#9776;</button>
        </li>
        <li class="menu-item hidden active"><a href="<?= base_url();?>">Home</a></li>
        <li class="menu-item hidden"><a href="<?= base_url('docs');?>">Docs</a></li>
        <li class="menu-item hidden"><a href="<?= base_url('examples');?>">Examples</a></li>
        <li class="menu-item hidden"><a href="<?= base_url('contact');?>">Contact</a></li>
      </ul>
    </div>

    <div class="heroe">

      <h1 style="text-align: center;">
        <span style="color: black;">Welcome</span> 
        <span style="color: red;">to</span> 
        <span style="color: purple;">SUBMITTER</span>
      </h1>

      <h2 style="text-align: center;">Easy to get your <b style="color: red;">Leads</b> on your <b style="color: purple;">Emails</b>.</h2>
      <h4 style="text-align: center;">Easily connect your HTML form to our endpoint and get submissions via email * no backend needed.</h4>

    </div>

  </header>

  <!-- CONTENT -->

  <section>

    <pre style="margin-top: 0; text-align: center; color: purple; border-color: red;"><code>&lt;form action="https://submitter.aniketgolhar.in/v1/your@email.com" method="POST"&gt;</code></pre>

    <h1>Fast & Free Form Integration</h1>

    <p>Create a form, name your fields, and set the action to our endpoint. Confirm your email, and you're ready to receive submissions instantly!</p>

    <h4 style="font-weight: bold;">1. CONNECT YOUR FORM</h4>
    <p>Set your form’s action to our URL and start receiving submissions directly in your inbox.</p>

    <pre><code>&lt;form action="https://submitter.aniketgolhar.in/v1/your@email.com" method="POST"&gt;&lt;/form&gt;</code></pre>

    <h4 style="font-weight: bold;">2. ADD NAME ATTRIBUTES</h4>
    <p>Make sure every &lt;input&gt;, &lt;select&gt;, and &lt;textarea&gt; has a name attribute, this is how your form data gets captured and sent to your email.</p>

    <pre><code>&lt;input type="email" name="email"&gt;</code></pre>

    <h4 style="font-weight: bold;">3. SEND AND CONFIRM</h4>
    <p>Submit your form once to trigger a confirmation email. Just click the link in that email to start receiving submissions.</p>

  </section>

  <div class="further">

    <section>

      <h1 style="text-align: center;">Want to give it a try?</h1>

      <h4 style="text-align: center;">
        Explore our interactive playground! Edit the HTML on the left, add or change form fields, update your@email.com with your own and see the live form update on the right. Submit it to receive the entry in your inbox.
      </h4>

      <h1 style="text-align: center;">
        <a href="<?= base_url('examples');?>">Try it out</a>
      </h1>
    </section>

  </div>

  <section>

    <h1><span style="color: black;">SUBM</span><span style="color: red;">I</span><span style="color: purple;">TTER</span> Advance Options</h1>

    <p>Enhance your forms with special functionality by using name attributes that start with an underscore (_). These advanced options let you customize behavior without writing any code.</p>

    <h4 style="font-weight: bold;">1. submitter_replyto</h4>
    <p>In SUBMITTER, you can make replies effortless by setting the user's email as the Reply-To address. Just include a field for their email, and you’ll be able to respond directly from your inbox.</p>

    <pre><code>&lt;input type="hidden" name="submitter_replyto" value="true"&gt;</code></pre>
    
    <p>To enable this feature in SUBMITTER, simply add an email field to your form to capture the user’s address.</p>

    <pre><code>&lt;input type="email" name="email"&gt;</code></pre>

    <h4 style="font-weight: bold;">2. submitter_subject</h4>
    <p>Use this value in SUBMITTER to set a custom email subject, making it easy to identify and reply to form submissions without changing the subject manually.</p>

    <pre><code>&lt;input type="hidden" name="submitter_subject" value="Your custom subject"&gt;</code></pre>

    <h4 style="font-weight: bold;">3. submitter_cc</h4>
    <p>In SUBMITTER, use this value to set the email's CC field perfect for sending a copy of each form submission to another recipient automatically.</p>

    <pre><code>&lt;input type="hidden" name="submitter_cc" value="example@email.com"&gt;</code></pre>

    <p>To CC multiple recipients in SUBMITTER, simply list all email addresses separated by commas ",". Each one will receive a copy of the form submission.</p>

    <pre><code>&lt;input type="hidden" name="submitter_cc" value="example@email.com,another@email.com"&gt;</code></pre>

  </section>

<!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

<footer>
    <div class="environment">
        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>
    </div>

    <div class="copyrights">

        <p>&copy; <?= date('Y') ?> Aniket Golhar. Design and development by Aniket Golhar.</p>

    </div>

</footer>

<!-- SCRIPTS -->

<script {csp-script-nonce}>
    document.getElementById("menuToggle").addEventListener('click', toggleMenu);
    function toggleMenu() {
        var menuItems = document.getElementsByClassName('menu-item');
        for (var i = 0; i < menuItems.length; i++) {
            var menuItem = menuItems[i];
            menuItem.classList.toggle("hidden");
        }
    }
</script>

<!-- -->

</body>
</html>
