<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <title>Submitter Documentation</title>
    <meta name="description" content="The small framework with powerful features">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Meta Description for AJAX Documentation -->
    <meta name="description" content="Learn how to submit HTML forms via AJAX using SUBMITTER API. Send data without page reload, handle responses, and integrate securely.">

    <meta name="keywords" content="submit, submitter, ajax form submission, ajax submit HTML form, submitter ajax form, form to API using javascript, codeigniter ajax form handler, fetch form submission">

    <meta name="robots" content="index, follow">
    <meta name="author" content="Aniket Golhar">

    <!-- Open Graph -->
    <meta property="og:title" content="AJAX Form Submission - SUBMITTER Docs">
    <meta property="og:description" content="Use AJAX to submit your forms to SUBMITTER without reloading the page. Handle responses with JavaScript and improve UX.">
    <meta property="og:image" content="<?= base_url('assets/logo.png');?>">
    <meta property="og:url" content="<?= base_url('docs-ajax');?>">
    <meta property="og:type" content="article">

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="AJAX Form Docs - SUBMITTER API">
    <meta name="twitter:description" content="Submit forms via AJAX to SUBMITTER backend. Use Fetch or jQuery to send POST requests and receive responses in real time.">
    <meta name="twitter:image" content="<?= base_url('assets/logo.png');?>">
    <meta name="twitter:url" content="<?= base_url('docs-ajax');?>">

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
          <span style="color: red;">AJAX</span> 
          <span style="color: purple;">DOCUMENTATION</span>
        </h1>
        <h3 style="text-align: center; width: 85%; margin: 0 auto;">Send forms using AJAX without redirecting users or leaving the page. SUBMITTER supports seamless integration, and we’ve included examples using popular libraries to help you get started quickly.</h3>
      </div>

    </header>

    <!-- CONTENT -->

    <section>

      <h4 style="font-weight: bold;">1. Fetch Library</h4>

      <pre><code>fetch('<?= base_url();?>v1/your@email.com', {
    method: 'POST',
    headers: {
        'Content-Type': 'application/json'
    },
    body: JSON.stringify({
        name: "FormSubmit",
        message: "I'm from Devro LABS"
    })
})
.then(response => response.json())
.then(data => console.log(data))
.catch(error => console.error(error));
</code></pre>
      
      <h4 style="font-weight: bold;">2. Axios Library</h4>
      
      <pre><code>axios.post('<?= base_url();?>v1/your@email.com', {
    name: "FormSubmit",
    message: "I'm from Devro LABS"
})
.then(response => {
    console.log(response.data);
})
.catch(error => {
    console.error(error);
});
</code></pre>

      <h4 style="font-weight: bold;">3. jQuery Library</h4>

      <pre><code>$.ajax({
    method: 'POST',
    url: '<?= base_url();?>v1/your@email.com',
    dataType: 'json',
    data: {
        name: "FormSubmit",
        message: "I'm from Devro LABS"
    },
    success: (data) => console.log(data),
    error: (err) => console.log(err)
});</code></pre>
      
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
