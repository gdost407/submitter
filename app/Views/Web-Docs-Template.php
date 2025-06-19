<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Submitter Documentation</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Meta Description for Template Documentation -->
    <meta name="description" content="Explore email templates offered by SUBMITTER. Choose from classic, modern, striped, boxed, and minimal layouts for displaying form data.">

    <meta name="keywords" content="submit, submitter, form email templates, submitter templates, email layout for form, submitter email design, responsive form email, classic template, modern template, html table email form">

    <meta name="robots" content="index, follow">
    <meta name="author" content="Aniket Golhar">

    <!-- Open Graph -->
    <meta property="og:title" content="Email Templates - SUBMITTER Docs">
    <meta property="og:description" content="Customize your form submission emails with built-in templates from SUBMITTER. View and select from various layouts.">
    <meta property="og:image" content="https://submitter.aniketgolhar.in/assets/submitter-logo.png">
    <meta property="og:url" content="<?= base_url('docs-template');?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Form Email Templates - SUBMITTER">
    <meta name="twitter:description" content="SUBMITTER offers modern, classic, striped, boxed, and minimal templates for your form data emails. View samples and choose the best fit.">
    <meta name="twitter:image" content="https://submitter.aniketgolhar.in/assets/submitter-logo.png">
    <meta name="twitter:url" content="<?= base_url('docs-template');?>">

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
          <span style="color: red;">TEMPLATE</span> 
          <span style="color: purple;">DOCUMENTATION</span>
        </h1>
        <h3 style="text-align: center; width: 85%; margin: 0 auto;">Pick the email style that suits you best! SUBMITTER offers multiple clean and professional templates, just select the one you prefer for your submission emails.</h3>
      </div>

    </header>

    <!-- CONTENT -->

    <section>

      <h4 style="font-weight: bold;">1. basic</h4>
      
      <pre><code>&lt;input type="hidden" name="submitter_template" value="basic"&gt;</code></pre>

      <div style="border: 1px dashed black; padding: 10px;">
        <table style="width:100%; border-collapse: collapse; font-family: Arial, sans-serif;">
          <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Name:</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">John Doe</td>
          </tr>
          <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Email:</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">john@example.com</td>
          </tr>
          <tr>
            <td style="padding: 8px; border: 1px solid #ddd;"><strong>Message:</strong></td>
            <td style="padding: 8px; border: 1px solid #ddd;">Hello! I'm interested in your services.</td>
          </tr>
        </table>
      </div>

      <h4 style="font-weight: bold;">2. modern</h4>
      
      <pre><code>&lt;input type="hidden" name="submitter_template" value="modern"&gt;</code></pre>

      <div style="border: 1px dashed black; padding: 10px;">
        <div style="max-width: 500px; margin: auto; font-family: 'Segoe UI', sans-serif; background: #f9f9f9; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px rgba(0,0,0,0.1);">
          <h2 style="margin-top: 0;">New Form Submission</h2>
          <div style="margin-bottom: 10px;"><strong>Name:</strong> John Doe</div>
          <div style="margin-bottom: 10px;"><strong>Email:</strong> john@example.com</div>
          <div style="margin-bottom: 10px;"><strong>Message:</strong> Hello! I'm interested in your services.</div>
        </div>

      </div>

      <h4 style="font-weight: bold;">3. classic</h4>
      
      <pre><code>&lt;input type="hidden" name="submitter_template" value="classic"&gt;</code></pre>

      <div style="border: 1px dashed black; padding: 10px;">
        <div style="font-family: Georgia, serif; font-size: 16px;">
          <p><strong>Form Submission Details:</strong></p>
          <ul style="list-style-type: disc; padding-left: 20px;">
            <li><strong>Name:</strong> John Doe</li>
            <li><strong>Email:</strong> john@example.com</li>
            <li><strong>Message:</strong> Hello! I'm interested in your services.</li>
          </ul>
        </div>
      </div>

      <h4 style="font-weight: bold;">4. boxed</h4>
      
      <pre><code>&lt;input type="hidden" name="submitter_template" value="boxed"&gt;</code></pre>

      <div style="border: 1px dashed black; padding: 10px;">
        <div style="display: grid; grid-template-columns: 1fr 2fr; gap: 10px; font-family: Arial, sans-serif; max-width: 500px; background: #f4f4f4; padding: 20px; border-radius: 8px;">
          <div style="font-weight: bold;">Name:</div>
          <div>John Doe</div>
          <div style="font-weight: bold;">Email:</div>
          <div>john@example.com</div>
          <div style="font-weight: bold;">Message:</div>
          <div>Hello! I'm interested in your services.</div>
        </div>
      </div>

      <h4 style="font-weight: bold;">5. badge</h4>
      
      <pre><code>&lt;input type="hidden" name="submitter_template" value="badge"&gt;</code></pre>

      <div style="border: 1px dashed black; padding: 10px;">
        <div style="font-family: sans-serif; background-color: #fff; padding: 20px; border-left: 5px solid #4CAF50;">
          <p><span style="background:#4CAF50;color:white;padding:3px 8px;border-radius:4px;">Name</span> John Doe</p>
          <p><span style="background:#2196F3;color:white;padding:3px 8px;border-radius:4px;">Email</span> john@example.com</p>
          <p><span style="background:#FF9800;color:white;padding:3px 8px;border-radius:4px;">Message</span> Hello! I'm interested in your services.</p>
        </div>
      </div>

      <h4 style="font-weight: bold;">6. minimal</h4>
      
      <pre><code>&lt;input type="hidden" name="submitter_template" value="minimal"&gt;</code></pre>

      <div style="border: 1px dashed black; padding: 10px;">
        <div style="font-family: 'Helvetica Neue', sans-serif; font-size: 16px; color: #333;">
          <p><strong>Name</strong><br>John Doe</p>
          <hr style="border:none;border-top:1px solid #ccc;">
          <p><strong>Email</strong><br>john@example.com</p>
          <hr style="border:none;border-top:1px solid #ccc;">
          <p><strong>Message</strong><br>Hello! I'm interested in your services.</p>
        </div>
      </div>
      
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
