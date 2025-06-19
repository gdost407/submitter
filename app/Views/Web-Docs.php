<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Submitter Documentation</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Description for SUBMITTER Documentation -->
    <meta name="description" content="Learn how to use SUBMITTER to handle HTML form submissions, send email notifications, upload files, and integrate with APIs using our detailed documentation.">

    <meta name="keywords" content="submit, submitter, submitter documentation, form backend docs, form API docs, how to submit HTML forms, form submission guide, webhook integration, email form tutorial, file upload API">

    <meta name="robots" content="index, follow">
    <meta name="author" content="Aniket Golhar">

    <!-- Open Graph -->
    <meta property="og:title" content="Documentation - SUBMITTER Form API">
    <meta property="og:description" content="Full documentation for SUBMITTER – a powerful backend service for form handling, email delivery, file uploads, and automation.">
    <meta property="og:image" content="<?= base_url('assets/logo.png');?>">
    <meta property="og:url" content="<?= base_url('docs');?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="SUBMITTER Documentation - Full API Guide">
    <meta name="twitter:description" content="Use SUBMITTER to process form data securely with features like autoresponders, file uploads, CC emails, and webhooks. Explore the full documentation.">
    <meta name="twitter:image" content="<?= base_url('assets/logo.png');?>">
    <meta name="twitter:url" content="<?= base_url('docs');?>">

    <link rel="icon" type="image/x-icon" href="<?= base_url('assets/logo.png');?>">

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
          <li class="menu-item hidden"><a href="<?= base_url();?>">Home</a></li>
          <li class="menu-item hidden active"><a href="<?= base_url('docs');?>">Docs</a></li>
          <li class="menu-item hidden"><a href="<?= base_url('examples');?>">Examples</a></li>
          <li class="menu-item hidden"><a href="<?= base_url('contact');?>">Contact</a></li>
        </ul>
      </div>

      <div class="heroe">

        <h1 style="text-align: center;">
          <span style="color: black;">SUBMITTER</span> 
          <!-- <span style="color: red;">to</span>  -->
          <span style="color: purple;">DOCUMENTATION</span>
        </h1>

      </div>

    </header>

    <!-- CONTENT -->

    <section>

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

      <h4 style="font-weight: bold;">4. submitter_autorespond</h4>
      <p>With SUBMITTER, you can instantly send users a copy of their submission along with a personalized message, perfect for confirmations or thank-you notes.</p>

      <pre><code>&lt;input type="hidden" name="submitter_autorespond" value="Your custom message"&gt;</code></pre>
      
      <p>To enable this feature in SUBMITTER, simply add an email field to your form to capture the user’s address.</p>

      <pre><code>&lt;input type="email" name="email"&gt;</code></pre>

      <h4 style="font-weight: bold;">5. submitter_template</h4>
      <p>SUBMITTER offers 3 email templates to choose from. The basic template is used by default, but you can easily switch to the one that best fits your style.</p>

      <pre><code>&lt;input type="hidden" name="submitter_template" value="basic"&gt;</code></pre>

      <p><a href="<?= base_url('docs-template');?>">View more submitter templates</a></p>

      <h4 style="font-weight: bold;">6. submitter_webhook</h4>
      <p>With SUBMITTER, you can set up a webhook that fires whenever a new form submission is received directly in your inbox. This is perfect for enabling real-time data handling, integrations, and automation.</p>

      <pre><code>&lt;input type="hidden" name="submitter_webhook" value="https://your-domain.com/webhook-endpoint"&gt;</code></pre>

      <p>Here’s a sample webhook JSON payload sent by SUBMITTER on your webhook endpoint:</p>

      <pre><code>{
    "formData": {
      "name": "John Doe",
      "email": "Bxq0s@example.com",
      "message": "Hello, this is a test message."
    },
    "formTimestamp": "<?= date('Y-m-d H:i:s'); ?>"
  }</code></pre>

      <h4 style="font-weight: bold;">7. File Upload</h4>
      <p>SUBMITTER supports native file uploads, letting you collect pdf or images files easily—perfect for info that can’t be captured by text fields alone.</p>
      <p>Remember to add <span style="background-color: rgba(247, 248, 249, 1); border: 1px solid rgba(242, 242, 242, 1); padding: 0.3rem 1rem;">enctype="multipart/form-data"</span> in your form tag to enable file uploads.</p>

      <pre><code style="line-height: 1.5rem;">&lt;form action="<?= base_url();?>v1/your@email.com" method="POST" enctype="multipart/form-data"&gt;
      &lt;input type="email" name="email" placeholder="Your email"&gt;
      &lt;textarea name="message" placeholder="Your message"&gt;&lt;/textarea&gt;
      &lt;input type="file" name="attachment" accept=".pdf, .png, .jpg, .jpeg"&gt;
      &lt;button type="submit"&gt;Submit&lt;/button&gt;
  &lt;/form&gt;</code></pre>

      <p>* Note: you can upload a single file per form submission, and the file size must not exceed 2MB.</p>

      <h4 style="font-weight: bold;">8. AJAX Submission</h4>
      <p>With SUBMITTER, you can submit forms via AJAX seamlessly, with your users stay on the page, and it even supports cross-origin requests effortlessly.</p>

      <pre><code>$.ajax({
      url: "<?= base_url();?>v1/your@email.com",
      method: "POST",
      data: {
          name: "FormSubmit",
          message: "I'm from Devro LABS"
      },
      dataType: "json"
  });
  </code></pre>
      <p><a href="<?= base_url('docs-ajax');?>">Example for <b>fetch</b>, <b>axios</b>, <b>jQuery</b> : View More</a></p>

      <h4 style="font-weight: bold;">Create Unlimited Forms and Collect Unlimited Responses</h4>
      <p>Build as many forms as you want tied to one email, and receive endless submissions without limits.</p>

      <h4 style="font-weight: bold;">Easily Retrieve Your Submission History</h4>
      <p>Missed a submission? Access your complete, timestamped submission archive anytime via our free API. The API is limited to 2 calls per day.</p>
      <p>Submissions are kept for 30 days. Uploaded files aren’t stored or available through the API.</p>

    </section>

    <!-- FOOTER: DEBUG INFO + COPYRIGHTS -->

    <footer>
      <div class="environment">
        <p>Page rendered in {elapsed_time} seconds using {memory_usage} MB of memory.</p>
      </div>

      <div class="copyrights">

        <p>&copy; <?= date('Y') ?> <span style="font-weight: bold; color: white;">SUBM</span><span style="font-weight: bold; color: red;">I</span><span style="font-weight: bold; color: pink;">TTER</span>. Design and developed by <a href="https://aniketgolhar.in" target="_blank" style="color: white; text-decoration: none;">Aniket Golhar</a>.</p>

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
  
  </body>
</html>
